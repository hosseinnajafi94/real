<?php

namespace app\modules\administration\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;
/**
 * This is the model class for table "ipaccesses_items".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $id_range
 * @property string $description
 * @property string $datetime
 * @property int $created_by
 *
 * @property Ipaccesses $parent
 * @property Users $createdBy
 */
class IpaccessesItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ipaccesses_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'id_range', 'description', 'datetime', 'created_by'], 'required'],
            [['parent_id', 'created_by'], 'integer'],
            [['datetime'], 'safe'],
            [['id_range', 'description'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ipaccesses::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('administration', 'ID'),
            'parent_id' => Yii::t('administration', 'Parent ID'),
            'id_range' => Yii::t('administration', 'Id Range'),
            'description' => Yii::t('administration', 'Description'),
            'datetime' => Yii::t('administration', 'Datetime'),
            'created_by' => Yii::t('administration', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Ipaccesses::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'created_by']);
    }
}
