<?php

namespace app\modules\correspondence\models\DAL;

use Yii;

/**
 * This is the model class for table "mails_list_patterns".
 *
 * @property int $id
 * @property string $title
 * @property int $size_id
 * @property int $sign_count
 * @property string $file
 *
 * @property Mails[] $mails
 * @property MailsListSizes $size
 */
class MailsListPatterns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mails_list_patterns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'size_id', 'sign_count', 'file'], 'required'],
            [['size_id', 'sign_count'], 'integer'],
            [['title', 'file'], 'string', 'max' => 255],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailsListSizes::className(), 'targetAttribute' => ['size_id' => 'id']],
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
            'size_id' => Yii::t('correspondence', 'Size ID'),
            'sign_count' => Yii::t('correspondence', 'Sign Count'),
            'file' => Yii::t('correspondence', 'File'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMails()
    {
        return $this->hasMany(Mails::className(), ['pattern_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(MailsListSizes::className(), ['id' => 'size_id']);
    }
}
