<?php

namespace app\modules\calendars\models\DAL;

use Yii;

/**
 * This is the model class for table "calendars_for_information".
 *
 * @property int $id
 * @property int $calendar_id
 * @property int $user_id
 *
 * @property Calendars $calendar
 * @property Users $user
 */
class CalendarsForInformation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendars_for_information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calendar_id', 'user_id'], 'required'],
            [['calendar_id', 'user_id'], 'integer'],
            [['calendar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calendars::className(), 'targetAttribute' => ['calendar_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => Yii::t('calendars', 'User ID'),
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
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
