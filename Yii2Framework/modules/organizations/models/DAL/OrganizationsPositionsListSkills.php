<?php

namespace app\modules\organizations\models\DAL;

use Yii;

/**
 * This is the model class for table "organizations_positions_list_skills".
 *
 * @property int $id
 * @property string $title
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
}
