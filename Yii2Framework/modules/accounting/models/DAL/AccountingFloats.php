<?php

namespace app\modules\accounting\models\DAL;

use Yii;
use app\modules\organizations\models\DAL\Organizations;

/**
 * This is the model class for table "accounting_floats".
 *
 * @property int $id
 * @property int $organization_id
 * @property string $code
 * @property string $title
 * @property string|null $descriptions
 * @property bool $voucher_allow
 * @property bool $budget_allow
 * @property int|null $form_id
 *
 * @property Organizations $organization
 */
class AccountingFloats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_floats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'code', 'title'], 'required'],
            [['organization_id', 'form_id'], 'integer'],
            [['descriptions'], 'string'],
            [['voucher_allow', 'budget_allow'], 'boolean'],
            [['code', 'title'], 'string', 'max' => 255],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organization_id' => 'id']],
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
            'title' => Yii::t('accounting', 'Title'),
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
}
