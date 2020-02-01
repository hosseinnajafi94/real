<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_costs".
 *
 * @property int $id
 * @property int $type_id
 * @property int|null $cost_type_id
 * @property string $title
 * @property string $code
 * @property bool $is_active
 * @property string|null $descriptions
 * @property bool $voucher_allow
 * @property bool $budget_allow
 * @property int|null $form_id
 *
 * @property AccountingCostsListTypes $type
 * @property AccountingCostsListCostTypes $costType
 * @property AccountingCostsUnits[] $accountingCostsUnits
 */
class AccountingCosts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_costs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'title', 'code'], 'required'],
            [['type_id', 'cost_type_id', 'form_id'], 'integer'],
            [['is_active', 'voucher_allow', 'budget_allow'], 'boolean'],
            [['title', 'code', 'descriptions'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingCostsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['cost_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingCostsListCostTypes::className(), 'targetAttribute' => ['cost_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('accounting', 'ID'),
            'type_id' => Yii::t('accounting', 'Type ID'),
            'cost_type_id' => Yii::t('accounting', 'Cost Type ID'),
            'title' => Yii::t('accounting', 'Title'),
            'code' => Yii::t('accounting', 'Code'),
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
    public function getType()
    {
        return $this->hasOne(AccountingCostsListTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCostType()
    {
        return $this->hasOne(AccountingCostsListCostTypes::className(), ['id' => 'cost_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountingCostsUnits()
    {
        return $this->hasMany(AccountingCostsUnits::className(), ['cost_id' => 'id']);
    }
}
