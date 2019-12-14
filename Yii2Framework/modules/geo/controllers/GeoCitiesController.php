<?php
namespace app\modules\geo\controllers;
use Yii;
use yii\filters\AccessControl;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\geo\models\SRL\GeoCitiesSRL;
class GeoCitiesController extends Controller {
    public function behaviors() {
        return [
//            'access' => [
////                'class' => AccessControl::className(),
//                'rules' => [
////                        ['allow' => true, 'actions' => ['index', 'view'], 'roles' => ['GeoCities'], 'verbs' => ['GET']],
////                        ['allow' => true, 'actions' => ['delete'], 'roles' => ['GeoCities'], 'verbs' => ['POST']],
////                        ['allow' => true, 'actions' => ['get-cities'], 'verbs' => ['GET']],
////                        ['allow' => true, 'actions' => ['create', 'update'], 'roles' => ['GeoCities'], 'verbs' => ['GET', 'POST']],
//                ],
//            ],
        ];
    }
    public function actionIndex() {
        list($searchModel, $dataProvider) = GeoCitiesSRL::searchModel();
        return $this->renderView([
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        $model = GeoCitiesSRL::findModel($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        return $this->renderView($model);
    }
    public function actionCreate() {
        $model = GeoCitiesSRL::newViewModel();
        if ($model->load(Yii::$app->request->post()) && GeoCitiesSRL::insert($model)) {
            functions::setSuccessFlash();
            return $this->redirect(['index']);
        }
        GeoCitiesSRL::loadItems($model);
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = GeoCitiesSRL::findViewModel($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        if ($model->load(Yii::$app->request->post()) && GeoCitiesSRL::update($model)) {
            functions::setSuccessFlash();
            return $this->redirect(['index']);
        }
        GeoCitiesSRL::loadItems($model);
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $deleted = GeoCitiesSRL::delete($id);
        functions::setFlash($deleted);
        return $this->redirect(['index']);
    }
    public function actionGetCities($province_id = null) {
        $data = [];
        if (!$province_id) {
            $province_id = Yii::$app->request->post('province_id');
        }
        if (is_numeric($province_id)) {
            $data = GeoCitiesSRL::getItems(['province_id' => $province_id]);
        }
        return $this->asJson($data);
    }
}