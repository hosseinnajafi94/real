<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_loan_list_loan_types".
 *
 * @property int $id
 * @property string $title
 *
 * @property UsersLoans[] $usersLoans
 */
class UsersLoanListLoanTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_loan_list_loan_types';
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
    public function getUsersLoans()
    {
        return $this->hasMany(UsersLoans::className(), ['loan_type_id' => 'id']);
    }
}
