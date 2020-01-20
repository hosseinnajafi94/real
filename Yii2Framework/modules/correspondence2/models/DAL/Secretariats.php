<?php

namespace app\modules\correspondence\models\DAL;

use Yii;

/**
 * This is the model class for table "secretariats".
 *
 * @property int $id
 * @property string $name
 * @property int $section_1
 * @property int $section_2
 * @property string $splitter_1
 * @property string $splitter_2
 *
 * @property Mails[] $mails
 * @property SecretariatsMembers[] $secretariatsMembers
 * @property SecretariatsPatterns[] $secretariatsPatterns
 * @property SecretariatsSignatories[] $secretariatsSignatories
 */
class Secretariats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'secretariats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'section_1', 'section_2', 'splitter_1', 'splitter_2'], 'required'],
            [['section_1', 'section_2'], 'integer'],
            [['name', 'splitter_1', 'splitter_2'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('correspondence', 'ID'),
            'name' => Yii::t('correspondence', 'Name'),
            'section_1' => Yii::t('correspondence', 'Section 1'),
            'section_2' => Yii::t('correspondence', 'Section 2'),
            'splitter_1' => Yii::t('correspondence', 'Splitter 1'),
            'splitter_2' => Yii::t('correspondence', 'Splitter 2'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMails()
    {
        return $this->hasMany(Mails::className(), ['secretariat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecretariatsMembers()
    {
        return $this->hasMany(SecretariatsMembers::className(), ['secretariat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecretariatsPatterns()
    {
        return $this->hasMany(SecretariatsPatterns::className(), ['secretariat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecretariatsSignatories()
    {
        return $this->hasMany(SecretariatsSignatories::className(), ['secretariat_id' => 'id']);
    }
}
