<?php
namespace app\modules\calendars\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\calendars\models\DAL\Calendars;
use app\modules\calendars\models\VML\CalendarsVML;
class CalendarsController extends Controller {
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
        $model = CalendarsVML::newInstance();
        $model->loaditems();
        if (Yii::$app->request->isAjax) {
            if ($model->save(Yii::$app->request->post())) {
                $data               = $model->toArray();
                $data['start']      = $data['start_date'];
                $data['end']        = $data['end_date'];
                $data['start_time'] = substr($data['start_time'], 11);
                $data['end_time']   = substr($data['end_time'], 11);
                $data['start_date'] = functions::tojdate($data['start_date']);
                $data['end_date']   = functions::tojdate(date('Y-m-d', strtotime($data['end_date'] . ' -1 day')));
                unset($data['model']);
                return $this->asJson(['saved' => true, 'data' => $data]);
            }
            return $this->asJson(['saved' => false, 'errors' => $model->getErrors()]);
        }
        $calendars = Calendars::find()->select('*, cast(start_time as date) as `start`, cast(end_time as date) as `end`')->asArray()->all();
        $ar        = [];
        $model->loaditems($ar);
        foreach ($calendars as &$row) {
            $s                 = explode(' ', $row['start_time']);
            $e                 = explode(' ', $row['end_time']);
            $row['start_date'] = functions::tojdate($s[0]);
            $row['end_date']   = functions::tojdate(date('Y-m-d', strtotime($e[0] . ' -1 day')));
            $row['start_time'] = $s[1];
            $row['end_time']   = $e[1];
            $row               = array_merge($row, $ar);
        }
        return $this->render('index', [
                    'model'     => $model,
                    'calendars' => $calendars,
        ]);
    }
    public function actionDelete() {
        if (!Yii::$app->request->isAjax) {
            return functions::httpNotFound();
        }
        $id = Yii::$app->request->post('id');
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
}