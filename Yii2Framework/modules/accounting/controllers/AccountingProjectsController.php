<?php
namespace app\modules\accounting\controllers;
use Yii;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\accounting\models\DAL\AccountingProjects;
class AccountingProjectsController extends Controller {
    public function actionCreate() {
        $model = new AccountingProjects();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true, 'action' => 'create', 'model' => $model->toArray()]);
        }
        return $this->asJson(['saved' => false, 'action' => 'create', 'messages' => $model->getErrors()]);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true, 'action' => 'update', 'model' => $model->toArray()]);
        }
        return $this->asJson(['saved' => false, 'action' => 'update', 'messages' => $model->getErrors()]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->asJson(['saved' => true, 'action' => 'delete']);
    }
    protected function findModel($id) {
        $model = AccountingProjects::findOne($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        return $model;
    }
}