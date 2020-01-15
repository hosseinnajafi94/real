<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_reagents".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $fname
 * @property string|null $lname
 * @property string|null $job
 * @property int|null $ratio_id
 * @property int|null $dating_period
 * @property string|null $phone
 * @property string|null $address
 *
 * @property Users $user
 * @property UsersListRatio $ratio
 */
class UsersReagents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_reagents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'ratio_id', 'dating_period'], 'integer'],
            [['fname', 'lname', 'job', 'phone', 'address'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['ratio_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListRatio::className(), 'targetAttribute' => ['ratio_id' => 'id']],
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
            'fname' => Yii::t('users', 'Fname'),
            'lname' => Yii::t('users', 'Lname'),
            'job' => Yii::t('users', 'Job'),
            'ratio_id' => Yii::t('users', 'Ratio ID'),
            'dating_period' => Yii::t('users', 'Dating Period'),
            'phone' => Yii::t('users', 'Phone'),
            'address' => Yii::t('users', 'Address'),
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
    public function getRatio()
    {
        return $this->hasOne(UsersListRatio::className(), ['id' => 'ratio_id']);
    }
}
