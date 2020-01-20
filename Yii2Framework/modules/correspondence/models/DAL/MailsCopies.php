<?php

namespace app\modules\correspondence\models\DAL;

use Yii;

/**
 * This is the model class for table "mails_copies".
 *
 * @property int $id
 * @property int $mail_id
 * @property int $type_id
 * @property int $user_id
 *
 * @property Mails $mail
 * @property MailsCopiesListTypes $type
 * @property Users $user
 */
class MailsCopies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mails_copies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail_id', 'type_id', 'user_id'], 'required'],
            [['mail_id', 'type_id', 'user_id'], 'integer'],
            [['mail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mails::className(), 'targetAttribute' => ['mail_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailsCopiesListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'type_id' => Yii::t('correspondence', 'Type ID'),
            'user_id' => Yii::t('correspondence', 'User ID'),
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
    public function getType()
    {
        return $this->hasOne(MailsCopiesListTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
