<?php

namespace app\modules\tcoding\models\DAL;

use Yii;

/**
 * This is the model class for table "list_degree".
 *
 * @property int $id
 * @property string $title
 *
 * @property OrganizationsPositions[] $organizationsPositions
 * @property UsersEducations[] $usersEducations
 * @property UsersFamilies[] $usersFamilies
 */
class ListDegree extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_degree';
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
            'id' => Yii::t('tcoding', 'ID'),
            'title' => Yii::t('tcoding', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsPositions()
    {
        return $this->hasMany(OrganizationsPositions::className(), ['degree_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersEducations()
    {
        return $this->hasMany(UsersEducations::className(), ['degree_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersFamilies()
    {
        return $this->hasMany(UsersFamilies::className(), ['degree_id' => 'id']);
    }
}
