<?php
namespace app\modules\accounting\controllers;
use Yii;
use app\config\widgets\Controller;
use app\modules\accounting\models\VML\DefaultSettingsVML;
class DefaultController extends Controller {
    public function actionIndex() {
        return $this->renderView([]);
    }
    public function actionSettings() {
        $model = new DefaultSettingsVML();
        if ($model->save(Yii::$app->request->post())) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
}