<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_formats".
 *
 * @property int $id
 * @property int $type_id
 * @property string $format_title
 * @property int $length
 * @property int $format_id
 * @property int|null $order_id
 * @property int|null $account_name_id
 *
 * @property AccountingListFormats $format
 * @property AccountingListOrders $order
 * @property AccountingListAccountNames $accountName
 * @property AccountingFormatsListTypes $type
 */
class AccountingFormats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_formats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'format_title', 'length', 'format_id'], 'required'],
            [['account_name_id'], 'required', 'when' => function ($model) {
                return $model->type_id != 3;
            }, 'whenClient' => 'function () {
                return $(\'#accountingformats-type_id\').val() != 3;
            }'],
            [['type_id', 'length', 'format_id', 'order_id', 'account_name_id'], 'integer'],
            [['format_title'], 'string', 'max' => 255],
            [['format_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingListFormats::className(), 'targetAttribute' => ['format_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingListOrders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['account_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingListAccountNames::className(), 'targetAttribute' => ['account_name_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingFormatsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'format_title' => Yii::t('accounting', 'Format Title'),
            'length' => Yii::t('accounting', 'Length'),
            'format_id' => Yii::t('accounting', 'Format ID'),
            'order_id' => Yii::t('accounting', 'Order ID'),
            'account_name_id' => Yii::t('accounting', 'Account Name ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormat()
    {
        return $this->hasOne(AccountingListFormats::className(), ['id' => 'format_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(AccountingListOrders::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountName()
    {
        return $this->hasOne(AccountingListAccountNames::className(), ['id' => 'account_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(AccountingFormatsListTypes::className(), ['id' => 'type_id']);
    }
}
