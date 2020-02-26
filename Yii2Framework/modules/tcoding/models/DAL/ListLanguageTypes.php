<?php

namespace app\modules\tcoding\models\DAL;

use Yii;

/**
 * This is the model class for table "list_language_types".
 *
 * @property int $id
 * @property string $title
 *
 * @property Settings[] $settings
 */
class ListLanguageTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_language_types';
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
            'id' => Yii::t('tcoding', 'ID'),
            'title' => Yii::t('tcoding', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasMany(Settings::className(), ['language_type_id' => 'id']);
    }
}
