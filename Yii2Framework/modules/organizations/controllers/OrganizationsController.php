<?php
namespace app\modules\organizations\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\organizations\models\DAL\OrganizationsUnits;
use app\modules\organizations\models\VML\OrganizationsVML;
use app\modules\organizations\models\VML\OrganizationsSearchVML;
use app\modules\organizations\models\VML\OrganizationsUnitsSearchVML;
use app\modules\organizations\models\VML\OrganizationsPositionsSearchVML;
use app\modules\organizations\models\VML\OrganizationsPositionsListSkillsSearchVML;
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

        $searchModel2  = new OrganizationsUnitsSearchVML();
        $dataProvider2 = $searchModel2->search($model->id, Yii::$app->request->queryParams);

        $searchModel3  = new OrganizationsPositionsSearchVML();
        $dataProvider3 = $searchModel3->search($model->id, Yii::$app->request->queryParams);

        $searchModel4  = new OrganizationsPositionsListSkillsSearchVML();
        $dataProvider4 = $searchModel4->search($model->id, Yii::$app->request->queryParams);

        $units = OrganizationsUnits::find()->where(['organization_id' => $model->id])->all();

        return $this->renderView([
                    'model'         => $model,
                    'searchModel2'  => $searchModel2,
                    'dataProvider2' => $dataProvider2,
                    'searchModel3'  => $searchModel3,
                    'dataProvider3' => $dataProvider3,
                    'searchModel4'  => $searchModel4,
                    'dataProvider4' => $dataProvider4,
                    'units'         => $this->units($units, null),
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
    private function units($arr, $parentId) {
        $output = [];
        foreach ($arr as $row) {
            if ($row->parent_id === $parentId) {
                $output[] = [
                    'id'       => $row->id,
                    'text'     => $row->name,
                    'children' => $this->units($arr, $row->id)
                ];
            }
        }
        return $output;
    }
}