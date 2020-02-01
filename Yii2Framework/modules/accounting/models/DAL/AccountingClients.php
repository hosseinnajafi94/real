<?php

namespace app\modules\accounting\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;
use app\modules\organizations\models\DAL\Organizations;

/**
 * This is the model class for table "accounting_clients".
 *
 * @property int $id
 * @property int|null $organization_id
 * @property string|null $code
 * @property int|null $type_id
 * @property int|null $user_id
 * @property bool|null $is_active
 * @property string|null $descriptions
 * @property bool|null $voucher_allow
 * @property bool|null $budget_allow
 * @property int|null $form_id
 *
 * @property Organizations $organization
 * @property AccountingClientsListTypes $type
 * @property Users $user
 */
class AccountingClients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'type_id', 'user_id', 'form_id'], 'integer'],
            [['is_active', 'voucher_allow', 'budget_allow'], 'boolean'],
            [['descriptions'], 'string'],
            [['code'], 'string', 'max' => 255],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organization_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingClientsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('accounting', 'ID'),
            'organization_id' => Yii::t('accounting', 'Organization ID'),
            'code' => Yii::t('accounting', 'Code'),
            'type_id' => Yii::t('accounting', 'Type ID'),
            'user_id' => Yii::t('accounting', 'User ID'),
            'is_active' => Yii::t('accounting', 'Is Active'),
            'descriptions' => Yii::t('accounting', 'Descriptions'),
            'voucher_allow' => Yii::t('accounting', 'Voucher Allow'),
            'budget_allow' => Yii::t('accounting', 'Budget Allow'),
            'form_id' => Yii::t('accounting', 'Form ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'organization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(AccountingClientsListTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
