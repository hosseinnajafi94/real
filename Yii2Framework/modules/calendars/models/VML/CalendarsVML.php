<?php
namespace app\modules\calendars\models\VML;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\config\components\functions;
use app\modules\calendars\models\DAL\Calendars;
use app\modules\calendars\models\SRL\CalendarsListTypeSRL;
use app\modules\calendars\models\SRL\CalendarsListStatusSRL;
use app\modules\calendars\models\SRL\CalendarsListTimeSRL;
use app\modules\calendars\models\SRL\CalendarsListPeriodSRL;
use app\modules\calendars\models\SRL\CalendarsListAlarmTypeSRL;
class CalendarsVML extends Model {
    public $id;
    public $title;
    public $favcolor;
    public $type_id;
    public $status_id;
    public $location;
    public $start_date;
    public $end_date;
    public $start_time;
    public $end_time;
    public $time_id;
    public $period_id;
    public $alarm_type_id;
    public $description;
    public $file;
    //
    public $list_type       = [];
    public $list_status     = [];
    public $list_time       = [];
    public $list_period     = [];
    public $list_alarm_type = [];
    //
    public $model;
    //
    public function rules() {
        return [
                [['type_id', 'status_id', 'time_id', 'period_id', 'alarm_type_id', 'id'], 'integer'],
                [['start_date', 'end_date', 'start_time', 'end_time'], 'safe'],
                [['description'], 'string'],
                [['title', 'favcolor', 'location'], 'string', 'max' => 255],
                [['file'], 'file', 'extensions' => 'png, jpg, jpeg, gif, zip']
        ];
    }
    public function attributeLabels() {
        return [
            'id'            => Yii::t('calendars', 'ID'),
            'title'         => Yii::t('calendars', 'Title'),
            'favcolor'      => Yii::t('calendars', 'Favcolor'),
            'type_id'       => Yii::t('calendars', 'Type ID'),
            'status_id'     => Yii::t('calendars', 'Status ID'),
            'location'      => Yii::t('calendars', 'Location'),
            'start_date'    => Yii::t('calendars', 'Start Date'),
            'end_date'      => Yii::t('calendars', 'End Date'),
            'start_time'    => Yii::t('calendars', 'Start Time'),
            'end_time'      => Yii::t('calendars', 'End Time'),
            'time_id'       => Yii::t('calendars', 'Time ID'),
            'period_id'     => Yii::t('calendars', 'Period ID'),
            'alarm_type_id' => Yii::t('calendars', 'Alarm Type ID'),
            'description'   => Yii::t('calendars', 'Description'),
            'file'          => Yii::t('calendars', 'File'),
        ];
    }
    public function attributeHints() {
        return [
            'file' => Yii::t('calendars', 'Extensions: {exts}', ['exts' => 'png, jpg, jpeg, gif, zip'])
        ];
    }
    public function loaditems() {
        $this->list_type       = CalendarsListTypeSRL::getItems();
        $this->list_status     = CalendarsListStatusSRL::getItems();
        $this->list_time       = CalendarsListTimeSRL::getItems();
        $this->list_period     = CalendarsListPeriodSRL::getItems();
        $this->list_alarm_type = CalendarsListAlarmTypeSRL::getItems();
        return $this;
    }
    public function save($post) {
        $oldFile = $this->file;
        if (!$this->load($post)) {
            return false;
        }
        $this->start_date = \app\config\components\functions::togdate($this->start_date);
        $this->end_date   = \app\config\components\functions::togdate($this->end_date);
        $this->file       = UploadedFile::getInstance($this, 'file');
        if (!$this->validate()) {
            return false;
        }
        $this->end_date   = date('Y-m-d', strtotime($this->end_date . ' +1 day'));
        $this->start_time = $this->start_date . ' ' . $this->start_time;
        $this->end_time   = $this->end_date . ' ' . $this->end_time;
        /* @var $model OrganizationsPlanning */
        $model            = $this->model;
        if ($this->id) {
            $data = $this->find($this->id);
            if ($data === null) {
                return false;
            }
            $model = $data->model;
        }
        if ($this->file) {
            $filename   = uniqid(time(), true) . '.' . $this->file->extension;
            $this->file->saveAs("uploads/calendars/$filename");
            $this->file = $filename;
        }
        else {
            $this->file = $oldFile;
        }
        $this->populate($model, $this);
        $model->user_id = Yii::$app->user->id;
        if (!$model->save()) {
            return false;
        }
        $this->id = $model->id;
        return true;
    }
    public static function newInstance() {
        $data        = new static();
        $data->model = new Calendars();
        return $data;
    }
    public static function find($id) {
        $model = Calendars::findOne($id);
        if ($model === null) {
            return null;
        }
        $data        = new static();
        $data->model = $model;
        static::populate($data, $model);
        return $data;
    }
    public static function populate($dest, $source) {
        $dest->title         = $source->title;
        $dest->favcolor      = $source->favcolor;
        $dest->type_id       = $source->type_id;
        $dest->status_id     = $source->status_id;
        $dest->location      = $source->location;
        $dest->start_time    = $source->start_time;
        $dest->end_time      = $source->end_time;
        $dest->time_id       = $source->time_id;
        $dest->period_id     = $source->period_id;
        $dest->alarm_type_id = $source->alarm_type_id;
        $dest->description   = $source->description;
        $dest->file          = $source->file;
    }
    public function getEvents() {
        $events = Calendars::find()->select('*, cast(start_time as date) as `start`, cast(end_time as date) as `end`')->asArray()->all();
        foreach ($events as &$row) {
            $s                      = explode(' ', $row['start_time']);
            $e                      = explode(' ', $row['end_time']);
            $row['start_date']      = functions::tojdate($s[0]);
            $row['end_date']        = functions::tojdate(date('Y-m-d', strtotime($e[0] . ' -1 day')));
            $row['start_time']      = $s[1];
            $row['end_time']        = $e[1];
            $row['list_type']       = $this->list_type;
            $row['list_status']     = $this->list_status;
            $row['list_time']       = $this->list_time;
            $row['list_period']     = $this->list_period;
            $row['list_alarm_type'] = $this->list_alarm_type;
        }
        return $events;
    }
}