<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_favorites".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $type_id
 * @property string|null $description
 * @property int|null $times
 * @property int|null $professional
 *
 * @property Users $user
 * @property UsersFavoritesListTypes $type
 */
class UsersFavorites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_favorites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'type_id', 'times', 'professional'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersFavoritesListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'description' => Yii::t('users', 'Description'),
            'times' => Yii::t('users', 'Times'),
            'professional' => Yii::t('users', 'Professional'),
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
        return $this->hasOne(UsersFavoritesListTypes::className(), ['id' => 'type_id']);
    }
}
