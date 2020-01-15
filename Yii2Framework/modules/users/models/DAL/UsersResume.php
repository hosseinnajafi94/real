<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_resume".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $company_name
 * @property int|null $type_id
 * @property string|null $job
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $termination
 * @property int|null $salary
 * @property int|null $insurance
 * @property string|null $phone
 * @property string|null $address
 * @property int|null $points
 *
 * @property Users $user
 * @property UsersResumeListType $type
 */
class UsersResume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_resume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'type_id', 'salary', 'insurance', 'points'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['company_name', 'job', 'termination', 'phone', 'address'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersResumeListType::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'company_name' => Yii::t('users', 'Company Name'),
            'type_id' => Yii::t('users', 'Type ID'),
            'job' => Yii::t('users', 'Job'),
            'start_date' => Yii::t('users', 'Resume Start Date'),
            'end_date' => Yii::t('users', 'Resume End Date'),
            'termination' => Yii::t('users', 'Termination'),
            'salary' => Yii::t('users', 'Salary'),
            'insurance' => Yii::t('users', 'Insurance'),
            'phone' => Yii::t('users', 'Phone'),
            'address' => Yii::t('users', 'Address'),
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
        return $this->hasOne(UsersResumeListType::className(), ['id' => 'type_id']);
    }
}
