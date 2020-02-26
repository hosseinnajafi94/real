<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_loan_installment".
 *
 * @property int $id
 * @property int $loan_id
 * @property string $date تاریخ قسط
 * @property string $amount مبلغ قسط
 *
 * @property UsersLoans $id0
 */
class UsersLoanInstallment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_loan_installment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['loan_id', 'date', 'amount'], 'required'],
            [['loan_id'], 'integer'],
            [['date'], 'safe'],
            [['amount'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersLoans::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'loan_id' => Yii::t('users', 'Loan ID'),
            'date' => Yii::t('users', 'Date'),
            'amount' => Yii::t('users', 'Amount'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(UsersLoans::className(), ['id' => 'id']);
    }
}
