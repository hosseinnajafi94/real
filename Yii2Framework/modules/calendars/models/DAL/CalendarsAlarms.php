<?php

namespace app\modules\calendars\models\DAL;

use Yii;

/**
 * This is the model class for table "calendars_alarms".
 *
 * @property int $id
 * @property int $calendar_id
 * @property int|null $time_id
 * @property int|null $period_id
 * @property int|null $alarm_type_id
 * @property string|null $message
 *
 * @property Calendars $calendar
 * @property CalendarsListTime $time
 * @property CalendarsListPeriod $period
 * @property CalendarsListAlarmType $alarmType
 * @property CalendarsEvents[] $calendarsEvents
 */
class CalendarsAlarms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendars_alarms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calendar_id'], 'required'],
            [['calendar_id', 'time_id', 'period_id', 'alarm_type_id'], 'integer'],
            [['message'], 'string'],
            [['calendar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calendars::className(), 'targetAttribute' => ['calendar_id' => 'id']],
            [['time_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalendarsListTime::className(), 'targetAttribute' => ['time_id' => 'id']],
            [['period_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalendarsListPeriod::className(), 'targetAttribute' => ['period_id' => 'id']],
            [['alarm_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalendarsListAlarmType::className(), 'targetAttribute' => ['alarm_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('calendars', 'ID'),
            'calendar_id' => Yii::t('calendars', 'Calendar ID'),
            'time_id' => Yii::t('calendars', 'Time ID'),
            'period_id' => Yii::t('calendars', 'Period ID'),
            'alarm_type_id' => Yii::t('calendars', 'Alarm Type ID'),
            'message' => Yii::t('calendars', 'Message'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendar()
    {
        return $this->hasOne(Calendars::className(), ['id' => 'calendar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTime()
    {
        return $this->hasOne(CalendarsListTime::className(), ['id' => 'time_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriod()
    {
        return $this->hasOne(CalendarsListPeriod::className(), ['id' => 'period_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlarmType()
    {
        return $this->hasOne(CalendarsListAlarmType::className(), ['id' => 'alarm_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarsEvents()
    {
        return $this->hasMany(CalendarsEvents::className(), ['alarm_id' => 'id']);
    }
}
