<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_settings".
 *
 * @property int $id
 * @property string $section
 * @property int $type_id
 *
 * @property UsersSettingsListTypes $type
 * @property UsersSettingsAdmins[] $usersSettingsAdmins
 */
class UsersSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section', 'type_id'], 'required'],
            [['type_id'], 'integer'],
            [['section'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersSettingsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'section' => Yii::t('users', 'Section'),
            'type_id' => Yii::t('users', 'Type ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(UsersSettingsListTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersSettingsAdmins()
    {
        return $this->hasMany(UsersSettingsAdmins::className(), ['settings_id' => 'id']);
    }
}
