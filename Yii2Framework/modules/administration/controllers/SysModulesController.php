<?php
namespace app\modules\administration\controllers;
use Yii;
use app\config\widgets\Controller;
use app\modules\administration\models\VML\SysModulesSearchVML;
class SysModulesController extends Controller {
    public function actionIndex() {
        $searchModel  = new SysModulesSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderView([
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUpdate() {
        $searchModel  = new SysModulesSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderView([
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}