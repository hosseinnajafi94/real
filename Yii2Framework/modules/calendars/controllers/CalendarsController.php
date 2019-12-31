<?php
namespace app\modules\calendars\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\calendars\models\DAL\Calendars;
use app\modules\calendars\models\DAL\CalendarsListType;
use app\modules\calendars\models\VML\CalendarsVML;
use app\modules\calendars\models\VML\CalendarsListTypeVML;
use app\modules\calendars\models\VML\CalendarsSearchVML;
class CalendarsController extends Controller {
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete'      => ['POST'],
                    'delete-type' => ['POST'],
                    'type'        => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex() {
        $search    = new CalendarsSearchVML();
        $data      = $search->search(Yii::$app->request->queryParams);
        $model     = CalendarsVML::newInstance();
        $model->loaditems();
        $modelType = CalendarsListTypeVML::newInstance();
        $modelType->loaditems();
        return $this->render('index', [
                    'model'     => $model,
                    'modelType' => $modelType,
                    'search'    => $search,
                    'data'      => $data
        ]);
    }
    public function actionDeleteType() {
        if (!Yii::$app->request->isAjax) {
            return functions::httpNotFound();
        }
        $id    = Yii::$app->request->post('id');
        if (($model = CalendarsListType::findOne(['id' => $id])) === null) {
            return $this->asJson(['saved' => false]);
        }
        $model->delete();
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteEvent() {
        if (!Yii::$app->request->isAjax) {
            return functions::httpNotFound();
        }
        $id    = Yii::$app->request->post('id');
        if (($model = Calendars::findOne(['id' => $id, 'user_id' => Yii::$app->user->id])) === null) {
            return $this->asJson(['saved' => false]);
        }
        $model->delete();
        return $this->asJson(['saved' => true]);
    }
    public function actionSearch($title) {
        if (!Yii::$app->request->isAjax) {
            return functions::httpNotFound();
        }
        $model = Calendars::find()->where(['user_id' => Yii::$app->user->id])->andWhere(['like', 'title', $title])->one();
        if ($model === null) {
            return $this->asJson(['saved' => false]);
        }
        $datetime = explode(' ', $model->start_time);
        return $this->asJson(['saved' => true, 'start' => $datetime[0]]);
    }
    public function actionEvent() {
        if (!Yii::$app->request->isAjax) {
            return functions::httpNotFound();
        }
        $model = CalendarsVML::newInstance();
        if ($model->save(Yii::$app->request->post())) {
            $data               = $model->loaditems()->toArray();
            $data['start_time'] = substr($data['start_time'], 11);
            $data['end_time']   = substr($data['end_time'], 11);
            $data['start']      = $data['start_date'] . ' ' . $data['start_time'];
            $data['end']        = $data['end_date'] . ' ' . $data['end_time'];
            $data['start_date'] = functions::tojdate($data['start_date']);
            $data['end_date']   = functions::tojdate($data['end_date']);
            unset($data['model']);
            return $this->asJson(['saved' => true, 'data' => $data]);
        }
        return $this->asJson(['saved' => false, 'errors' => $model->getErrors()]);
    }
    public function actionType() {
        if (!Yii::$app->request->isAjax) {
            return functions::httpNotFound();
        }
        $model = CalendarsListTypeVML::newInstance();
        if ($model->save(Yii::$app->request->post())) {
            $data = $model->loaditems()->toArray();
            unset($data['model']);
            return $this->asJson(['saved' => true, 'data' => $data]);
        }
        return $this->asJson(['saved' => false, 'errors' => $model->getErrors()]);
    }
    //
    public function actionView($id) {
        $model = CalendarsVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = CalendarsVML::find($id);
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
        if (($model = Calendars::findOne(['id' => $id, 'user_id' => Yii::$app->user->id])) === null) {
            return functions::httpNotFound();
        }
        $model->delete();
        return $this->redirect(['index']);
    }
}