<?php

namespace app\modules\users\models\DAL;

use Yii;
use app\modules\tcoding\models\DAL\ListGenders;
use app\modules\tcoding\models\DAL\ListDegree;

/**
 * This is the model class for table "users_families".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $fname
 * @property string|null $lname
 * @property string|null $nationalcode
 * @property int|null $gender_id
 * @property string|null $birthday
 * @property string|null $birthplace
 * @property int|null $ratio_id
 * @property int|null $degree_id
 * @property string|null $job
 * @property string|null $phone
 * @property string|null $address
 * @property int|null $under_assignment
 *
 * @property Users $user
 * @property ListGenders $gender
 * @property UsersListRatio $ratio
 * @property ListDegree $degree
 */
class UsersFamilies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_families';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'gender_id', 'ratio_id', 'degree_id', 'under_assignment'], 'integer'],
            [['birthday'], 'safe'],
            [['fname', 'lname', 'nationalcode', 'birthplace', 'job', 'phone', 'address'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListGenders::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['ratio_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListRatio::className(), 'targetAttribute' => ['ratio_id' => 'id']],
            [['degree_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListDegree::className(), 'targetAttribute' => ['degree_id' => 'id']],
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
            'nationalcode' => Yii::t('users', 'Nationalcode'),
            'gender_id' => Yii::t('users', 'Gender ID'),
            'birthday' => Yii::t('users', 'Birthday'),
            'birthplace' => Yii::t('users', 'Birthplace'),
            'ratio_id' => Yii::t('users', 'Ratio ID'),
            'degree_id' => Yii::t('users', 'Degree ID'),
            'job' => Yii::t('users', 'Job'),
            'phone' => Yii::t('users', 'Phone'),
            'address' => Yii::t('users', 'Address'),
            'under_assignment' => Yii::t('users', 'Under Assignment'),
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
    public function getGender()
    {
        return $this->hasOne(ListGenders::className(), ['id' => 'gender_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatio()
    {
        return $this->hasOne(UsersListRatio::className(), ['id' => 'ratio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDegree()
    {
        return $this->hasOne(ListDegree::className(), ['id' => 'degree_id']);
    }
}
