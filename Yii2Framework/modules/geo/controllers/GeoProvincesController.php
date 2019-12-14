<?php
namespace app\modules\geo\controllers;
use Yii;
use yii\filters\AccessControl;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\geo\models\SRL\GeoProvincesSRL;
class GeoProvincesController extends Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        ['allow' => true, 'actions' => ['index', 'view'], 'roles' => ['GeoProvinces'], 'verbs' => ['GET']],
                        ['allow' => true, 'actions' => ['delete'], 'roles' => ['GeoProvinces'], 'verbs' => ['POST']],
                        ['allow' => true, 'actions' => ['create', 'update'], 'roles' => ['GeoProvinces'], 'verbs' => ['GET', 'POST']],
                ],
            ],
        ];
    }
    public function actionIndex() {
        list($searchModel, $dataProvider) = GeoProvincesSRL::searchModel();
        return $this->renderView([
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        $model = GeoProvincesSRL::findModel($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        return $this->renderView($model);
    }
    public function actionCreate() {
        $model = GeoProvincesSRL::newViewModel();
        if ($model->load(Yii::$app->request->post()) && GeoProvincesSRL::insert($model)) {
            functions::setSuccessFlash();
            return $this->redirect(['index']);
        }
        GeoProvincesSRL::loadItems($model);
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = GeoProvincesSRL::findViewModel($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        if ($model->load(Yii::$app->request->post()) && GeoProvincesSRL::update($model)) {
            functions::setSuccessFlash();
            return $this->redirect(['index']);
        }
        GeoProvincesSRL::loadItems($model);
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $deleted = GeoProvincesSRL::delete($id);
        functions::setFlash($deleted);
        return $this->redirect(['index']);
    }
}