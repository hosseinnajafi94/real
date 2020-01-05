<?php

namespace app\modules\calendars\models\DAL;

use Yii;

/**
 * This is the model class for table "calendars_events".
 *
 * @property int $id
 * @property int $calendar_id
 * @property string $datetime
 * @property int $done
 *
 * @property Calendars $calendar
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
            [['calendar_id', 'datetime', 'done'], 'required'],
            [['calendar_id', 'done'], 'integer'],
            [['datetime'], 'safe'],
            [['calendar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calendars::className(), 'targetAttribute' => ['calendar_id' => 'id']],
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
}
