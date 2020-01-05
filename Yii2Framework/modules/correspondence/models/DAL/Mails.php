<?php

namespace app\modules\correspondence\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;

/**
 * This is the model class for table "mails".
 *
 * @property int $id
 * @property int $user_id
 * @property int $type_id
 * @property int $status_id
 * @property int $pattern_id
 * @property string $text
 * @property int|null $section_1
 * @property int|null $section_2
 * @property int|null $section_3
 * @property int|null $receiver_type_id
 * @property int|null $receiver1_id
 * @property int|null $receiver2_id
 *
 * @property MailsListTypes $type
 * @property MailsListStatuses $status
 * @property MailsListPatterns $pattern
 * @property Users $user
 * @property MailsListReceiverTypes $receiverType
 * @property Users $receiver1
 * @property MailsAttachments[] $mailsAttachments
 * @property MailsCopies[] $mailsCopies
 * @property MailsLogs[] $mailsLogs
 * @property MailsRefrences[] $mailsRefrences
 * @property MailsSignatories[] $mailsSignatories
 * @property MailsSignatures[] $mailsSignatures
 */
class Mails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type_id', 'status_id', 'pattern_id', 'text'], 'required'],
            [['user_id', 'type_id', 'status_id', 'pattern_id', 'section_1', 'section_2', 'section_3', 'receiver_type_id', 'receiver1_id', 'receiver2_id'], 'integer'],
            [['text'], 'string'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailsListStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['pattern_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailsListPatterns::className(), 'targetAttribute' => ['pattern_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['receiver_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailsListReceiverTypes::className(), 'targetAttribute' => ['receiver_type_id' => 'id']],
            [['receiver1_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['receiver1_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('correspondence', 'ID'),
            'user_id' => Yii::t('correspondence', 'User ID'),
            'type_id' => Yii::t('correspondence', 'Type ID'),
            'status_id' => Yii::t('correspondence', 'Status ID'),
            'pattern_id' => Yii::t('correspondence', 'Pattern ID'),
            'text' => Yii::t('correspondence', 'Text'),
            'section_1' => Yii::t('correspondence', 'Section 1'),
            'section_2' => Yii::t('correspondence', 'Section 2'),
            'section_3' => Yii::t('correspondence', 'Section 3'),
            'receiver_type_id' => Yii::t('correspondence', 'Receiver Type ID'),
            'receiver1_id' => Yii::t('correspondence', 'Receiver1 ID'),
            'receiver2_id' => Yii::t('correspondence', 'Receiver2 ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(MailsListTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(MailsListStatuses::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPattern()
    {
        return $this->hasOne(MailsListPatterns::className(), ['id' => 'pattern_id']);
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
    public function getReceiverType()
    {
        return $this->hasOne(MailsListReceiverTypes::className(), ['id' => 'receiver_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiver1()
    {
        return $this->hasOne(Users::className(), ['id' => 'receiver1_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailsAttachments()
    {
        return $this->hasMany(MailsAttachments::className(), ['mail_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailsCopies()
    {
        return $this->hasMany(MailsCopies::className(), ['mail_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailsLogs()
    {
        return $this->hasMany(MailsLogs::className(), ['mail_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailsRefrences()
    {
        return $this->hasMany(MailsRefrences::className(), ['mail_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailsSignatories()
    {
        return $this->hasMany(MailsSignatories::className(), ['mail_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailsSignatures()
    {
        return $this->hasMany(MailsSignatures::className(), ['mail_id' => 'id']);
    }
}
