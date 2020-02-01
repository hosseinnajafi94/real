<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_list_notes".
 *
 * @property int $id
 * @property string $title
 *
 * @property AccountingListClients[] $accountingListClients
 * @property AccountingListClientsNotes[] $accountingListClientsNotes
 */
class AccountingListNotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_list_notes';
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
    public function getAccountingListClients()
    {
        return $this->hasMany(AccountingListClients::className(), ['note_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountingListClientsNotes()
    {
        return $this->hasMany(AccountingListClientsNotes::className(), ['note_id' => 'id']);
    }
}
