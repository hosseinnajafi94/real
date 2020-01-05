<?php

namespace app\modules\correspondence\models\DAL;

use Yii;

/**
 * This is the model class for table "mails_list_receiver_types".
 *
 * @property int $id
 * @property string $title
 *
 * @property Mails[] $mails
 */
class MailsListReceiverTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mails_list_receiver_types';
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
        return $this->hasMany(Mails::className(), ['receiver_type_id' => 'id']);
    }
}
