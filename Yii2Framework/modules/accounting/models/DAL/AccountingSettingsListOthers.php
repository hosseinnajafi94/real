<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_settings_list_others".
 *
 * @property int $id
 * @property string $title
 * @property int $client_id
 *
 * @property AccountingListClients $client
 */
class AccountingSettingsListOthers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_settings_list_others';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'client_id'], 'required'],
            [['client_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'title' => Yii::t('accounting', 'Other Title'),
            'client_id' => Yii::t('accounting', 'Client ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(AccountingListClients::className(), ['id' => 'client_id']);
    }
}
