<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_list_groups".
 *
 * @property int $id آیدی
 * @property string $name نام گروه
 * @property int $admin_id مدیر
 *
 * @property UsersGroups[] $usersGroups
 * @property Users $admin
 * @property UsersListGroupsPermissions[] $usersListGroupsPermissions
 */
class UsersListGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_list_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'admin_id'], 'required'],
            [['admin_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['admin_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'name' => Yii::t('users', 'Name'),
            'admin_id' => Yii::t('users', 'Admin ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersGroups()
    {
        return $this->hasMany(UsersGroups::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Users::className(), ['id' => 'admin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersListGroupsPermissions()
    {
        return $this->hasMany(UsersListGroupsPermissions::className(), ['group_id' => 'id']);
    }
}
