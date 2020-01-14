<?php
namespace app\modules\calendars\models\VML;
use Yii;
use yii\base\Model;
use app\modules\calendars\models\DAL\CalendarsAlarms;
use app\modules\calendars\models\SRL\CalendarsListTimeSRL;
use app\modules\calendars\models\SRL\CalendarsListPeriodSRL;
use app\modules\calendars\models\SRL\CalendarsListAlarmTypeSRL;
class CalendarsAlarmsVML extends Model {
    public $id;
    public $calendar_id;
    public $time_id;
    public $period_id;
    public $alarm_type_id;
    public $message;
    //
    public $list_time = [];
    public $list_period = [];
    public $list_alarm_type = [];
    //
    public $model;
    public function rules() {
        return [
            [['calendar_id', 'time_id', 'period_id', 'alarm_type_id', 'message'], 'required'],
            [['id', 'calendar_id', 'time_id', 'period_id', 'alarm_type_id'], 'integer'],
            [['message'], 'string'],
        ];
    }
    public function attributeLabels() {
        return [
            'id'            => Yii::t('calendars', 'ID'),
            'time_id'       => Yii::t('calendars', 'Time ID'),
            'period_id'     => Yii::t('calendars', 'Period ID'),
            'alarm_type_id' => Yii::t('calendars', 'Alarm Type ID'),
            'calendar_id'   => Yii::t('calendars', 'Calendar ID'),
            'message'       => Yii::t('calendars', 'Message'),
        ];
    }
    public static function newInstance() {
        $data        = new static();
        $data->model = new CalendarsAlarms();
        return $data;
    }
    public function loaditems() {
        $this->list_time       = CalendarsListTimeSRL::getItems();
        $this->list_period     = CalendarsListPeriodSRL::getItems();
        $this->list_alarm_type = CalendarsListAlarmTypeSRL::getItems();
        return $this;
    }
    public function save() {
//        if (!$this->load($post)) {
//            return false;
//        }
        if (!$this->validate()) {
            return false;
        }
        $model              = $this->model;
        if ($this->id) {
            $model = CalendarsAlarms::findOne($this->id);
            if ($model === null) {
                return false;
            }
        }
        $model->calendar_id = $this->calendar_id;
        $model->time_id = $this->time_id;
        $model->period_id = $this->period_id;
        $model->alarm_type_id = $this->alarm_type_id;
        $model->message = $this->message;
        if (!$model->save()) {
            return false;
        }
        $this->id = $model->id;
        return true;
    }
}