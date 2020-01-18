<?php
namespace app\modules\calendars\controllers;
use Yii;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use app\config\components\jdf;
use app\config\widgets\Controller;
use app\config\components\functions;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use app\modules\calendars\models\DAL\Calendars;
use app\modules\calendars\models\DAL\CalendarsAlarms;
use app\modules\calendars\models\DAL\CalendarsListType;
use app\modules\calendars\models\DAL\CalendarsListRequirements;
use app\modules\calendars\models\VML\ImportVML;
use app\modules\calendars\models\VML\ExportVML;
use app\modules\calendars\models\VML\CalendarsVML;
use app\modules\calendars\models\VML\CalendarsAlarmsVML;
use app\modules\calendars\models\VML\CalendarsSearchVML;
use app\modules\calendars\models\VML\CalendarsListTypeVML;
use app\modules\calendars\models\VML\CalendarsListRequirementsSearchModel;
class CalendarsController extends Controller {
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'type' => ['POST'],
//                    'delete' => ['POST'],
//                    'delete-event'      => ['POST'],
//                    'delete-type' => ['POST'],
                ],
            ],
        ];
    }
    public function actionImport() {
        $model = new ImportVML();
        if ($model->save(Yii::$app->request->post())) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
    public function actionExport() {
        $model = new ExportVML();
        if ($model->save(Yii::$app->request->post())) {
            $spreadsheet = new Spreadsheet();
            $sheets      = $model->getRows();
            foreach ($sheets as $sheetIndex => $sh) {
                $spreadsheet->createSheet($sheetIndex);
                $spreadsheet->setActiveSheetIndex($sheetIndex);
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setRightToLeft(TRUE);
                $sheet->setTitle($sh['title']);
                $sheet->mergeCells("A1:I1");
                foreach ($sh['rows'] as $rowIndex => $row) {
                    foreach ($row as $colIndex => $col) {
                        $sheet->setCellValueByColumnAndRow($colIndex + 1, $rowIndex + 1, "$col");
                    }
                }
                foreach (range('A', 'I') as $columnID) {
                    $sheet->getColumnDimension($columnID)->setAutoSize(true);
                }
                foreach ($sheet->getRowIterator() as $row) {
                    foreach ($row->getCellIterator() as $cell) {
                        $cellCoordinate = $cell->getCoordinate();
                        $sheet->getStyle($cellCoordinate)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    }
                }
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="file.xlsx"');
            $writer = new Xlsx($spreadsheet);
            return $writer->save("php://output");
        }
        return $this->renderView($model);
    }
    public function actionSearchTitle($title) {
        $data = Calendars::find()->select('id, title')->where(['like', 'title', $title])->orderBy(['id' => SORT_DESC])->limit(5)->asArray()->all();
        foreach ($data as &$row) {
            $row['url'] = Url::to(['details', 'id' => $row['id']]);
        }
        return $this->asJson($data);
    }
    public function actionDetails($id, $type = 1) {
        $model  = new CalendarsVML;
        $model->loaditems();
        $events = $model->getEvents($id);
        if ($type === 1) {
            return $this->asJson($events[0]);
        }
        else {
            return $events[0];
        }
    }
    public function actionIndex() {
        $modelImport       = new ImportVML();
        $modelExport       = new ExportVML();
        $search            = new CalendarsSearchVML();
        $data              = $search->search(Yii::$app->request->queryParams);
        $search4           = new CalendarsListRequirementsSearchModel();
        $data4             = $search4->search(Yii::$app->request->queryParams);
        $model             = CalendarsVML::newInstance();
        $model->loaditems();
        $modelAlarm        = CalendarsAlarmsVML::newInstance();
        $modelAlarm->loaditems();
        $modelType         = CalendarsListTypeVML::newInstance();
        $modelType->loaditems();
        $modelRequirements = new CalendarsListRequirements();
        return $this->render('index', [
                    'model'             => $model,
                    'modelImport'       => $modelImport,
                    'modelExport'       => $modelExport,
                    'modelType'         => $modelType,
                    'search'            => $search,
                    'data'              => $data,
                    'search4'           => $search4,
                    'data4'             => $data4,
                    'modelAlarm'        => $modelAlarm,
                    'modelRequirements' => $modelRequirements,
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
    public function actionDeleteEvents(array $ids = []) {
        Calendars::deleteAll(['id' => $ids]);
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
//            $data               = $model->loaditems()->toArray();
//            $data['start_time'] = substr($data['start_time'], 11);
//            $data['end_time']   = substr($data['end_time'], 11);
//            $data['start']      = $data['start_date'] . ' ' . $data['start_time'];
//            $data['end']        = $data['end_date'] . ' ' . $data['end_time'];
//            $data['start_date'] = functions::tojdate($data['start_date']);
//            $data['end_date']   = functions::tojdate($data['end_date']);
//            unset($data['model']);
            return $this->asJson(['saved' => true, 'data' => $this->actionDetails($model->id, 2)]);
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
        $end   = functions::togdate($datetime) . ' 23:59:59';
        $data  = Calendars::find()->select('id, title')->where("start_time BETWEEN '$start' AND '$end' OR end_time BETWEEN '$start' AND '$end'")->orderBy(['id' => SORT_DESC])->asArray()->all();
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
        return $this->asJson(['saved' => true]);
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
        if ($days === 0) {
            $rows  = functions::queryAll("
                SELECT c.* FROM (
                    SELECT 
                        1 AS id,
                        TIME_TO_SEC('$session_start_time') as `start`,
                        TIME_TO_SEC('$session_end_time') as `end`
                    UNION
                    SELECT
                        2,
                        TIME_TO_SEC(CAST(start_time AS time)),
                        TIME_TO_SEC(CAST(end_time AS time))
                    FROM `calendars` as m2
                    WHERE (
                        (m2.start_time <= '$gstart $session_start_time' AND m2.end_time >= '$gstart $session_start_time')
                            OR
                        (m2.start_time <  '$gstart $session_end_time' AND m2.end_time >= '$gstart $session_end_time')
                            OR
                        ('$gstart $session_start_time' <= m2.start_time AND '$gstart $session_end_time' >= m2.start_time)
                    )
                    UNION
                    SELECT 
                        3 AS id,
                        TIME_TO_SEC('$session_start_time') as `start`,
                        TIME_TO_SEC('$session_end_time') as `end`
                ) AS c ORDER BY 1,2,3
            ");
            $start = 0;
            $end   = 0;
            $end2  = 0;
            $last  = null;
            foreach ($rows as $row) {
                if ($row['id'] == 1) {
                    $start = (int) $row['start'];
                    $end2  = (int) $row['start'];
                    $end   = (int) $row['end'];
                }
                elseif ($row['id'] == 2) {
                    $s = (int) $row['start'];
                    $e = (int) $row['end'];
                    if ($s <= $end2) {
                        $end2 = $e;
                    }
                    else {
                        if ($start !== $end2) {
                            $output[] = [
                                'day'        => jdf::jdate('l', strtotime("$gstart")),
                                'date'       => jdf::tr_num($session_start_date),
                                'start_time' => sec_to_time($start),
                                'end_time'   => sec_to_time($end2),
                                'url'        => Url::to(['create', 'date' => jdf::tr_num($session_start_date), 'time1' => sec_to_time($start), 'time2' => sec_to_time($end2)]),
                                'rowId'      => 1
                            ];
                        }
                        $output[] = [
                            'day'        => jdf::jdate('l', strtotime("$gstart")),
                            'date'       => jdf::tr_num($session_start_date),
                            'start_time' => sec_to_time($end2),
                            'end_time'   => sec_to_time($s),
                            'url'        => Url::to(['create', 'date' => jdf::tr_num($session_start_date), 'time1' => sec_to_time($end2), 'time2' => sec_to_time($s)]),
                            'rowId'      => null
                        ];
                        $start    = $s;
                        $end2     = $e;
                        $last     = 1;
                    }
                }
                elseif ($row['id'] == 3) {
                    if ($last == 1) {
                        $output[] = [
                            'day'        => jdf::jdate('l', strtotime("$gstart")),
                            'date'       => jdf::tr_num($session_start_date),
                            'start_time' => sec_to_time($start),
                            'end_time'   => sec_to_time($end2 > $end ? $end : $end2),
                            'url'        => Url::to(['create', 'date' => jdf::tr_num($session_start_date), 'time1' => sec_to_time($start), 'time2' => sec_to_time($end2 > $end ? $end : $end2)]),
                            'rowId'      => 1
                        ];
                        if ($end2 < $end) {
                            $output[] = [
                                'day'        => jdf::jdate('l', strtotime("$gstart")),
                                'date'       => jdf::tr_num($session_start_date),
                                'start_time' => sec_to_time($end2),
                                'end_time'   => sec_to_time($end),
                                'url'        => Url::to(['create', 'date' => jdf::tr_num($session_start_date), 'time1' => sec_to_time($end2), 'time2' => sec_to_time($end)]),
                                'rowId'      => null
                            ];
                        }
                    }
                    else {
                        $output[] = [
                            'day'        => jdf::jdate('l', strtotime("$gstart")),
                            'date'       => jdf::tr_num($session_start_date),
                            'start_time' => sec_to_time($start),
                            'end_time'   => sec_to_time($end),
                            'url'        => Url::to(['create', 'date' => jdf::tr_num($session_start_date), 'time1' => sec_to_time($start), 'time2' => sec_to_time($end)]),
                            'rowId'      => null
                        ];
                    }
                }
            }
        }
        else {
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
                    'url'        => Url::to(['create', 'date' => $date, 'time1' => $session_start_time, 'time2' => $session_end_time]),
                    'rowId'      => null,
                        //'rowId'      => $day === 'جمعه' ? false : null,
                ];
            }
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