<?php

namespace app\modules\calendars\models\DAL;

use Yii;

/**
 * This is the model class for table "calendars_requirements".
 *
 * @property int $id
 * @property int $calendar_id
 * @property int $requirement_id
 *
 * @property Calendars $calendar
 * @property CalendarsListRequirements $requirement
 */
class CalendarsRequirements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendars_requirements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calendar_id', 'requirement_id'], 'required'],
            [['calendar_id', 'requirement_id'], 'integer'],
            [['calendar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calendars::className(), 'targetAttribute' => ['calendar_id' => 'id']],
            [['requirement_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalendarsListRequirements::className(), 'targetAttribute' => ['requirement_id' => 'id']],
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
            'requirement_id' => Yii::t('calendars', 'Requirement ID'),
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
    public function getRequirement()
    {
        return $this->hasOne(CalendarsListRequirements::className(), ['id' => 'requirement_id']);
    }
}
