<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_rules_list_types".
 *
 * @property int $id
 * @property string $title
 *
 * @property OrganizationsRules[] $organizationsRules
 */
class OrganizationsRulesListTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_rules_list_types';
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
    public function getOrganizationsRules()
    {
        return $this->hasMany(OrganizationsRules::className(), ['type_id' => 'id']);
    }
}
