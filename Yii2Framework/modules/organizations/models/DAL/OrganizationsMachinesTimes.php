<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_machines_times".
 *
 * @property int $id
 * @property int $machine_id
 * @property string $time1
 * @property string $time2
 * @property string $time3
 *
 * @property OrganizationsMachines $machine
 */
class OrganizationsMachinesTimes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_machines_times';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['machine_id', 'time1', 'time2', 'time3'], 'required'],
            [['machine_id'], 'integer'],
            [['time1', 'time2', 'time3'], 'safe'],
            [['machine_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsMachines::className(), 'targetAttribute' => ['machine_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('organizations', 'ID'),
            'machine_id' => Yii::t('organizations', 'Machine ID'),
            'time1' => Yii::t('organizations', 'Time1'),
            'time2' => Yii::t('organizations', 'Time2'),
            'time3' => Yii::t('organizations', 'Time3'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachine()
    {
        return $this->hasOne(OrganizationsMachines::className(), ['id' => 'machine_id']);
    }
}
