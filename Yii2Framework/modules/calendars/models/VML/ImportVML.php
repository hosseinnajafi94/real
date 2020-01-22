<?php
namespace app\modules\calendars\models\VML;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\config\components\functions;
use PhpOffice\PhpSpreadsheet\IOFactory;
use app\modules\calendars\models\DAL\Calendars;
use app\modules\calendars\models\DAL\CalendarsEvents;
use app\modules\calendars\models\DAL\CalendarsImplementation;
use app\modules\calendars\models\DAL\CalendarsForInformation;
use app\modules\calendars\models\VML\CalendarsAlarmsVML;
class ImportVML extends Model {
    public $file;
    public $favcolor;
    public $type_id;
    public $status_id;
    public $location;
    public $for_informations;
    public $implementations;
    public $start_time = '07:00:00';
    public $end_time   = '07:00:00';
    public function rules() {
        return [
                [['favcolor', 'type_id', 'status_id', 'location', 'start_time', 'end_time'], 'required'],
                [['type_id', 'status_id'], 'integer'],
                [['start_date', 'end_date', 'start_time', 'end_time'], 'safe'],
                [['favcolor', 'location'], 'string', 'max' => 255],
                [['for_informations', 'implementations'], 'each', 'rule' => ['integer']],
                [['file'], 'required'],
                [['file'], 'file', 'extensions' => 'xlsx'],
        ];
    }
    public function attributeLabels() {
        return [
            'file'             => Yii::t('calendars', 'File'),
            'favcolor'         => Yii::t('calendars', 'Favcolor'),
            'type_id'          => Yii::t('calendars', 'Type ID'),
            'status_id'        => Yii::t('calendars', 'Status ID'),
            'location'         => Yii::t('calendars', 'Location'),
            'start_time'       => Yii::t('calendars', 'Start Time'),
            'end_time'         => Yii::t('calendars', 'End Time'),
            'for_informations' => Yii::t('calendars', 'For Informations'),
            'implementations'  => Yii::t('calendars', 'Implementations'),
        ];
    }
    public function attributeHints() {
        return [
            'file' => Yii::t('calendars', 'Extensions: {exts}', ['exts' => 'xlsx'])
        ];
    }
    private function getItems($sheets = []) {
        /* @var $sheets \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet[] */
        $items = [];

        if (count($sheets) === 0) {
            return $items;
        }
        $rows    = $sheets[0]->toArray();
        $matches = [];
        preg_match('/([0-9]+)/', $rows[0][0], $matches);
        if (count($matches) === 0) {
            return $items;
        }
        $year    = $matches[0];
        $monthes = [
            'فروردین'  => '01',
            'اردیبهشت' => '02',
            'خرداد'    => '03',
            'تیر'      => '04',
            'مرداد'    => '05',
            'شهریور'   => '06',
            'مهر'      => '07',
            'آبان'     => '08',
            'آذر'      => '09',
            'دی'       => '10',
            'بهمن'     => '11',
            'اسفند'    => '12'
        ];
        foreach ($sheets as $sheet) {
            $title = $sheet->getTitle();
            if (!isset($monthes[$title])) {
                continue;
            }
            $month = $monthes[$title];
            $rows  = $sheet->toArray();
            for ($index = 2, $count = count($rows); $index < $count; $index++) {
                $row                  = $rows[$index];
                $day                  = (int) $row[1];
                $implementation_steps = $row[7];
                $description          = $row[8];

                if ($day === 0) {
                    continue;
                }
                if (!$implementation_steps && !$description) {
                    continue;
                }
                $subjects = [];
                if ($row[4]) {
                    $subjects[] = $row[4];
                }
                if ($row[5]) {
                    $subjects[] = $row[5];
                }
                if ($row[6]) {
                    $subjects[] = $row[6];
                }
                $subject = implode(' - ', $subjects);
                if (empty($subject)) {
                    continue;
                }

                $day2    = $day < 10 ? '0' . $day : "$day";
                $jdate   = "$year/$month/$day2";
                $gdate   = functions::togdate($jdate);
                $items[] = [$subject, $gdate, $description, $implementation_steps];
            }
        }
        return $items;
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        $this->file = UploadedFile::getInstance($this, 'file');
        if (!$this->validate()) {
            return false;
        }

        $filename = uniqid(time(), true) . '.' . $this->file->extension;
        $this->file->saveAs("uploads/calendars/$filename");
        try {

            $spreadsheet = IOFactory::load("uploads/calendars/$filename");
            $sheets      = $spreadsheet->getAllSheets();
            $items       = $this->getItems($sheets);
//            pre($items);
            foreach ($items as $item) {
                list($subject, $gdate, $description, $implementation_steps) = $item;
                $model                       = new Calendars();
                $model->user_id              = Yii::$app->user->id;
                $model->title                = $subject;
                $model->favcolor             = $this->favcolor;
                $model->type_id              = $this->type_id;
                $model->status_id            = $this->status_id;
                $model->location             = $this->location;
                $model->start_time           = $gdate . ' ' . $this->start_time;
                $model->end_time             = $gdate . ' ' . $this->end_time;
                $model->description          = $description;
                $model->implementation_steps = $implementation_steps;
                $model->save();

                if (is_array($this->for_informations)) {
                    foreach ($this->for_informations as $userId) {
                        $row              = new CalendarsForInformation();
                        $row->calendar_id = $model->id;
                        $row->user_id     = $userId;
                        $row->save();
                    }
                }

                if (is_array($this->implementations)) {
                    foreach ($this->implementations as $userId) {
                        $row              = new CalendarsImplementation();
                        $row->calendar_id = $model->id;
                        $row->user_id     = $userId;
                        $row->save();
                    }
                }
                
                $models = [];
                if (isset($post['CalendarsAlarmsVML'])) {
                    for ($index = 0, $count = count($post['CalendarsAlarmsVML']); $index < $count; $index++) {
                        $models[] = CalendarsAlarmsVML::newInstance();
                    }
                    $loaded = CalendarsAlarmsVML::loadMultiple($models, $post);
                    if (!$loaded) {
                        continue;
                    }
                }

                $days = getDiffDays($model->start_time, $model->end_time) + 1;
                foreach ($models as $row) {
                    $row->calendar_id = $model->id;
                    $row->message = $model->title;
                    if ($row->save()) {
                        for ($index = 0; $index < $days; $index += $row->model->period->days) {
                            $datetime1           = date('Y-m-d H:i:s', strtotime($model->start_time . " +$index days"));
                            $datetime2           = date('Y-m-d H:i:s', strtotime($datetime1) - $row->model->time->times);
                            $model1              = new CalendarsEvents();
                            $model1->alarm_id    = $row->id;
                            $model1->calendar_id = $model->id;
                            $model1->datetime    = $datetime2;
                            $model1->done        = 0;
                            $model1->save();
                        }
                    }
                }
            }
            return true;
        }
        catch (\Exception $exc) {
            $exc->getCode();
            return false;
        }
    }
}