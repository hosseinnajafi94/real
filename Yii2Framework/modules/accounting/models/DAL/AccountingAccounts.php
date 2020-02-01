<?php

namespace app\modules\accounting\models\DAL;

use Yii;
use app\modules\organizations\models\DAL\Organizations;

/**
 * This is the model class for table "accounting_accounts".
 *
 * @property int $id
 * @property int|null $organization_id
 * @property int|null $symbol_id
 * @property string|null $account_number
 * @property int|null $actype_id
 * @property int|null $tctype_id
 * @property string|null $title
 * @property int|null $type_id
 * @property int|null $check_id
 * @property int|null $budget_id
 * @property int|null $note_id
 * @property string|null $descriptions
 * @property string|null $is_active
 * @property bool|null $voucher_allow
 * @property bool|null $force_floating
 * @property bool|null $force_client
 * @property bool|null $budget_allow
 * @property bool|null $force_cost_center
 * @property bool|null $force_revenue_center
 * @property bool|null $force_project
 * @property int|null $form_id
 *
 * @property AccountingListNotes $note
 * @property AccountingListSymbols $symbol
 * @property Organizations $organization
 */
class AccountingAccounts extends \yii\db\ActiveRecord
{
    public $standard_notes;
    public $list_notes = [];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'symbol_id', 'actype_id', 'tctype_id', 'type_id', 'check_id', 'budget_id', 'note_id', 'form_id'], 'integer'],
            [['voucher_allow', 'force_floating', 'force_client', 'budget_allow', 'force_cost_center', 'force_revenue_center', 'force_project'], 'boolean'],
            [['account_number', 'title', 'descriptions', 'is_active'], 'string', 'max' => 255],
            [['note_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingListNotes::className(), 'targetAttribute' => ['note_id' => 'id']],
            [['symbol_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingListSymbols::className(), 'targetAttribute' => ['symbol_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organization_id' => 'id']],
            [['standard_notes'], 'each', 'rule' => ['integer']],
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
            'symbol_id' => Yii::t('accounting', 'Symbol ID'),
            'account_number' => Yii::t('accounting', 'Account Number'),
            'actype_id' => Yii::t('accounting', 'Actype ID'),
            'tctype_id' => Yii::t('accounting', 'Tctype ID'),
            'title' => Yii::t('accounting', 'Account Title'),
            'type_id' => Yii::t('accounting', 'Account Type ID'),
            'check_id' => Yii::t('accounting', 'Check ID'),
            'budget_id' => Yii::t('accounting', 'Budget ID'),
            'note_id' => Yii::t('accounting', 'Note ID'),
            'descriptions' => Yii::t('accounting', 'Descriptions'),
            'is_active' => Yii::t('accounting', 'Is Active'),
            'voucher_allow' => Yii::t('accounting', 'Voucher Allow'),
            'force_floating' => Yii::t('accounting', 'Force Floating'),
            'force_client' => Yii::t('accounting', 'Force Client'),
            'budget_allow' => Yii::t('accounting', 'Budget Allow'),
            'force_cost_center' => Yii::t('accounting', 'Force Cost Center'),
            'force_revenue_center' => Yii::t('accounting', 'Force Revenue Center'),
            'force_project' => Yii::t('accounting', 'Force Project'),
            'form_id' => Yii::t('accounting', 'Form ID'),
            'standard_notes' => Yii::t('accounting', 'Standard Notes'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNote()
    {
        return $this->hasOne(AccountingListNotes::className(), ['id' => 'note_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSymbol()
    {
        return $this->hasOne(AccountingListSymbols::className(), ['id' => 'symbol_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'organization_id']);
    }
}
