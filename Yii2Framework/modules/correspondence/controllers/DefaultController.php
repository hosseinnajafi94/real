<?php
namespace app\modules\correspondence\controllers;
use app\config\widgets\Controller;
class DefaultController extends Controller {
    public function actionIndex() {
        return $this->renderView([
        ]);
    }
}