<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\accounting\models\DAL\AccountingSettings */
/* @var $form app\config\widgets\ActiveForm */
$this->title = Yii::t('accounting', 'الگوی تایید پیش فرض');
?>
<div class="accounting-accounting-settings-index2 card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <?php
        $form = ActiveForm::begin([
            'layout'      => 'horizontal',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label'   => 'col-sm-4 col-12',
                    'wrapper' => 'col-sm-6 col-12',
                ],
            ],
        ]);
        ?>
        <div class="row">
            <div class="col-sm-6 col-12">
                <?= $form->field($model, 'id_p11')->select2($items['id_p11']) ?>
            </div>
            <div class="col-sm-6 col-12">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-12">
                <?= $form->field($model, 'id_p12')->select2($items['id_p12']) ?>
            </div>
            <div class="col-sm-6 col-12">
            </div>
        </div>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0 mt-2']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$this->registerCss("
    .select2-container--krajee-bs4 .select2-selection--single {height: calc(2rem + 2px);}
");
