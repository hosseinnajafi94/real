<?php
namespace app\modules\accounting\controllers;
use Yii;
use app\config\widgets\Controller;
use app\config\widgets\ArrayHelper;
use app\config\components\functions;
use app\modules\organizations\models\DAL\OrganizationsListYearsTypes;
use app\modules\organizations\models\DAL\OrganizationsListYears;
use app\modules\organizations\models\VML\OrganizationsSearchVML;
use app\modules\organizations\models\VML\OrganizationsListYearsSearchVML;
class OrganizationController extends Controller {
    public function actionIndex() {
        $searchModel  = new OrganizationsSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderView([
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionYears($id) {
        $searchModel  = new OrganizationsListYearsSearchVML();
        $dataProvider = $searchModel->search($id, Yii::$app->request->queryParams);
        $types = OrganizationsListYearsTypes::find()->orderBy(['id' => SORT_ASC])->all();
        return $this->renderView([
                    'id'           => $id,
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
                    'types' => ArrayHelper::map($types, 'id', 'title')
        ]);
    }
    public function actionCreate($id) {
        $model                  = new OrganizationsListYears();
        $model->organization_id = $id;
        if ($model->load(Yii::$app->request->post())) {
            $model->start_date = functions::togdate($model->start_date);
            $model->end_date = functions::togdate($model->end_date);
            if ($model->save()) {
                return $this->redirect(['years', 'id' => $model->organization_id]);
            }
            $model->start_date = functions::tojdate($model->start_date);
            $model->end_date = functions::tojdate($model->end_date);
        }
        $types = OrganizationsListYearsTypes::find()->orderBy(['id' => SORT_ASC])->all();
        return $this->renderView([
            'model' => $model,
            'types' => ArrayHelper::map($types, 'id', 'title')
        ]);
    }
    public function actionUpdate($id) {
        $model = OrganizationsListYears::findOne($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->start_date = functions::togdate($model->start_date);
            $model->end_date = functions::togdate($model->end_date);
            if ($model->save()) {
                return $this->redirect(['years', 'id' => $model->organization_id]);
            }
        }
        $model->start_date = functions::tojdate($model->start_date);
        $model->end_date = functions::tojdate($model->end_date);
        $types = OrganizationsListYearsTypes::find()->orderBy(['id' => SORT_ASC])->all();
        return $this->renderView([
            'model' => $model,
            'types' => ArrayHelper::map($types, 'id', 'title')
        ]);
    }
    public function actionDelete($id) {
        $model = OrganizationsListYears::findOne($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        $org_id = $model->organization_id;
        $model->delete();
        return $this->redirect(['years', 'id' => $org_id]);
    }
    public function actionDeleteAll(array $ids = []) {
        $rows = OrganizationsListYears::deleteAll(['id' => $ids]);
        return $this->asJson(['rows' => $rows]);
    }
}