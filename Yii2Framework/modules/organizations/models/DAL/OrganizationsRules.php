<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_rules".
 *
 * @property int $id
 * @property int $org_id
 * @property string $title
 * @property int $type_id
 * @property string $descriptions
 *
 * @property OrganizationsRulesListTypes $type
 * @property Organizations $org
 */
class OrganizationsRules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_rules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_id', 'title', 'type_id', 'descriptions'], 'required'],
            [['org_id', 'type_id'], 'integer'],
            [['descriptions'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsRulesListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['org_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('organizations', 'ID'),
            'org_id' => Yii::t('organizations', 'Org ID'),
            'title' => Yii::t('organizations', 'Title'),
            'type_id' => Yii::t('organizations', 'Type ID'),
            'descriptions' => Yii::t('organizations', 'Descriptions'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(OrganizationsRulesListTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'org_id']);
    }
}
