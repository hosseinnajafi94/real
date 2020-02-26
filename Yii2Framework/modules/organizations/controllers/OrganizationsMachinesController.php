<?php
namespace app\modules\organizations\controllers;
use Yii;
use app\modules\organizations\models\DAL\OrganizationsMachines;
use app\modules\organizations\models\VML\OrganizationsMachinesSearchVML;
use app\config\widgets\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class OrganizationsMachinesController extends Controller {
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
        $searchModel  = new OrganizationsMachinesSearchVML();
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
        $model = new OrganizationsMachines();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $organizations = \app\modules\organizations\models\DAL\Organizations::find()->all();
        $models        = \app\modules\organizations\models\DAL\OrganizationsMachinesListModels::find()->all();
        $calendarTypes = \app\modules\tcoding\models\DAL\ListCalendarType::find()->all();
        $timezones     = \app\modules\tcoding\models\DAL\ListTimezone::find()->all();
        $daylights     = \app\modules\tcoding\models\DAL\ListDaylightState::find()->all();
        $months        = \app\modules\tcoding\models\DAL\ListMonth::find()->all();
        $monthdays     = \app\modules\tcoding\models\DAL\ListMonthDay::find()->all();
        return $this->render('create', [
                    'model'         => $model,
                    'organizations' => $organizations,
                    'models'        => $models,
                    'calendarTypes' => $calendarTypes,
                    'timezones'     => $timezones,
                    'daylights'     => $daylights,
                    'months'        => $months,
                    'monthdays'     => $monthdays,
        ]);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $organizations       = \app\modules\organizations\models\DAL\OrganizationsPositionsSkills::find()->all();
        $models             = \app\modules\tcoding\models\DAL\ListCalendarType::find()->all();
        $timezones          = \app\modules\tcoding\models\DAL\ListTimezone::find()->all();
        $daylights          = \app\modules\tcoding\models\DAL\ListDaylightState::find()->all();
        $months             = \app\modules\tcoding\models\DAL\ListMonth::find()->all();
        $monthdays          = \app\modules\tcoding\models\DAL\ListMonthDay::find()->all();
        $organizationsmodel = \app\modules\organizations\models\DAL\OrganizationsMachinesListModels::find()->all();
        return $this->render('update', [
                    'organizations'      => $organizations,
                    'model'              => $model,
                    'models'             => $models,
                    'timezones'          => $timezones,
                    'daylights'          => $daylights,
                    'months'             => $months,
                    'monthdays'          => $monthdays,
                    'organizationsmodel' => $organizationsmodel,
        ]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    protected function findModel($id) {
        if (($model = OrganizationsMachines::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('organizations', 'The requested page does not exist.'));
    }
}