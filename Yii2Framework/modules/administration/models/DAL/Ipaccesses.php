<?php

namespace app\modules\administration\models\DAL;

use Yii;

/**
 * This is the model class for table "ipaccesses".
 *
 * @property int $id
 * @property string $title
 *
 * @property IpaccessesItem[] $ipaccessesItems
 */
class Ipaccesses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ipaccesses';
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
            'id' => Yii::t('administration', 'ID'),
            'title' => Yii::t('administration', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIpaccessesItems()
    {
        return $this->hasMany(IpaccessesItem::className(), ['parent_id' => 'id']);
    }
}
