<?php

namespace app\modules\correspondence\models\DAL;

use Yii;

/**
 * This is the model class for table "mails_attachments".
 *
 * @property int $id
 * @property int $mail_id
 * @property int $user_id
 * @property string $datetime
 * @property string $file
 *
 * @property Mails $mail
 * @property Users $user
 */
class MailsAttachments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mails_attachments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail_id', 'user_id', 'datetime', 'file'], 'required'],
            [['mail_id', 'user_id'], 'integer'],
            [['datetime'], 'safe'],
            [['file'], 'string', 'max' => 255],
            [['mail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mails::className(), 'targetAttribute' => ['mail_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'file' => Yii::t('correspondence', 'File'),
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
}
