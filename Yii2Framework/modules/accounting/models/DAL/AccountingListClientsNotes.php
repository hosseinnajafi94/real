<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_list_clients_notes".
 *
 * @property int $id
 * @property int|null $client_id
 * @property int $note_id
 *
 * @property AccountingListClients $client
 * @property AccountingListNotes $note
 */
class AccountingListClientsNotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_list_clients_notes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'note_id'], 'integer'],
            [['note_id'], 'required'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingListClients::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['note_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountingListNotes::className(), 'targetAttribute' => ['note_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('accounting', 'ID'),
            'client_id' => Yii::t('accounting', 'Client ID'),
            'note_id' => Yii::t('accounting', 'Note ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(AccountingListClients::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNote()
    {
        return $this->hasOne(AccountingListNotes::className(), ['id' => 'note_id']);
    }
}
