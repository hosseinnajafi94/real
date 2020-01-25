<?php
namespace app\modules\administration\controllers;
use Yii;
use app\config\widgets\Controller;
use app\modules\administration\models\DAL\Settings;
class SettingsController extends Controller {
    public function actionIndex() {
        $model = Settings::findOne(1);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->renderView($model);
    }
}