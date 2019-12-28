<?php

namespace app\modules\organizations\models\DAL;

use Yii;
use app\modules\geo\models\DAL\GeoProvinces;
use app\modules\geo\models\DAL\GeoCities;
use app\modules\users\models\DAL\Users;

/**
 * This is the model class for table "organizations".
 *
 * @property int $id
 * @property string|null $name نام
 * @property int|null $manager_id مدیر
 * @property string|null $register_id شناسه
 * @property string|null $register_number شماره ثبت
 * @property string|null $date_start تاریخ ثبت
 * @property string|null $activity_subject موضوع فعالیت
 * @property int|null $parent_id انتخاب پرنت
 * @property string|null $ws_code کد کارگاه
 * @property string|null $tfn ش. پ. مالیاتی
 * @property string|null $code کد اقتصادی
 * @property string|null $license شماره مجوز
 * @property string|null $phone تلفن
 * @property string|null $fax فکس
 * @property string|null $email ایمیل
 * @property string|null $post کد پستی
 * @property string|null $logo لوگو
 * @property int|null $province_id استان
 * @property int|null $city_id شهر
 * @property string|null $address آدرس
 * @property string|null $detail جزئیات
 *
 * @property GeoProvinces $province
 * @property GeoCities $city
 * @property Organizations $parent
 * @property Organizations[] $organizations
 * @property Users $manager
 * @property OrganizationsPlanning[] $organizationsPlannings
 * @property OrganizationsPositions[] $organizationsPositions
 * @property OrganizationsPositionsListSkills[] $organizationsPositionsListSkills
 * @property OrganizationsUnits[] $organizationsUnits
 * @property Users[] $users
 */
class Organizations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manager_id', 'parent_id', 'province_id', 'city_id'], 'integer'],
            [['date_start'], 'safe'],
            [['name', 'register_id', 'register_number', 'activity_subject', 'ws_code', 'tfn', 'code', 'license', 'phone', 'fax', 'email', 'post', 'logo', 'address', 'detail'], 'string', 'max' => 255],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoProvinces::className(), 'targetAttribute' => ['province_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['manager_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('organizations', 'ID'),
            'name' => Yii::t('organizations', 'Name'),
            'manager_id' => Yii::t('organizations', 'Manager ID'),
            'register_id' => Yii::t('organizations', 'Register ID'),
            'register_number' => Yii::t('organizations', 'Register Number'),
            'date_start' => Yii::t('organizations', 'Date Start'),
            'activity_subject' => Yii::t('organizations', 'Activity Subject'),
            'parent_id' => Yii::t('organizations', 'Parent ID'),
            'ws_code' => Yii::t('organizations', 'Ws Code'),
            'tfn' => Yii::t('organizations', 'Tfn'),
            'code' => Yii::t('organizations', 'Code'),
            'license' => Yii::t('organizations', 'License'),
            'phone' => Yii::t('organizations', 'Phone'),
            'fax' => Yii::t('organizations', 'Fax'),
            'email' => Yii::t('organizations', 'Email'),
            'post' => Yii::t('organizations', 'Post'),
            'logo' => Yii::t('organizations', 'Logo'),
            'province_id' => Yii::t('organizations', 'Province ID'),
            'city_id' => Yii::t('organizations', 'City ID'),
            'address' => Yii::t('organizations', 'Address'),
            'detail' => Yii::t('organizations', 'Detail'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(GeoProvinces::className(), ['id' => 'province_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(GeoCities::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organizations::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(Users::className(), ['id' => 'manager_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsPlannings()
    {
        return $this->hasMany(OrganizationsPlanning::className(), ['organization_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsPositions()
    {
        return $this->hasMany(OrganizationsPositions::className(), ['organization_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsPositionsListSkills()
    {
        return $this->hasMany(OrganizationsPositionsListSkills::className(), ['organization_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsUnits()
    {
        return $this->hasMany(OrganizationsUnits::className(), ['organization_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['organization_id' => 'id']);
    }
}
