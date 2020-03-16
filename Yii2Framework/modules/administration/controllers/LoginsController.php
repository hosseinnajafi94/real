<?php
namespace app\modules\administration\controllers;
use Yii;
use app\modules\administration\models\VML\LoginsSearchVML;
use app\config\widgets\Controller;
class LoginsController extends Controller {
    public function actionIndex() {
        $searchModel  = new LoginsSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
}