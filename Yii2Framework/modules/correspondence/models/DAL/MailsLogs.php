<?php

namespace app\modules\correspondence\models\DAL;

use Yii;

/**
 * This is the model class for table "mails_logs".
 *
 * @property int $id
 * @property int|null $mail_id
 * @property int|null $user_id
 * @property string|null $datetime
 * @property int|null $type_id
 * @property int|null $refrence_id
 * @property int|null $status_id
 *
 * @property Mails $mail
 * @property Users $user
 * @property MailsListTypes $refrence
 * @property MailsListStatuses $status
 */
class MailsLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mails_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail_id', 'user_id', 'type_id', 'refrence_id', 'status_id'], 'integer'],
            [['datetime'], 'safe'],
            [['mail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mails::className(), 'targetAttribute' => ['mail_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['refrence_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailsListTypes::className(), 'targetAttribute' => ['refrence_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailsListStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('correspondence', 'ID'),
            'mail_id' => Yii::t('correspondence', 'Mail ID'),
            'user_id' => Yii::t('correspondence', 'User ID'),
            'datetime' => Yii::t('correspondence', 'Datetime'),
            'type_id' => Yii::t('correspondence', 'Type ID'),
            'refrence_id' => Yii::t('correspondence', 'Refrence ID'),
            'status_id' => Yii::t('correspondence', 'Status ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMail()
    {
        return $this->hasOne(Mails::className(), ['id' => 'mail_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefrence()
    {
        return $this->hasOne(MailsListTypes::className(), ['id' => 'refrence_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(MailsListStatuses::className(), ['id' => 'status_id']);
    }
}
