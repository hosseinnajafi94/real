<?php
namespace app\modules\organizations\controllers;
use Yii;
use app\modules\organizations\models\DAL\OrganizationsRules;
use app\modules\organizations\models\VML\OrganizationsRulesSearchVML;
use app\config\widgets\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class OrganizationsRulesController extends Controller {
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
        $searchModel  = new OrganizationsRulesSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }
    public function actionCreate() {
        $model = new OrganizationsRules();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $orgs  = \app\modules\organizations\models\DAL\Organizations::find()->all();
        $types = \app\modules\organizations\models\DAL\OrganizationsRulesListTypes::find()->all();
        return $this->render('create', [
                    'model' => $model,
                    'orgs'  => $orgs,
                    'types' => $types,
        ]);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $orgs  = \app\modules\organizations\models\DAL\Organizations::find()->all();
        $types = \app\modules\organizations\models\DAL\OrganizationsRulesListTypes::find()->all();

        return $this->render('update', [
                    'model' => $model,
                    'orgs'  => $orgs,
                    'types' => $types,
        ]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    protected function findModel($id) {
        if (($model = OrganizationsRules::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('organizations', 'The requested page does not exist.'));
    }
}