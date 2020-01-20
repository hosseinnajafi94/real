<?php

namespace app\modules\correspondence\models\DAL;

use Yii;

/**
 * This is the model class for table "secretariats_patterns".
 *
 * @property int $id
 * @property int|null $secretariat_id
 * @property string $title
 * @property int $size_id
 * @property int $sign_count
 * @property string $file
 *
 * @property Mails[] $mails
 * @property Secretariats $secretariat
 * @property SecretariatsPatternsListSizes $size
 */
class SecretariatsPatterns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'secretariats_patterns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['secretariat_id', 'size_id', 'sign_count'], 'integer'],
            [['title', 'size_id', 'sign_count', 'file'], 'required'],
            [['title', 'file'], 'string', 'max' => 255],
            [['secretariat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Secretariats::className(), 'targetAttribute' => ['secretariat_id' => 'id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => SecretariatsPatternsListSizes::className(), 'targetAttribute' => ['size_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('correspondence', 'ID'),
            'secretariat_id' => Yii::t('correspondence', 'Secretariat ID'),
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
    public function getSecretariat()
    {
        return $this->hasOne(Secretariats::className(), ['id' => 'secretariat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(SecretariatsPatternsListSizes::className(), ['id' => 'size_id']);
    }
}
