<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_units_list_work_place_status".
 *
 * @property int $id
 * @property string $title
 *
 * @property OrganizationsUnits[] $organizationsUnits
 */
class OrganizationsUnitsListWorkPlaceStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_units_list_work_place_status';
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
            'id' => Yii::t('organizations', 'ID'),
            'title' => Yii::t('organizations', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsUnits()
    {
        return $this->hasMany(OrganizationsUnits::className(), ['work_place_status_id' => 'id']);
    }
}
