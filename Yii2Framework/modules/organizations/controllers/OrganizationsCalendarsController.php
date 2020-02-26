<?php
namespace app\modules\organizations\controllers;
use Yii;
use app\modules\organizations\models\DAL\OrganizationsCalendars;
use app\modules\organizations\models\VML\OrganizationsCalendarsSearchVML;
use app\config\widgets\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class OrganizationsCalendarsController extends Controller {
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
        $searchModel  = new OrganizationsCalendarsSearchVML();
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
        $model = new OrganizationsCalendars();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $name = \app\modules\organizations\models\DAL\Organizations::find()->all();

        return $this->render('create', [
                    'model' => $model,
                    'name'  => $name,
        ]);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $name = \app\modules\organizations\models\DAL\Organizations::find()->all();
        return $this->render('update', [
                    'model' => $model,
                    'name'  => $name,
        ]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    protected function findModel($id) {
        if (($model = OrganizationsCalendars::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('organizations', 'The requested page does not exist.'));
    }
}