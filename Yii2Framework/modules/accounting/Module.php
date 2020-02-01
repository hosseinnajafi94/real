<?php
namespace app\modules\accounting;
use Yii;
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\config\widgets\ActiveForm;
use app\modules\accounting\models\VML\DefaultSettingsVML;
use app\modules\accounting\models\DAL\AccountingSettings;
use app\modules\organizations\models\DAL\OrganizationsListYears;
use app\modules\organizations\models\SRL\OrganizationsSRL;
class Module extends \yii\base\Module {
    public $controllerNamespace = 'app\modules\accounting\controllers';
    public function init() {
        parent::init();
        Yii::configure($this, require 'config.php');
    }
    public function beforeAction($action) {

        $session         = Yii::$app->session;
        $organization_id = $session->get('default_organization_id');
        if ($organization_id === null) {
            $settings = AccountingSettings::findOne(1);
            if ($settings->id_p06) {
                $organization_id = $settings->id_p06;
                $year_id         = $settings->id_p07;
                $session->set('default_organization_id', $organization_id);
                $session->set('default_year_id', $year_id);
            }
        }
        if ($organization_id === null) {
            $organizations = OrganizationsSRL::getItems();
            if (count($organizations) > 0) {
                $keys            = array_keys($organizations);
                $organization_id = $keys[0];
                $session->set('default_organization_id', $organization_id);

                $year = OrganizationsListYears::find()->where(['organization_id' => $$organization_id])->orderBy(['id' => SORT_DESC])->limit(1)->one();
                if ($year) {
                    $session->set('default_year_id', $year->id);
                }
            }
        }


        $view                     = Yii::$app->controller->getView();
        ob_start();
        Modal::begin([
            'id'      => 'modalSettings',
            'options' => ['class' => ''],
            'title'   => Yii::t('app', 'Update'),
            'footer'  => Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveSettings'])
        ]);
        $model                    = new DefaultSettingsVML();
        $model->loaditems();
        $form                     = ActiveForm::begin(['id' => 'formSettings', 'action' => ['/accounting/default/settings']]);
        echo $form->field($model, 'organization_id')->select2($model->list_organizations);
        echo $form->field($model, 'year_id')->select2($model->list_years);
        ActiveForm::end();
        Modal::end();
        $view->params['modals'][] = ob_get_clean();
        $view->registerJs("
            $(document).on('change', '#defaultsettingsvml-organization_id', function (e) {
                var org_id = $(this).val();
                if (!org_id) {
                    $('#defaultsettingsvml-year_id').html('<option value=\"\">" . Yii::t('app', 'Please Select') . "</option>');
                    return;
                }
                ajaxget('" . Url::to(['/accounting/accounting-settings/get2']) . "', {org_id}, function (result) {
                    var items = '<option value=\"\">" . Yii::t('app', 'Please Select') . "</option>';
                    result.rows.forEach(function (row) {
                        items += '<option value=\"' + row.id + '\">' + row.title + '</option>';
                    });
                    $('#defaultsettingsvml-year_id').html(items);
                });
            });
            $(document).on('click', '#saveSettings', function (e) {
                e.preventDefault();
                $('#formSettings').trigger('submit');
            });
            $(document).on('submit', '#formSettings', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var data = new FormData(this);
                ajaxpost(url, data, function (result) {
                    var isValid = validResult(result);
                    if (isValid) {
                        showloading();
                        window.location = '';
                    }
                }, undefined, undefined, undefined, true);
            });
        ");
        return parent::beforeAction($action);
    }
}