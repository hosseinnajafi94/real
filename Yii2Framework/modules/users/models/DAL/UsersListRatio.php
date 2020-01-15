<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_list_ratio".
 *
 * @property int $id
 * @property string $title
 *
 * @property UsersFamilies[] $usersFamilies
 * @property UsersReagents[] $usersReagents
 */
class UsersListRatio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_list_ratio';
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
    public function getUsersFamilies()
    {
        return $this->hasMany(UsersFamilies::className(), ['ratio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersReagents()
    {
        return $this->hasMany(UsersReagents::className(), ['ratio_id' => 'id']);
    }
}
