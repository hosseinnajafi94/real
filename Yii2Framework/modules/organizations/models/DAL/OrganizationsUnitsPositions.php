<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_units_positions".
 *
 * @property int $id
 * @property int $unit_id
 * @property int $position_id
 *
 * @property OrganizationsUnits $unit
 * @property OrganizationsPositions $position
 */
class OrganizationsUnitsPositions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_units_positions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unit_id', 'position_id'], 'required'],
            [['unit_id', 'position_id'], 'integer'],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsUnits::className(), 'targetAttribute' => ['unit_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsPositions::className(), 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('organizations', 'ID'),
            'unit_id' => Yii::t('organizations', 'Unit ID'),
            'position_id' => Yii::t('organizations', 'Position ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(OrganizationsUnits::className(), ['id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(OrganizationsPositions::className(), ['id' => 'position_id']);
    }
}
