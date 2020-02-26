<?php

namespace app\modules\tcoding\models\DAL;

use Yii;

/**
 * This is the model class for table "list_month".
 *
 * @property int $id
 * @property string $title
 *
 * @property OrganizationsMachines[] $organizationsMachines
 * @property OrganizationsMachines[] $organizationsMachines0
 * @property Settings[] $settings
 * @property Settings[] $settings0
 * @property Users[] $users
 * @property Users[] $users0
 */
class ListMonth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_month';
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
    public function getOrganizationsMachines()
    {
        return $this->hasMany(OrganizationsMachines::className(), ['form_month_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsMachines0()
    {
        return $this->hasMany(OrganizationsMachines::className(), ['to_month_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasMany(Settings::className(), ['dl_from_month_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettings0()
    {
        return $this->hasMany(Settings::className(), ['dl_to_month_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['from_month_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers0()
    {
        return $this->hasMany(Users::className(), ['to_month_id' => 'id']);
    }
}
