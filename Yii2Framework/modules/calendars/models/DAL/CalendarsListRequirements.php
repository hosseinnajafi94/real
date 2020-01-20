<?php

namespace app\modules\calendars\models\DAL;

use Yii;

/**
 * This is the model class for table "calendars_list_requirements".
 *
 * @property int $id
 * @property string $title
 *
 * @property CalendarsRequirements[] $calendarsRequirements
 */
class CalendarsListRequirements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendars_list_requirements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarsRequirements()
    {
        return $this->hasMany(CalendarsRequirements::className(), ['requirement_id' => 'id']);
    }
}
