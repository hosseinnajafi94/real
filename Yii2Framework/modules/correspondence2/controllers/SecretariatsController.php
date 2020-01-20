<?php
namespace app\modules\correspondence\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\correspondence\models\VML\SecretariatsVML;
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
        list($searchModel, $dataProvider) = SecretariatsVML::search(Yii::$app->request->queryParams);
        return $this->renderView([
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        $model = SecretariatsVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        return $this->renderView($model);
    }
    public function actionCreate() {
        $model = SecretariatsVML::newInstance();
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = SecretariatsVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $data = SecretariatsVML::find($id);
        if ($data === null) {
            return functions::httpNotFound();
        }
        $data->model->delete();
        return $this->redirect(['index']);
    }
}