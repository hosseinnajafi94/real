<?php
namespace app\modules\administration\controllers;
use app\config\widgets\Controller;
class DefaultController extends Controller {
    public function actionIndex() {
        $model = new \app\modules\administration\models\VML\Administration();
        return $this->renderView($model);
    }
    public function actionStatistic() {
        return $this->renderView();
    }
    public function actionPermission() {
        return $this->renderView();
    }
    public function actionActivity() {
        return $this->renderView();
    }
    public function actionLocation() {
        return $this->renderView();
    }
    public function actionBackup() {
        return $this->renderView();
    }
}