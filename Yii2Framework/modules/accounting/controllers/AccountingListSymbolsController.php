<?php
namespace app\modules\accounting\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\accounting\models\DAL\AccountingListSymbols;
use app\modules\accounting\models\VML\AccountingListSymbolsSearchModel;
class AccountingListSymbolsController extends Controller {
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex() {
        $searchModel  = new AccountingListSymbolsSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderView([
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        $model = $this->findModel($id);
        return $this->renderView($model);
    }
    public function actionCreate() {
        $model       = new AccountingListSymbols();
        $model->sort = 1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    public function actionUp($id) {
        $model = $this->findModel($id);

        $prev = AccountingListSymbols::find()->where("sort < $model->sort")->orderBy(['sort' => SORT_DESC])->limit(1)->one();
        if ($prev == null) {
            return functions::httpNotFound();
        }

        $first       = $prev->sort;
        $last        = $model->sort;
        $model->sort = $first;
        $prev->sort  = $last;
        $prev->save();
        $model->save();

        return $this->redirect(['index']);
    }
    public function actionDown($id) {
        $model = $this->findModel($id);

        $next = AccountingListSymbols::find()->where("sort > $model->sort")->orderBy(['sort' => SORT_ASC])->limit(1)->one();
        if ($next == null) {
            return functions::httpNotFound();
        }

        $first       = $next->sort;
        $last        = $model->sort;
        $model->sort = $first;
        $next->sort  = $last;
        $next->save();
        $model->save();

        return $this->redirect(['index']);
    }
    protected function findModel($id) {
        $model = AccountingListSymbols::findOne($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        return $model;
    }
}