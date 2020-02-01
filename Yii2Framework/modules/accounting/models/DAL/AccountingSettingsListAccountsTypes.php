<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_settings_list_accounts_types".
 *
 * @property int $id
 * @property string $title
 *
 * @property AccountingSettingsListAccounts[] $accountingSettingsListAccounts
 */
class AccountingSettingsListAccountsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_settings_list_accounts_types';
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
            'id' => Yii::t('accounting', 'ID'),
            'title' => Yii::t('accounting', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountingSettingsListAccounts()
    {
        return $this->hasMany(AccountingSettingsListAccounts::className(), ['type_id' => 'id']);
    }
}
