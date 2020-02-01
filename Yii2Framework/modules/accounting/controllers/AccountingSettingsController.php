<?php
namespace app\modules\accounting\controllers;
use Yii;
use app\config\widgets\Controller;
use app\config\widgets\ArrayHelper;
use app\modules\accounting\models\VML\AccountingSettingsVML;
use app\modules\accounting\models\VML\AccountingSettingsListOthersSearchModel;
use app\modules\accounting\models\DAL\AccountingSettings;
use app\modules\accounting\models\DAL\AccountingListSymbols;
use app\modules\accounting\models\DAL\AccountingSettingsItems;
use app\modules\accounting\models\DAL\AccountingSettingsListOthers;
use app\modules\accounting\models\DAL\AccountingSettingsListAccounts;
use app\modules\organizations\models\DAL\OrganizationsListYears;
use app\modules\organizations\models\SRL\OrganizationsSRL;
class AccountingSettingsController extends Controller {
    public function actionIndex() {
        $model = AccountingSettings::findOne(1);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        }
        $model2 = new AccountingSettingsVML();
        $model2->loaditems();

        $model3 = new AccountingSettingsListOthers();

        $searchModel  = new AccountingSettingsListOthersSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $items           = [];
        $items['id_p01'] = ArrayHelper::map(AccountingListSymbols::find()->orderBy(['sort' => SORT_ASC])->all(), 'id', 'title');
        $items['id_p02'] = ArrayHelper::map(AccountingSettingsItems::find()->where(['type_id' => 1])->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['id_p03'] = ArrayHelper::map(AccountingSettingsItems::find()->where(['type_id' => 2])->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['id_p04'] = ArrayHelper::map(AccountingSettingsItems::find()->where(['type_id' => 3])->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['id_p05'] = ArrayHelper::map(AccountingSettingsItems::find()->where(['type_id' => 4])->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['id_p06'] = OrganizationsSRL::getItems();
        $items['id_p07'] = ArrayHelper::map(OrganizationsListYears::find()->where(['organization_id' => $model->id_p06])->all(), 'id', 'title');
        $items['id_p08'] = ArrayHelper::map(AccountingSettingsItems::find()->where(['type_id' => 5])->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['id_p09'] = ArrayHelper::map(AccountingSettingsItems::find()->where(['type_id' => 6])->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['id_p10'] = ArrayHelper::map(AccountingSettingsItems::find()->where(['type_id' => 7])->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');

        return $this->renderView([
                    'model'        => $model,
                    'model2'       => $model2,
                    'model3'       => $model3,
                    'items'        => $items,
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex2() {
        $model = AccountingSettings::findOne(1);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        }
        $items           = [];
        $items['id_p11'] = ArrayHelper::map(AccountingSettingsItems::find()->where(['type_id' => 8])->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['id_p12'] = ArrayHelper::map(AccountingSettingsItems::find()->where(['type_id' => 9])->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        return $this->renderView([
                    'model' => $model,
                    'items' => $items,
        ]);
    }
    public function actionGet(int $type_id = 0) {
        $models = AccountingSettingsListAccounts::find()->where(['type_id' => $type_id])->orderBy(['id' => SORT_ASC])->all();
        $rows   = [];
        foreach ($models as $model) {
            $rows[] = $model->client_id;
        }
        $modelSettings = AccountingSettings::findOne(1);
        $type          = 'default_account' . ($type_id < 10 ? '0' : '') . $type_id . '_id';
        return $this->asJson([
                    'type_id'    => $type_id,
                    'accounts'   => $rows,
                    'default_id' => $modelSettings->$type
        ]);
    }
    public function actionGet2(int $org_id = 0) {
        $rows = OrganizationsListYears::find()->select('id, title')->where(['organization_id' => $org_id])->asArray()->all();
        return $this->asJson(['rows' => $rows]);
    }
    public function actionSave() {
        $model = new AccountingSettingsVML();
        if ($model->save(Yii::$app->request->post())) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
}