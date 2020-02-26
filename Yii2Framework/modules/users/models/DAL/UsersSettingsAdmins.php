<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_settings_admins".
 *
 * @property int $id
 * @property int $settings_id
 * @property int $user_id
 *
 * @property UsersSettings $settings
 * @property Users $user
 */
class UsersSettingsAdmins extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_settings_admins';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['settings_id', 'user_id'], 'required'],
            [['settings_id', 'user_id'], 'integer'],
            [['settings_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersSettings::className(), 'targetAttribute' => ['settings_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'settings_id' => Yii::t('users', 'Settings ID'),
            'user_id' => Yii::t('users', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasOne(UsersSettings::className(), ['id' => 'settings_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
