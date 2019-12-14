<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_positions_columns".
 *
 * @property int $id
 * @property int $position_id شغل
 * @property int $column_id اجزاء
 *
 * @property OrganizationsPositions $position
 * @property OrganizationsPositionsListColumns $column
 */
class OrganizationsPositionsColumns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_positions_columns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position_id', 'column_id'], 'required'],
            [['position_id', 'column_id'], 'integer'],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsPositions::className(), 'targetAttribute' => ['position_id' => 'id']],
            [['column_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsPositionsListColumns::className(), 'targetAttribute' => ['column_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('organizations', 'ID'),
            'position_id' => Yii::t('organizations', 'Position ID'),
            'column_id' => Yii::t('organizations', 'Column ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(OrganizationsPositions::className(), ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColumn()
    {
        return $this->hasOne(OrganizationsPositionsListColumns::className(), ['id' => 'column_id']);
    }
}
