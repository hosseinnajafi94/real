<?php
namespace app\modules\correspondence\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\correspondence\models\VML\MailsVML;
use app\modules\correspondence\models\DAL\MailsSignatures;
class MailsController extends Controller {
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
    public function actionReference($id) {
        $model = MailsVML::findReference($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->mail_id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionSignature($id) {
        $data = MailsVML::find($id);
        if ($data === null) {
            return functions::httpNotFound();
        }
        $row = new MailsSignatures();
        $row->mail_id = $data->id;
        $row->user_id = Yii::$app->user->id;
        $row->save();
        $model = $data->model;
        $model->type_id = 2;
        $model->save();
        return $this->redirect(['view', 'id' => $data->id]);
    }
    public function actionOngoing($type_id) {
        list($searchModel, $dataProvider)  = MailsVML::search(Yii::$app->request->queryParams, $type_id);
        return $this->renderView([
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'type_id' => $type_id,
        ]);
    }
    public function actionView($id) {
        $model = MailsVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        return $this->renderView($model);
    }
    public function actionCreate($type_id) {
        $model = MailsVML::newInstance($type_id);
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = MailsVML::find($id);
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
        $data = MailsVML::find($id);
        if ($data === null) {
            return functions::httpNotFound();
        }
        $data->model->delete();
        return $this->redirect(['index']);
    }
}