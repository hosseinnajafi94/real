<?php
namespace app\modules\calendars\controllers;
use Yii;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use app\config\components\jdf;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\calendars\models\DAL\Calendars;
use app\modules\calendars\models\DAL\CalendarsAlarms;
use app\modules\calendars\models\DAL\CalendarsListType;
use app\modules\calendars\models\VML\CalendarsVML;
use app\modules\calendars\models\VML\CalendarsAlarmsVML;
use app\modules\calendars\models\VML\CalendarsSearchVML;
use app\modules\calendars\models\VML\CalendarsListTypeVML;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class CalendarsController extends Controller {
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'type'   => ['POST'],
                    'delete' => ['POST'],
//                    'delete-event'      => ['POST'],
//                    'delete-type' => ['POST'],
                ],
            ],
        ];
    }
    public function actionImport() {
        $model = new \app\modules\calendars\models\VML\ImportVML();
        if ($model->save(Yii::$app->request->post())) {
            functions::setSuccessFlash();
            return $this->refresh();
        }
        return $this->renderView($model);
    }
    public function actionExport() {
        //
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Calendars');
        $sheet->setCellValueByColumnAndRow(1, 1, 'id');
        $sheet->setCellValueByColumnAndRow(2, 1, 'user_id');
        $sheet->setCellValueByColumnAndRow(3, 1, 'title');
        $sheet->setCellValueByColumnAndRow(4, 1, 'favcolor');
        $sheet->setCellValueByColumnAndRow(5, 1, 'type_id');
        $sheet->setCellValueByColumnAndRow(6, 1, 'status_id');
        $sheet->setCellValueByColumnAndRow(7, 1, 'location');
        $sheet->setCellValueByColumnAndRow(8, 1, 'start_time');
        $sheet->setCellValueByColumnAndRow(9, 1, 'end_time');
        $sheet->setCellValueByColumnAndRow(10, 1, 'description');
        $sheet->setCellValueByColumnAndRow(11, 1, 'has_reception');
        $sheet->setCellValueByColumnAndRow(12, 1, 'catering_id');
        /* @var $models Calendars[] */
        $models      = Calendars::find()->orderBy(['id' => SORT_ASC])->all();
        foreach ($models as $index => $model) {
            $sheet->setCellValueByColumnAndRow(1, $index + 2, $model->id);
            $sheet->setCellValueByColumnAndRow(2, $index + 2, $model->user_id);
            $sheet->setCellValueByColumnAndRow(3, $index + 2, $model->title);
            $sheet->setCellValueByColumnAndRow(4, $index + 2, $model->favcolor);
            $sheet->setCellValueByColumnAndRow(5, $index + 2, $model->type_id);
            $sheet->setCellValueByColumnAndRow(6, $index + 2, $model->status_id);
            $sheet->setCellValueByColumnAndRow(7, $index + 2, $model->location);
            $sheet->setCellValueByColumnAndRow(8, $index + 2, $model->start_time);
            $sheet->setCellValueByColumnAndRow(9, $index + 2, $model->end_time);
            $sheet->setCellValueByColumnAndRow(10, $index + 2, $model->description);
            $sheet->setCellValueByColumnAndRow(11, $index + 2, $model->has_reception);
            $sheet->setCellValueByColumnAndRow(12, $index + 2, $model->catering_id);
        }
        //
        $spreadsheet->createSheet(1);
        $spreadsheet->setActiveSheetIndex(1);
        $sheet2 = $spreadsheet->getActiveSheet();
        $sheet2->setTitle('Users');
        $sheet2->setCellValueByColumnAndRow(1, 1, 'id');
        $sheet2->setCellValueByColumnAndRow(2, 1, 'user_id');
        $sheet2->setCellValueByColumnAndRow(3, 1, 'calendar_id');
        $cusers = \app\modules\calendars\models\DAL\CalendarsUsers::find()->orderBy(['calendar_id' => SORT_ASC, 'user_id' => SORT_ASC, 'id' => SORT_ASC])->all();
        foreach ($cusers as $index => $cuser) {
            $sheet2->setCellValueByColumnAndRow(1, $index + 2, $cuser->id);
            $sheet2->setCellValueByColumnAndRow(2, $index + 2, $cuser->user_id);
            $sheet2->setCellValueByColumnAndRow(3, $index + 2, $cuser->calendar_id);
        }
        //
        $spreadsheet->createSheet(2);
        $spreadsheet->setActiveSheetIndex(2);
        $sheet3 = $spreadsheet->getActiveSheet();
        $sheet3->setTitle('Alarms');
        $sheet3->setCellValueByColumnAndRow(1, 1, 'id');
        $sheet3->setCellValueByColumnAndRow(2, 1, 'calendar_id');
        $sheet3->setCellValueByColumnAndRow(3, 1, 'time_id');
        $sheet3->setCellValueByColumnAndRow(4, 1, 'period_id');
        $sheet3->setCellValueByColumnAndRow(5, 1, 'alarm_type_id');
        $sheet3->setCellValueByColumnAndRow(6, 1, 'message');
        $alarms = \app\modules\calendars\models\DAL\CalendarsAlarms::find()->orderBy(['calendar_id' => SORT_ASC, 'id' => SORT_ASC])->all();
        foreach ($alarms as $index => $alarm) {
            $sheet3->setCellValueByColumnAndRow(1, $index + 2, $alarm->id);
            $sheet3->setCellValueByColumnAndRow(2, $index + 2, $alarm->calendar_id);
            $sheet3->setCellValueByColumnAndRow(3, $index + 2, $alarm->time_id);
            $sheet3->setCellValueByColumnAndRow(4, $index + 2, $alarm->period_id);
            $sheet3->setCellValueByColumnAndRow(5, $index + 2, $alarm->alarm_type_id);
            $sheet3->setCellValueByColumnAndRow(6, $index + 2, $alarm->message);
        }
        //
        $spreadsheet->createSheet(3);
        $spreadsheet->setActiveSheetIndex(3);
        $sheet4 = $spreadsheet->getActiveSheet();
        $sheet4->setTitle('Events');
        $sheet4->setCellValueByColumnAndRow(1, 1, 'id');
        $sheet4->setCellValueByColumnAndRow(2, 1, 'calendar_id');
        $sheet4->setCellValueByColumnAndRow(3, 1, 'datetime');
        $sheet4->setCellValueByColumnAndRow(4, 1, 'done');
        $events = \app\modules\calendars\models\DAL\CalendarsEvents::find()->orderBy(['calendar_id' => SORT_ASC, 'id' => SORT_ASC])->all();
        foreach ($events as $index => $event) {
            $sheet4->setCellValueByColumnAndRow(1, $index + 2, $event->id);
            $sheet4->setCellValueByColumnAndRow(2, $index + 2, $event->calendar_id);
            $sheet4->setCellValueByColumnAndRow(3, $index + 2, $event->datetime);
            $sheet4->setCellValueByColumnAndRow(4, $index + 2, $event->done);
        }
        //
        $spreadsheet->createSheet(4);
        $spreadsheet->setActiveSheetIndex(4);
        $sheet5  = $spreadsheet->getActiveSheet();
        $sheet5->setTitle('For Info');
        $sheet5->setCellValueByColumnAndRow(1, 1, 'id');
        $sheet5->setCellValueByColumnAndRow(2, 1, 'calendar_id');
        $sheet5->setCellValueByColumnAndRow(3, 1, 'user_id');
        $forinfo = \app\modules\calendars\models\DAL\CalendarsForInformation::find()->orderBy(['calendar_id' => SORT_ASC, 'user_id' => SORT_ASC, 'id' => SORT_ASC])->all();
        foreach ($forinfo as $index => $row) {
            $sheet5->setCellValueByColumnAndRow(1, $index + 2, $row->id);
            $sheet5->setCellValueByColumnAndRow(2, $index + 2, $row->calendar_id);
            $sheet5->setCellValueByColumnAndRow(3, $index + 2, $row->user_id);
        }
        //
        $spreadsheet->createSheet(5);
        $spreadsheet->setActiveSheetIndex(5);
        $sheet6 = $spreadsheet->getActiveSheet();
        $sheet6->setTitle('Types');
        $sheet6->setCellValueByColumnAndRow(1, 1, 'id');
        $sheet6->setCellValueByColumnAndRow(2, 1, 'title');
        $sheet6->setCellValueByColumnAndRow(3, 1, 'descriptions');
        $types  = \app\modules\calendars\models\DAL\CalendarsListType::find()->orderBy(['id' => SORT_ASC])->all();
        foreach ($types as $index => $row) {
            $sheet6->setCellValueByColumnAndRow(1, $index + 2, $row->id);
            $sheet6->setCellValueByColumnAndRow(2, $index + 2, $row->title);
            $sheet6->setCellValueByColumnAndRow(3, $index + 2, $row->descriptions);
        }
        //
        $spreadsheet->createSheet(6);
        $spreadsheet->setActiveSheetIndex(6);
        $sheet7       = $spreadsheet->getActiveSheet();
        $sheet7->setTitle('Requirements');
        $sheet7->setCellValueByColumnAndRow(1, 1, 'id');
        $sheet7->setCellValueByColumnAndRow(2, 1, 'calendar_id');
        $sheet7->setCellValueByColumnAndRow(3, 1, 'requirement_id');
        $requirements = \app\modules\calendars\models\DAL\CalendarsRequirements::find()->orderBy(['calendar_id' => SORT_ASC, 'requirement_id' => SORT_ASC, 'id' => SORT_ASC])->all();
        foreach ($requirements as $index => $requirement) {
            $sheet7->setCellValueByColumnAndRow(1, $index + 2, $requirement->id);
            $sheet7->setCellValueByColumnAndRow(2, $index + 2, $requirement->calendar_id);
            $sheet7->setCellValueByColumnAndRow(3, $index + 2, $requirement->requirement_id);
        }
        //
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="file.xlsx"');
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save("php://output");
    }
    public function actionSearchTitle($title) {
        $data = Calendars::find()->select('id, title')->where(['like', 'title', $title])->orderBy(['id' => SORT_DESC])->limit(5)->asArray()->all();
        foreach ($data as &$row) {
            $row['url'] = Url::to(['details', 'id' => $row['id']]);
        }
        return $this->asJson($data);
    }
    public function actionDetails($id) {
        $model = new CalendarsVML;
        $model->loaditems();
        $events = $model->getEvents($id);
        return $this->asJson($events[0]);
    }
    public function actionIndex() {
        $search     = new CalendarsSearchVML();
        $data       = $search->search(Yii::$app->request->queryParams);
        $search4    = new \app\modules\calendars\models\VML\CalendarsListRequirementsSearchModel();
        $data4      = $search4->search(Yii::$app->request->queryParams);
        $model      = CalendarsVML::newInstance();
        $model->loaditems();
        $modelAlarm = CalendarsAlarmsVML::newInstance();
        $modelAlarm->loaditems();
        $modelType  = CalendarsListTypeVML::newInstance();
        $modelType->loaditems();
        return $this->render('index', [
                    'model'      => $model,
                    'modelType'  => $modelType,
                    'search'     => $search,
                    'data'       => $data,
                    'search4'    => $search4,
                    'data4'      => $data4,
                    'modelAlarm' => $modelAlarm
        ]);
    }
    public function actionDeleteType($id) {
        if (($model = CalendarsListType::findOne(['id' => $id])) === null) {
            return $this->asJson(['saved' => false]);
        }
        $model->delete();
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteEvent($id) {
        if (($model = Calendars::findOne(['id' => $id])) === null) {
            return $this->asJson(['saved' => false]);
        }
        $model->delete();
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteAlarm($id) {
        if (($model = CalendarsAlarms::findOne(['id' => $id])) === null) {
            return $this->asJson(['saved' => false]);
        }
        $model->delete();
        return $this->asJson(['saved' => true]);
    }
    public function actionSearch($title) {
        $models = Calendars::find()
                ->select('title, cast(start_time as date) as start')
                ->where(['user_id' => Yii::$app->user->id])
                ->andWhere(['like', 'title', $title])
                ->asArray()
                ->orderBy(['start_time' => SORT_DESC])
                ->all();
        foreach ($models as &$model) {
            $model['start_title'] = functions::tojdate($model['start']);
        }
        return $this->asJson(['models' => $models]);
    }
    public function actionEvent() {
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
        $model = CalendarsListTypeVML::newInstance();
        if ($model->save(Yii::$app->request->post())) {
            $data = $model->loaditems()->toArray();
            unset($data['model']);
            return $this->asJson(['saved' => true, 'data' => $data]);
        }
        return $this->asJson(['saved' => false, 'errors' => $model->getErrors()]);
    }
    public function actionAlarm() {
        $model = CalendarsAlarmsVML::newInstance();
        if ($model->save(Yii::$app->request->post())) {
            $data        = $model->loaditems()->toArray();
            unset($data['model']);
            $data['url'] = Url::to(['delete-alarm', 'id' => $data['id']]);
            return $this->asJson(['saved' => true, 'data' => $data]);
        }
        return $this->asJson(['saved' => false, 'errors' => $model->getErrors()]);
    }
    public function actionGetList($datetime) {
        $start = functions::togdate($datetime) . ' 00:00:00';
        $end = functions::togdate($datetime) . ' 23:59:59';
        $data = Calendars::find()->select('id, title')->where("start_time BETWEEN '$start' AND '$end' OR end_time BETWEEN '$start' AND '$end'")->orderBy(['id' => SORT_DESC])->asArray()->all();
        foreach ($data as &$row) {
            $row['url'] = Url::to(['details', 'id' => $row['id']]);
        }
        return $this->asJson($data);
    }
    //
    public function actionCreate($date, $time1, $time2) {
        $model             = CalendarsVML::newInstance();
        $model->start_date = $date;
        $model->end_date   = $date;
        $model->start_time = $time1;
        $model->end_time   = $time2;
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
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
        if (($model = Calendars::findOne(['id' => $id])) === null) {
            return functions::httpNotFound();
        }
        $model->delete();
        return $this->redirect(['index']);
    }
    public function actionSearchSession() {
        $session_start_time = Yii::$app->request->post('session_start_time');
        $session_end_time   = Yii::$app->request->post('session_end_time');
        $session_start_date = Yii::$app->request->post('session_start_date');
        $session_end_date   = Yii::$app->request->post('session_end_date');
        $gstart             = functions::togdate($session_start_date);
        $days               = $this->getDiffDays($session_start_date, $session_end_date);
        $select             = [];
        $output             = [];
        for ($index = 0; $index <= $days; $index++) {
            $day           = jdf::jdate('l', strtotime($gstart . ' +' . $index . ' days'));
            $date          = jdf::jdate('Y/m/d', strtotime($gstart . ' +' . $index . ' days'));
            $start_time    = date('Y/m/d H:i:s', strtotime($gstart . ' ' . $session_start_time . ' +' . $index . ' days'));
            $end_time      = date('Y/m/d H:i:s', strtotime($gstart . ' ' . $session_end_time . ' +' . $index . ' days'));
            $select[]      = "SELECT '$date' as date, id FROM `calendars` as m2 WHERE ((m2.start_time <= '$start_time' AND m2.end_time >= '$start_time') OR (m2.start_time <  '$end_time' AND m2.end_time >= '$end_time') OR ('$start_time' <= m2.start_time AND '$end_time' >= m2.start_time))";
            $output[$date] = [
                'day'        => $day,
                'date'       => $date,
                'start_time' => $session_start_time,
                'end_time'   => $session_end_time,
                'rowId'      => null,
                'url'        => Url::to(['create', 'date' => $date, 'time1' => $session_start_time, 'time2' => $session_end_time])
                    //'rowId'      => $day === 'جمعه' ? false : null,
            ];
        }
        if ($select) {
            $rows = functions::queryAll('SELECT c.date, c.id FROM (' . implode(' UNION ', $select) . ') as c GROUP BY c.date');
            foreach ($rows as $row) {
                $output[$row['date']]['rowId'] = $row['id'];
            }
        }
        return $this->asJson(['rows' => $output]);
    }
    public function getDiffDays($start, $end) {
        $start1 = functions::togdate($start);
        $end1   = functions::togdate($end);
        $s      = new \DateTime($start1);
        $e      = new \DateTime($end1);
        $d      = $e->diff($s);
        return $d->days;
    }
}