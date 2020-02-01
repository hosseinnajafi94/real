<?php
namespace app\modules\accounting\controllers;
use app\config\widgets\Controller;
class SettingsController extends Controller {
    public function actionIndex() {
        
        return $this->renderView();
    }
}