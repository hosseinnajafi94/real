<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_settings_list_accounts".
 *
 * @property int $id
 * @property int $type_id
 * @property int $client_id
 *
 * @property AccountingSettingsListAccountsTypes $type
 * @property AccountingListClients $client
 */
class AccountingSettingsListAccounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_settings_list_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'client_id'], 'required'],
            [['type_id', 'client_id'], 'integer'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingSettingsListAccountsTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingListClients::className(), 'targetAttribute' => ['client_id' => 'id']],
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
            'client_id' => Yii::t('accounting', 'Client ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(AccountingSettingsListAccountsTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(AccountingListClients::className(), ['id' => 'client_id']);
    }
}
