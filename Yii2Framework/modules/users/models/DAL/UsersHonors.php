<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_honors".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $type_id
 * @property string|null $descriptions
 * @property int|null $points
 *
 * @property Users $user
 * @property UsersHonorsListTypes $type
 */
class UsersHonors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_honors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'type_id', 'points'], 'integer'],
            [['descriptions'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersHonorsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'points' => Yii::t('users', 'Points'),
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
        return $this->hasOne(UsersHonorsListTypes::className(), ['id' => 'type_id']);
    }
}
