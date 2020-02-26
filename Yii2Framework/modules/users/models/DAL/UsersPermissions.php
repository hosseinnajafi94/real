<?php

namespace app\modules\users\models\DAL;

use Yii;
use app\modules\administration\models\DAL\SysModules;

/**
 * This is the model class for table "users_permissions".
 *
 * @property int $id
 * @property int $user_id
 * @property int $module_id
 *
 * @property Users $user
 * @property SysModules $module
 */
class UsersPermissions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_permissions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'module_id'], 'required'],
            [['user_id', 'module_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysModules::className(), 'targetAttribute' => ['module_id' => 'id']],
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
            'module_id' => Yii::t('users', 'Module ID'),
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
    public function getModule()
    {
        return $this->hasOne(SysModules::className(), ['id' => 'module_id']);
    }
}
