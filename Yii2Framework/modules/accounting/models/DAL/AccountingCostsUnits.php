<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_costs_units".
 *
 * @property int $id
 * @property int $cost_id
 * @property int $organization_unit_id
 *
 * @property AccountingCosts $cost
 * @property OrganizationsUnits $organizationUnit
 */
class AccountingCostsUnits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_costs_units';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cost_id', 'organization_unit_id'], 'required'],
            [['cost_id', 'organization_unit_id'], 'integer'],
            [['cost_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingCosts::className(), 'targetAttribute' => ['cost_id' => 'id']],
            [['organization_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsUnits::className(), 'targetAttribute' => ['organization_unit_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('accounting', 'ID'),
            'cost_id' => Yii::t('accounting', 'Cost ID'),
            'organization_unit_id' => Yii::t('accounting', 'Organization Unit ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCost()
    {
        return $this->hasOne(AccountingCosts::className(), ['id' => 'cost_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationUnit()
    {
        return $this->hasOne(OrganizationsUnits::className(), ['id' => 'organization_unit_id']);
    }
}
