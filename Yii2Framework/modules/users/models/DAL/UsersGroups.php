<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_groups".
 *
 * @property int $id
 * @property int $user_id
 * @property int $group_id
 *
 * @property Users $user
 * @property UsersListGroups $group
 */
class UsersGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'group_id'], 'required'],
            [['user_id', 'group_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListGroups::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'user_id' => Yii::t('users', 'User ID'),
            'group_id' => Yii::t('users', 'Group ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(UsersListGroups::className(), ['id' => 'group_id']);
    }
}
