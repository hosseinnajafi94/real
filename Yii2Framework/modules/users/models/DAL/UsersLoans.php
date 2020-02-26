<?php

namespace app\modules\users\models\DAL;

use Yii;
use \app\modules\organizations\models\DAL\OrganizationsPositions;

/**
 * This is the model class for table "users_loans".
 *
 * @property int $id
 * @property int $type_id نوع
 * @property int $position_id شغل
 * @property int $group_id گروه استخدام
 * @property int $user_id نام کارمند
 * @property int|null $loan_type_id نوع وام
 * @property string $date_request تاریخ در خواست
 * @property string $date_start تاریخ شروع اقساط
 * @property string $date_end تاریخ پایان اقساط
 * @property string $amount مبلغ درخواستی
 * @property string $istallments تعداد اقساط
 * @property int|null $form_id فرم
 *
 * @property UsersLoanInstallment $usersLoanInstallment
 * @property OrganizationsPositions $position
 * @property UsersListHiringGroups $group
 * @property Users $user
 * @property UsersLoanListLoanTypes $loanType
 * @property UsersLoanListTypes $type
 */
class UsersLoans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_loans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'position_id', 'group_id', 'user_id', 'date_request', 'date_start', 'date_end', 'amount', 'istallments'], 'required'],
            [['type_id', 'position_id', 'group_id', 'user_id', 'loan_type_id', 'form_id'], 'integer'],
            [['date_request', 'date_start', 'date_end'], 'safe'],
            [['amount', 'istallments'], 'string', 'max' => 255],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsPositions::className(), 'targetAttribute' => ['position_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListHiringGroups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['loan_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersLoanListLoanTypes::className(), 'targetAttribute' => ['loan_type_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersLoanListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'type_id' => Yii::t('users', 'Type ID'),
            'position_id' => Yii::t('users', 'Position ID'),
            'group_id' => Yii::t('users', 'Group ID'),
            'user_id' => Yii::t('users', 'User ID'),
            'loan_type_id' => Yii::t('users', 'Loan Type ID'),
            'date_request' => Yii::t('users', 'Date Request'),
            'date_start' => Yii::t('users', 'Date Start'),
            'date_end' => Yii::t('users', 'Date End'),
            'amount' => Yii::t('users', 'Amount'),
            'istallments' => Yii::t('users', 'Istallments'),
            'form_id' => Yii::t('users', 'Form ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersLoanInstallment()
    {
        return $this->hasOne(UsersLoanInstallment::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(OrganizationsPositions::className(), ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(UsersListHiringGroups::className(), ['id' => 'group_id']);
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
    public function getLoanType()
    {
        return $this->hasOne(UsersLoanListLoanTypes::className(), ['id' => 'loan_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(UsersLoanListTypes::className(), ['id' => 'type_id']);
    }
}
