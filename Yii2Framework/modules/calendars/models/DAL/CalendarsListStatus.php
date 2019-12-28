<?php

namespace app\modules\calendars\models\DAL;

use Yii;

/**
 * This is the model class for table "calendars_list_status".
 *
 * @property int $id
 * @property string $title
 *
 * @property Calendars[] $calendars
 */
class CalendarsListStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendars_list_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendars()
    {
        return $this->hasMany(Calendars::className(), ['status_id' => 'id']);
    }
}
