<?php
namespace app\modules\organizations\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\organizations\models\VML\OrganizationsPositionsVML;
class OrganizationsPositionsController extends Controller {
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
    public function actionView($id) {
        $model = OrganizationsPositionsVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        return $this->renderView($model);
    }
    public function actionCreate($org_id) {
        $model = OrganizationsPositionsVML::newInstance($org_id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = OrganizationsPositionsVML::find($id);
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
        $data = OrganizationsPositionsVML::find($id);
        if ($data === null) {
            return functions::httpNotFound();
        }
        $org_id = $data->organization_id;
        $data->model->delete();
        return $this->redirect(['/organizations/organizations/view', 'id' => $org_id]);
    }
}