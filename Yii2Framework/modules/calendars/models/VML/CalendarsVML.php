<?php
namespace app\modules\calendars\models\VML;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\config\components\functions;
use app\modules\users\models\SRL\UsersSRL;
use app\modules\calendars\models\DAL\Calendars;
use app\modules\calendars\models\DAL\CalendarsUsers;
use app\modules\calendars\models\DAL\CalendarsEvents;
use app\modules\calendars\models\DAL\CalendarsAlarms;
use app\modules\calendars\models\DAL\CalendarsForInformation;
use app\modules\calendars\models\SRL\CalendarsListTimeSRL;
use app\modules\calendars\models\SRL\CalendarsListTypeSRL;
use app\modules\calendars\models\SRL\CalendarsListStatusSRL;
use app\modules\calendars\models\SRL\CalendarsListPeriodSRL;
use app\modules\calendars\models\SRL\CalendarsListAlarmTypeSRL;
use app\modules\calendars\models\SRL\CalendarsListRequirementsSRL;
use app\modules\calendars\models\DAL\CalendarsRequirements;
use app\modules\calendars\models\VML\CalendarsAlarmsVML;
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
    public $message;
    public $has_reception;
    public $catering_id;
    public $users             = [];
    public $requirements      = [];
    public $for_informations  = [];
    //
    public $list_type         = [];
    public $list_status       = [];
    public $list_time         = [];
    public $list_period       = [];
    public $list_alarm_type   = [];
    public $list_users        = [];
    public $list_requirements = [];
    //
    public $model;
    //
    public function rules() {
        return [
                [['title', 'favcolor', 'type_id', 'status_id', 'location', 'start_time', 'end_time'], 'required'],
                [['has_reception', 'catering_id', 'type_id', 'status_id', 'time_id', 'period_id', 'alarm_type_id', 'id'], 'integer'],
                [['start_date', 'end_date', 'start_time', 'end_time'], 'safe'],
                [['description', 'message'], 'string'],
                [['title', 'favcolor', 'location'], 'string', 'max' => 255],
                [['file'], 'file', 'extensions' => 'png, jpg, jpeg, gif, zip'],
                [['users', 'requirements', 'for_informations'], 'each', 'rule' => ['integer']]
        ];
    }
    public function attributeLabels() {
        return [
            'id'               => Yii::t('calendars', 'ID'),
            'title'            => Yii::t('calendars', 'Title'),
            'favcolor'         => Yii::t('calendars', 'Favcolor'),
            'type_id'          => Yii::t('calendars', 'Type ID'),
            'status_id'        => Yii::t('calendars', 'Status ID'),
            'location'         => Yii::t('calendars', 'Location'),
            'start_date'       => Yii::t('calendars', 'Start Date'),
            'end_date'         => Yii::t('calendars', 'End Date'),
            'start_time'       => Yii::t('calendars', 'Start Time'),
            'end_time'         => Yii::t('calendars', 'End Time'),
            'time_id'          => Yii::t('calendars', 'Time ID'),
            'period_id'        => Yii::t('calendars', 'Period ID'),
            'alarm_type_id'    => Yii::t('calendars', 'Alarm Type ID'),
            'description'      => Yii::t('calendars', 'Description'),
            'file'             => Yii::t('calendars', 'File'),
            'users'            => Yii::t('calendars', 'Users'),
            'message'          => Yii::t('calendars', 'Message'),
            'catering_id'      => Yii::t('calendars', 'Catering ID'),
            'has_reception'    => Yii::t('calendars', 'Has Reception'),
            'requirements'     => Yii::t('calendars', 'Requirements'),
            'for_informations' => Yii::t('calendars', 'For Informations'),
        ];
    }
    public function attributeHints() {
        return [
            'file' => Yii::t('calendars', 'Extensions: {exts}', ['exts' => 'png, jpg, jpeg, gif, zip'])
        ];
    }
    public function loaditems() {
        $this->list_type         = CalendarsListTypeSRL::getItems();
        $this->list_status       = CalendarsListStatusSRL::getItems();
        $this->list_time         = CalendarsListTimeSRL::getItems();
        $this->list_period       = CalendarsListPeriodSRL::getItems();
        $this->list_alarm_type   = CalendarsListAlarmTypeSRL::getItems();
        $this->list_users        = UsersSRL::getItems();
        $this->list_requirements = CalendarsListRequirementsSRL::getItems();
        return $this;
    }
    public function save($post) {
//        CalendarsAlarmsVML::news;
        $oldFile = $this->file;
        if (!$this->load($post)) {
            return false;
        }
        $this->start_date = functions::togdate($this->start_date);
        $this->end_date   = functions::togdate($this->end_date);
        $this->file       = UploadedFile::getInstance($this, 'file');
        if (!$this->validate()) {
            return false;
        }

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


        $models = [];
        if (isset($post['CalendarsAlarmsVML'])) {
            for ($index = 0, $count = count($post['CalendarsAlarmsVML']); $index < $count; $index++) {
                $models[] = CalendarsAlarmsVML::newInstance();
            }
            $loaded = CalendarsAlarmsVML::loadMultiple($models, $post);
            if (!$loaded) {
                return false;
            }
        }


        if (!$model->save()) {
            return false;
        }

        CalendarsUsers::deleteAll(['calendar_id' => $model->id]);
        if (is_array($this->users)) {
            foreach ($this->users as $userId) {
                $row              = new CalendarsUsers();
                $row->calendar_id = $model->id;
                $row->user_id     = $userId;
                $row->save();
            }
        }

        CalendarsRequirements::deleteAll(['calendar_id' => $model->id]);
        if (is_array($this->requirements)) {
            foreach ($this->requirements as $requirement_id) {
                $row                 = new CalendarsRequirements();
                $row->calendar_id    = $model->id;
                $row->requirement_id = $requirement_id;
                $row->save();
            }
        }

        CalendarsForInformation::deleteAll(['calendar_id' => $model->id]);
        if (is_array($this->for_informations)) {
            foreach ($this->for_informations as $userId) {
                $row              = new CalendarsForInformation();
                $row->calendar_id = $model->id;
                $row->user_id     = $userId;
                $row->save();
            }
        }

        
        
        CalendarsEvents::deleteAll(['calendar_id' => $model->id]);
        CalendarsAlarms::deleteAll(['calendar_id' => $model->id]);
        
        $days = getDiffDays($model->start_time, $model->end_time) + 1;
        foreach ($models as $row) {
            $row->calendar_id = $model->id;
            if ($row->save()) {
                for ($index = 0; $index < $days; $index += $row->model->period->days) {
                    $datetime1 = date('Y-m-d H:i:s', strtotime($model->start_time . " +$index days"));
                    $datetime2 = date('Y-m-d H:i:s', strtotime($datetime1) - $row->model->time->times);
                    $model1 = new CalendarsEvents();
                    $model1->alarm_id = $row->id;
                    $model1->calendar_id = $model->id;
                    $model1->datetime = $datetime2;
                    $model1->done = 0;
                    $model1->save();
                }
            }
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
        $users       = $model->getCalendarsUsers()->orderBy(['id' => SORT_ASC])->all();
        foreach ($users as $user) {
            $data->users[] = $user->user_id;
        }
        static::populate($data, $model);
        $s                = explode(' ', $model->start_time);
        $e                = explode(' ', $model->end_time);
        $data->start_date = functions::tojdate($s[0]);
        $data->start_time = $s[1];
        $data->end_date   = functions::tojdate($e[0]);
        $data->end_time   = $e[1];
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
        $dest->message       = $source->message;
        $dest->has_reception = $source->has_reception;
        $dest->catering_id   = $source->catering_id;
    }
    public function getEvents($id = null) {

        $list_time       = CalendarsListTimeSRL::getItems();
        $list_period     = CalendarsListPeriodSRL::getItems();
        $list_alarm_type = CalendarsListAlarmTypeSRL::getItems();
//        $list_requirements = CalendarsListRequirementsSRL::getItems();

        if ($id === null) {
            $events = Calendars::find()->select('*, start_time as `start`, end_time as `end`')->asArray()->all();
        }
        else {
            $events = Calendars::find()->select('*, start_time as `start`, end_time as `end`')->where(['id' => $id])->asArray()->all();
        }

        foreach ($events as &$event) {
            $s                   = explode(' ', $event['start_time']);
            $e                   = explode(' ', $event['end_time']);
            $event['start_date'] = functions::tojdate($s[0]);
            $event['end_date']   = functions::tojdate($e[0]);
            $event['start_time'] = $s[1];
            $event['end_time']   = $e[1];

            $requirements          = CalendarsRequirements::find()->where(['calendar_id' => $event['id']])->asArray()->orderBy(['id' => SORT_DESC])->all();
            $event['requirements'] = [];
            foreach ($requirements as $row) {
                $event['requirements'][] = $row['requirement_id'];
            }

            $for_informations          = CalendarsForInformation::find()->where(['calendar_id' => $event['id']])->asArray()->orderBy(['id' => SORT_DESC])->all();
            $event['for_informations'] = [];
            foreach ($for_informations as $row) {
                $event['for_informations'][] = $row['user_id'];
            }

            $event['alarms'] = CalendarsAlarms::find()->where(['calendar_id' => $event['id']])->asArray()->orderBy(['id' => SORT_DESC])->all();
            foreach ($event['alarms'] as &$alarm) {
                $alarm['list_time']       = $list_time;
                $alarm['list_period']     = $list_period;
                $alarm['list_alarm_type'] = $list_alarm_type;
                $alarm['url']             = \yii\helpers\Url::to(['delete-alarm', 'id' => $alarm['id']]);
            }
            $rows  = CalendarsUsers::find()->where(['calendar_id' => $event['id']])->asArray()->all();
            $users = [];
            foreach ($rows as $row) {
                $users[] = $row['user_id'];
            }
            $event['users']           = $users;
            $event['list_type']       = $this->list_type;
            $event['list_status']     = $this->list_status;
            $event['list_time']       = $this->list_time;
            $event['list_period']     = $this->list_period;
            $event['list_alarm_type'] = $this->list_alarm_type;
            $event['list_users']      = $this->list_users;
            $event['list_requirements']      = $this->list_requirements;
        }
        return $events;
    }
}