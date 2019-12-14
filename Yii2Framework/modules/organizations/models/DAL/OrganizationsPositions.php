<?php

namespace app\modules\organizations\models\DAL;

use Yii;
use app\modules\tcoding\models\DAL\ListDegree; 
use app\modules\tcoding\models\DAL\ListGenders; 

/**
 * This is the model class for table "organizations_positions".
 *
 * @property int $id
 * @property int|null $organization_id شعبه
 * @property string|null $name نام
 * @property int|null $persons تعداد پرسنل مورد نیاز
 * @property bool|null $hiring_enable استخدام پذیر
 * @property string|null $job_code کد شغل
 * @property string|null $description شرح وظایف اصلی
 * @property int|null $form_id فرم
 * @property string|null $extra_description شرح وظایف فرعی
 * @property int|null $degree_id حداقل مدرک
 * @property int|null $experience سابقه کار (سال)
 * @property int|null $gender_id جنسیت
 * @property string|null $resume_deadline مهلت ارسال رزومه
 * @property string|null $skills سایر موارد
 *
 * @property Organizations $organization
 * @property OrganizationsPositionsListForms $form
 * @property ListDegree $degree
 * @property ListGenders $gender
 * @property OrganizationsPositionsColumns[] $organizationsPositionsColumns
 * @property OrganizationsPositionsSkills[] $organizationsPositionsSkills
 */
class OrganizationsPositions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_positions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'persons', 'form_id', 'degree_id', 'experience', 'gender_id'], 'integer'],
            [['hiring_enable'], 'boolean'],
            [['description', 'extra_description', 'skills'], 'string'],
            [['resume_deadline'], 'safe'],
            [['name', 'job_code'], 'string', 'max' => 255],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organization_id' => 'id']],
            [['form_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsPositionsListForms::className(), 'targetAttribute' => ['form_id' => 'id']],
            [['degree_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListDegree::className(), 'targetAttribute' => ['degree_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListGenders::className(), 'targetAttribute' => ['gender_id' => 'id']],
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
            'name' => Yii::t('organizations', 'Name'),
            'persons' => Yii::t('organizations', 'Persons'),
            'hiring_enable' => Yii::t('organizations', 'Hiring Enable'),
            'job_code' => Yii::t('organizations', 'Job Code'),
            'description' => Yii::t('organizations', 'Description'),
            'form_id' => Yii::t('organizations', 'Form ID'),
            'extra_description' => Yii::t('organizations', 'Extra Description'),
            'degree_id' => Yii::t('organizations', 'Degree ID'),
            'experience' => Yii::t('organizations', 'Experience'),
            'gender_id' => Yii::t('organizations', 'Gender ID'),
            'resume_deadline' => Yii::t('organizations', 'Resume Deadline'),
            'skills' => Yii::t('organizations', 'Skills'),
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
    public function getForm()
    {
        return $this->hasOne(OrganizationsPositionsListForms::className(), ['id' => 'form_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDegree()
    {
        return $this->hasOne(ListDegree::className(), ['id' => 'degree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(ListGenders::className(), ['id' => 'gender_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsPositionsColumns()
    {
        return $this->hasMany(OrganizationsPositionsColumns::className(), ['position_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsPositionsSkills()
    {
        return $this->hasMany(OrganizationsPositionsSkills::className(), ['position_id' => 'id']);
    }
}
