<?php

namespace app\modules\tcoding\models\DAL;

use Yii;

/**
 * This is the model class for table "list_month_day".
 *
 * @property int $id
 * @property string $title
 *
 * @property Users[] $users
 * @property Users[] $users0
 */
class ListMonthDay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_month_day';
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
            'id' => Yii::t('tcoding', 'ID'),
            'title' => Yii::t('tcoding', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['from_day_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers0()
    {
        return $this->hasMany(Users::className(), ['to_day_id' => 'id']);
    }
}
