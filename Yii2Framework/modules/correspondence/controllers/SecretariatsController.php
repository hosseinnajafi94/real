<?php
namespace app\modules\correspondence\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use yii\web\NotFoundHttpException;
use app\modules\correspondence\models\DAL\Secretariats;
use app\modules\correspondence\models\VML\SecretariatsSearchModel;
class SecretariatsController extends Controller {
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
        $searchModel  = new SecretariatsSearchModel();
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
        $model = new Secretariats();
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
    protected function findModel($id) {
        if (($model = Secretariats::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('correspondence', 'The requested page does not exist.'));
    }
}