<?php
namespace app\modules\organizations\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\organizations\models\VML\OrganizationsVML;
use app\modules\organizations\models\VML\OrganizationsSearchVML;
use app\modules\organizations\models\VML\OrganizationsUnitsSearchVML;
use app\modules\organizations\models\VML\OrganizationsPositionsSearchVML;
class OrganizationsController extends Controller {
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex() {
        $searchModel  = new OrganizationsSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        $model = OrganizationsVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }

        $searchModel1  = new OrganizationsPositionsSearchVML();
        $dataProvider1 = $searchModel1->search($model->id, Yii::$app->request->queryParams);

        $searchModel2  = new OrganizationsUnitsSearchVML();
        $dataProvider2 = $searchModel2->search($model->id, Yii::$app->request->queryParams);

        return $this->renderView([
                    'model'         => $model,
                    'searchModel1'  => $searchModel1,
                    'dataProvider1' => $dataProvider1,
                    'searchModel2'  => $searchModel2,
                    'dataProvider2' => $dataProvider2,
        ]);
    }
    public function actionCreate() {
        $model = OrganizationsVML::newInstance();
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = OrganizationsVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $data = OrganizationsVML::find($id);
        if ($data === null) {
            return functions::httpNotFound();
        }
        $data->model->delete();
        return $this->redirect(['index']);
    }
}