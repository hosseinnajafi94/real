<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_list_insurance_type".
 *
 * @property int $id
 * @property string $title
 *
 * @property Users[] $users
 */
class UsersListInsuranceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_list_insurance_type';
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
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['insurance_type_id' => 'id']);
    }
}
