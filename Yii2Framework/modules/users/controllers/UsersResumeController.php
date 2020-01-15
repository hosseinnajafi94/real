<?php
namespace app\modules\users\controllers;
use Yii;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\users\models\DAL\UsersResume;
class UsersResumeController extends Controller {
    public function actionView($id) {
        $model = $this->findModel($id);
        return $this->renderView($model);
    }
    public function actionCreate($user_id) {
        $model = new UsersResume();
        $model->user_id = $user_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/users/users/view', 'id' => $model->user_id]);
        }
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/users/users/view', 'id' => $model->user_id]);
        }
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $user_id = $model->user_id;
        $model->delete();
        return $this->redirect(['/users/users/view', 'id' => $user_id]);
    }
    protected function findModel($id) {
        $model = UsersResume::findOne($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        return $model;
    }
}