<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_descriptions".
 *
 * @property int $id
 * @property int $user_id
 * @property int $type_id
 * @property string $descriptions
 *
 * @property Users $user
 * @property UsersDescriptionsListTypes $type
 */
class UsersDescriptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_descriptions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type_id', 'descriptions'], 'required'],
            [['user_id', 'type_id'], 'integer'],
            [['descriptions'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersDescriptionsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'type_id' => Yii::t('users', 'Type ID'),
            'descriptions' => Yii::t('users', 'Descriptions'),
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
    public function getType()
    {
        return $this->hasOne(UsersDescriptionsListTypes::className(), ['id' => 'type_id']);
    }
}
