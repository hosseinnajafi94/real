<?php

namespace app\modules\administration\models\DAL;

use Yii;

/**
 * This is the model class for table "users_list_groups_permissions".
 *
 * @property int $id
 * @property int $group_id
 * @property int $module_id
 *
 * @property UsersListGroups $group
 * @property SysModules $module
 */
class UsersListGroupsPermissions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_list_groups_permissions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'module_id'], 'required'],
            [['group_id', 'module_id'], 'integer'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListGroups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysModules::className(), 'targetAttribute' => ['module_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('administration', 'ID'),
            'group_id' => Yii::t('administration', 'Group ID'),
            'module_id' => Yii::t('administration', 'Module ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(UsersListGroups::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(SysModules::className(), ['id' => 'module_id']);
    }
}
