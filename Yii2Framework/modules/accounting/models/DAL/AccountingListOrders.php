<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_list_orders".
 *
 * @property int $id
 * @property string $title
 *
 * @property AccountingFormats[] $accountingFormats
 */
class AccountingListOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_list_orders';
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
    public function getAccountingFormats()
    {
        return $this->hasMany(AccountingFormats::className(), ['order_id' => 'id']);
    }
}
