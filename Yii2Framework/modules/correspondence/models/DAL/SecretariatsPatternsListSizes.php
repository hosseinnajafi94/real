<?php

namespace app\modules\correspondence\models\DAL;

use Yii;

/**
 * This is the model class for table "secretariats_patterns_list_sizes".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property SecretariatsPatterns[] $secretariatsPatterns
 */
class SecretariatsPatternsListSizes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'secretariats_patterns_list_sizes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
    public function getSecretariatsPatterns()
    {
        return $this->hasMany(SecretariatsPatterns::className(), ['size_id' => 'id']);
    }
}
