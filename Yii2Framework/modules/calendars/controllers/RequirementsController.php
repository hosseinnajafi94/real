<?php
namespace app\modules\calendars\controllers;
use Yii;
use app\modules\calendars\models\DAL\CalendarsListRequirements;
use app\config\widgets\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class RequirementsController extends Controller {
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionCreate() {
        $model = new CalendarsListRequirements();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/calendars/calendars/index']);
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['/calendars/calendars/index']);
    }
    protected function findModel($id) {
        if (($model = CalendarsListRequirements::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('notifications', 'The requested page does not exist.'));
    }
}