<?php
namespace app\modules\administration\controllers;
use Yii;
use app\config\widgets\Controller;
class DefaultController extends Controller {
    public function actionIndex() {
        $model = new \app\modules\administration\models\VML\Administration();
        return $this->renderView($model);
    }
}