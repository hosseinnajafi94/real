<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_list_years".
 *
 * @property int $id
 * @property int $organization_id
 * @property string $title
 * @property int $type_id
 * @property string $start_date
 * @property string $end_date
 * @property bool $sanad
 *
 * @property Organizations $organization
 * @property OrganizationsListYearsTypes $type
 */
class OrganizationsListYears extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_list_years';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'title', 'type_id', 'start_date', 'end_date'], 'required'],
            [['organization_id', 'type_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['sanad'], 'boolean'],
            [['title'], 'string', 'max' => 255],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organization_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsListYearsTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('organizations', 'ID'),
            'organization_id' => Yii::t('organizations', 'Organization ID'),
            'title' => Yii::t('organizations', 'Title'),
            'type_id' => Yii::t('organizations', 'Type ID'),
            'start_date' => Yii::t('organizations', 'Start Date'),
            'end_date' => Yii::t('organizations', 'End Date'),
            'sanad' => Yii::t('organizations', 'Sanad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'organization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(OrganizationsListYearsTypes::className(), ['id' => 'type_id']);
    }
}
