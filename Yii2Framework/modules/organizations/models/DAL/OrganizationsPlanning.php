<?php

namespace app\modules\organizations\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;

/**
 * This is the model class for table "organizations_planning".
 *
 * @property int $id
 * @property int|null $organization_id
 * @property int|null $type_id
 * @property int|null $parent_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property OrganizationsPlanning $parent
 * @property OrganizationsPlanning[] $organizationsPlannings
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Organizations $organization
 */
class OrganizationsPlanning extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_planning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'type_id', 'parent_id', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsPlanning::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organization_id' => 'id']],
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
            'type_id' => Yii::t('organizations', 'Type ID'),
            'parent_id' => Yii::t('organizations', 'Parent ID'),
            'title' => Yii::t('organizations', 'Title'),
            'description' => Yii::t('organizations', 'Desc'),
            'created_at' => Yii::t('organizations', 'Created At'),
            'created_by' => Yii::t('organizations', 'Created By'),
            'updated_at' => Yii::t('organizations', 'Updated At'),
            'updated_by' => Yii::t('organizations', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(OrganizationsPlanning::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsPlannings()
    {
        return $this->hasMany(OrganizationsPlanning::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'organization_id']);
    }
}
