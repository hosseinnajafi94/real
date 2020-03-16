<?php
namespace app\modules\administration\controllers;
use Yii;
use app\config\widgets\Controller;
use app\modules\administration\models\VML\IpaccessesSearchVML;
use app\modules\administration\models\VML\GeoipSearchVML;
use app\modules\administration\models\VML\DosipSearchVML;
class AccessController extends Controller {
    public function actionIndex() {
        
        $searchModel1 = new IpaccessesSearchVML();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        
        $searchModel2  = new GeoipSearchVML();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        
        $searchModel3  = new DosipSearchVML();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel1'  => $searchModel1,
                    'dataProvider1' => $dataProvider1,
                    'searchModel2'  => $searchModel2,
                    'dataProvider2' => $dataProvider2,
                    'searchModel3'  => $searchModel3,
                    'dataProvider3' => $dataProvider3,
        ]);
    }
}