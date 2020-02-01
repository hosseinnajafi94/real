<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_clients_list_types".
 *
 * @property int $id
 * @property string $title
 *
 * @property AccountingClients[] $accountingClients
 */
class AccountingClientsListTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_clients_list_types';
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
    public function getAccountingClients()
    {
        return $this->hasMany(AccountingClients::className(), ['type_id' => 'id']);
    }
}
