<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_positions_list_skills".
 *
 * @property int $id
 * @property int $organization_id
 * @property string $title
 *
 * @property Organizations $organization
 * @property OrganizationsPositionsSkills[] $organizationsPositionsSkills
 */
class OrganizationsPositionsListSkills extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_positions_list_skills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'title'], 'required'],
            [['organization_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'title' => Yii::t('organizations', 'Title'),
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
    public function getOrganizationsPositionsSkills()
    {
        return $this->hasMany(OrganizationsPositionsSkills::className(), ['skill_id' => 'id']);
    }
}
