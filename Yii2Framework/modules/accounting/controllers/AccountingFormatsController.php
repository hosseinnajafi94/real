<?php
namespace app\modules\accounting\controllers;
use Yii;
use app\config\widgets\Controller;
use app\config\widgets\ArrayHelper;
use app\config\components\functions;
use app\modules\accounting\models\DAL\AccountingListOrders;
use app\modules\accounting\models\DAL\AccountingListFormats;
use app\modules\accounting\models\DAL\AccountingFormats;
use app\modules\accounting\models\DAL\AccountingListAccountNames;
use app\modules\accounting\models\VML\AccountingFormatsSearchModel;
class AccountingFormatsController extends Controller {
    public function actionIndex() {
        $model = new AccountingFormats();

        $searchModel1  = new AccountingFormatsSearchModel(1);
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        $searchModel2  = new AccountingFormatsSearchModel(2);
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        $searchModel3  = new AccountingFormatsSearchModel(3);
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);
        $searchModel4  = new AccountingFormatsSearchModel(4);
        $dataProvider4 = $searchModel4->search(Yii::$app->request->queryParams);
        $searchModel5  = new AccountingFormatsSearchModel(5);
        $dataProvider5 = $searchModel5->search(Yii::$app->request->queryParams);
        $searchModel6  = new AccountingFormatsSearchModel(6);
        $dataProvider6 = $searchModel6->search(Yii::$app->request->queryParams);

        $items                    = [];
        $items['format_id']       = ArrayHelper::map(AccountingListFormats::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['order_id']        = ArrayHelper::map(AccountingListOrders::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['account_name_id'] = ArrayHelper::map(AccountingListAccountNames::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');

        return $this->renderView([
                    'model'         => $model,
                    'searchModel1'  => $searchModel1,
                    'dataProvider1' => $dataProvider1,
                    'searchModel2'  => $searchModel2,
                    'dataProvider2' => $dataProvider2,
                    'searchModel3'  => $searchModel3,
                    'dataProvider3' => $dataProvider3,
                    'searchModel4'  => $searchModel4,
                    'dataProvider4' => $dataProvider4,
                    'searchModel5'  => $searchModel5,
                    'dataProvider5' => $dataProvider5,
                    'searchModel6'  => $searchModel6,
                    'dataProvider6' => $dataProvider6,
                    'items'         => $items,
        ]);
    }
    public function actionCreate() {
        $model          = new AccountingFormats();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteAll(array $ids = []) {
        AccountingFormats::deleteAll(['id' => $ids]);
        return $this->asJson(['saved' => true]);
    }
    protected function findModel($id) {
        $model = AccountingFormats::findOne($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        return $model;
    }
}