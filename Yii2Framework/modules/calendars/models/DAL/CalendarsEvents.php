<?php

namespace app\modules\calendars\models\DAL;

use Yii;

/**
 * This is the model class for table "calendars_events".
 *
 * @property int $id
 * @property int $alarm_id
 * @property int $calendar_id
 * @property string $datetime
 * @property int $done
 *
 * @property Calendars $calendar
 * @property CalendarsAlarms $alarm
 */
class CalendarsEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendars_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alarm_id', 'calendar_id', 'datetime', 'done'], 'required'],
            [['alarm_id', 'calendar_id', 'done'], 'integer'],
            [['datetime'], 'safe'],
            [['calendar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calendars::className(), 'targetAttribute' => ['calendar_id' => 'id']],
            [['alarm_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalendarsAlarms::className(), 'targetAttribute' => ['alarm_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('calendars', 'ID'),
            'alarm_id' => Yii::t('calendars', 'Alarm ID'),
            'calendar_id' => Yii::t('calendars', 'Calendar ID'),
            'datetime' => Yii::t('calendars', 'Datetime'),
            'done' => Yii::t('calendars', 'Done'),
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
    public function getAlarm()
    {
        return $this->hasOne(CalendarsAlarms::className(), ['id' => 'alarm_id']);
    }
}
