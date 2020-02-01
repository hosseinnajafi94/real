<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_list_symbols".
 *
 * @property int $id
 * @property int $sort
 * @property string $title
 * @property string|null $short_title
 * @property int|null $code_id
 * @property int|null $decimal_count
 * @property int|null $fee_decimal_count
 * @property string|null $descriptions
 * @property bool|null $is_active
 * @property bool|null $auto_update
 *
 * @property AccountingListClients[] $accountingListClients
 * @property AccountingListSymbolsListCodes $code
 */
class AccountingListSymbols extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_list_symbols';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'title'], 'required'],
            [['sort', 'code_id', 'decimal_count', 'fee_decimal_count'], 'integer'],
            [['descriptions'], 'string'],
            [['is_active', 'auto_update'], 'boolean'],
            [['title', 'short_title'], 'string', 'max' => 255],
            [['code_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingListSymbolsListCodes::className(), 'targetAttribute' => ['code_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('accounting', 'ID'),
            'sort' => Yii::t('accounting', 'Sort'),
            'title' => Yii::t('accounting', 'Title'),
            'short_title' => Yii::t('accounting', 'Short Title'),
            'code_id' => Yii::t('accounting', 'Code ID'),
            'decimal_count' => Yii::t('accounting', 'Decimal Count'),
            'fee_decimal_count' => Yii::t('accounting', 'Fee Decimal Count'),
            'descriptions' => Yii::t('accounting', 'Descriptions'),
            'is_active' => Yii::t('accounting', 'Is Active'),
            'auto_update' => Yii::t('accounting', 'Auto Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountingListClients()
    {
        return $this->hasMany(AccountingListClients::className(), ['symbol_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCode()
    {
        return $this->hasOne(AccountingListSymbolsListCodes::className(), ['id' => 'code_id']);
    }
}
