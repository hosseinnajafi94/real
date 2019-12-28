<?php

namespace app\modules\calendars\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;

/**
 * This is the model class for table "calendars".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $favcolor
 * @property int|null $type_id
 * @property int|null $status_id
 * @property string|null $location
 * @property string|null $start_time
 * @property string|null $end_time
 * @property int|null $time_id
 * @property int|null $period_id
 * @property int|null $alarm_type_id
 * @property string|null $description
 * @property string|null $file
 *
 * @property Users $user
 * @property CalendarsListType $type
 * @property CalendarsListStatus $status
 * @property CalendarsListTime $time
 * @property CalendarsListPeriod $period
 * @property CalendarsListAlarmType $alarmType
 */
class Calendars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type_id', 'status_id', 'time_id', 'period_id', 'alarm_type_id'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
            [['description'], 'string'],
            [['title', 'favcolor', 'location', 'file'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalendarsListType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalendarsListStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
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
            'user_id' => Yii::t('calendars', 'User ID'),
            'title' => Yii::t('calendars', 'Title'),
            'favcolor' => Yii::t('calendars', 'Favcolor'),
            'type_id' => Yii::t('calendars', 'Type ID'),
            'status_id' => Yii::t('calendars', 'Status ID'),
            'location' => Yii::t('calendars', 'Location'),
            'start_time' => Yii::t('calendars', 'Start Time'),
            'end_time' => Yii::t('calendars', 'End Time'),
            'time_id' => Yii::t('calendars', 'Time ID'),
            'period_id' => Yii::t('calendars', 'Period ID'),
            'alarm_type_id' => Yii::t('calendars', 'Alarm Type ID'),
            'description' => Yii::t('calendars', 'Description'),
            'file' => Yii::t('calendars', 'File'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(CalendarsListType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(CalendarsListStatus::className(), ['id' => 'status_id']);
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
}
