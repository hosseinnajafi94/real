<?php

namespace app\modules\calendars\models\DAL;

use Yii;

/**
 * This is the model class for table "calendars_list_type".
 *
 * @property int $id
 * @property string $title
 * @property string|null $descriptions
 *
 * @property Calendars[] $calendars
 * @property CalendarsSections[] $calendarsSections
 */
class CalendarsListType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendars_list_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['descriptions'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('calendars', 'ID'),
            'title' => Yii::t('calendars', 'Title'),
            'descriptions' => Yii::t('calendars', 'Descriptions'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendars()
    {
        return $this->hasMany(Calendars::className(), ['type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarsSections()
    {
        return $this->hasMany(CalendarsSections::className(), ['type_id' => 'id']);
    }
}
