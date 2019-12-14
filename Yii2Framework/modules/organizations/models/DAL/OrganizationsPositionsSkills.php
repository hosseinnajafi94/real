<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_positions_skills".
 *
 * @property int $id
 * @property int $position_id شغل
 * @property int $skill_id مهارت
 *
 * @property OrganizationsPositions $position
 * @property OrganizationsPositionsListSkills $skill
 */
class OrganizationsPositionsSkills extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_positions_skills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position_id', 'skill_id'], 'required'],
            [['position_id', 'skill_id'], 'integer'],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsPositions::className(), 'targetAttribute' => ['position_id' => 'id']],
            [['skill_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsPositionsListSkills::className(), 'targetAttribute' => ['skill_id' => 'id']],
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
            'skill_id' => Yii::t('organizations', 'Skill ID'),
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
    public function getSkill()
    {
        return $this->hasOne(OrganizationsPositionsListSkills::className(), ['id' => 'skill_id']);
    }
}
