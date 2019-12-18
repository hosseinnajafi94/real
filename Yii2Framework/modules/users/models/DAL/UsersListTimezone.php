<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_list_timezone".
 *
 * @property int $id
 * @property string $title
 *
 * @property Users[] $users
 */
class UsersListTimezone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_list_timezone';
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
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['timezone_id' => 'id']);
    }
}
