<?php

namespace app\modules\calendars\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;

/**
 * This is the model class for table "calendars_sections".
 *
 * @property int $id
 * @property int $type_id
 * @property int $section_id
 * @property int $user_id
 *
 * @property CalendarsListType $type
 * @property CalendarsListSections $section
 * @property Users $user
 */
class CalendarsSections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendars_sections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'section_id', 'user_id'], 'required'],
            [['type_id', 'section_id', 'user_id'], 'integer'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalendarsListType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalendarsListSections::className(), 'targetAttribute' => ['section_id' => 'id']],
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
            'type_id' => Yii::t('calendars', 'Type ID'),
            'section_id' => Yii::t('calendars', 'Section ID'),
            'user_id' => Yii::t('calendars', 'User ID'),
        ];
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
    public function getSection()
    {
        return $this->hasOne(CalendarsListSections::className(), ['id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
