<?php
namespace app\modules\organizations\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\organizations\models\VML\OrganizationsUnitsVML;
class OrganizationsUnitsController extends Controller {
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
        $data = OrganizationsUnitsVML::find($id);
        if ($data === null) {
            return functions::httpNotFound();
        }
        return $this->renderView($data);
    }
    public function actionCreate($org_id) {
        $data = OrganizationsUnitsVML::newInstance($org_id);
        if ($data->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $data->id]);
        }
        $data->loaditems();
        return $this->renderView($data);
    }
    public function actionUpdate($id) {
        $data = OrganizationsUnitsVML::find($id);
        if ($data === null) {
            return functions::httpNotFound();
        }
        if ($data->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $data->id]);
        }
        $data->loaditems();
        return $this->renderView($data);
    }
    public function actionDelete($id) {
        $data = OrganizationsUnitsVML::find($id);
        if ($data === null) {
            return functions::httpNotFound();
        }
        $org_id = $data->organization_id;
        $data->model->delete();
        return $this->redirect(['/organizations/organizations/view', 'id' => $org_id]);
    }
}