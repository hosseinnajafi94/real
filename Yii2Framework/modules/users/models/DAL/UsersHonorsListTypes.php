<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_honors_list_types".
 *
 * @property int $id
 * @property string $title
 *
 * @property UsersHonors[] $usersHonors
 */
class UsersHonorsListTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_honors_list_types';
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
            'id' => Yii::t('users', 'ID'),
            'title' => Yii::t('users', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersHonors()
    {
        return $this->hasMany(UsersHonors::className(), ['type_id' => 'id']);
    }
}
