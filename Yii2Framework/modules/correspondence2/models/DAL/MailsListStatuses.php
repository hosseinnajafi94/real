<?php

namespace app\modules\correspondence\models\DAL;

use Yii;

/**
 * This is the model class for table "mails_list_statuses".
 *
 * @property int $id
 * @property string $title
 *
 * @property Mails[] $mails
 * @property MailsLogs[] $mailsLogs
 */
class MailsListStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mails_list_statuses';
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
            'id' => Yii::t('correspondence', 'ID'),
            'title' => Yii::t('correspondence', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMails()
    {
        return $this->hasMany(Mails::className(), ['status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailsLogs()
    {
        return $this->hasMany(MailsLogs::className(), ['status_id' => 'id']);
    }
}
