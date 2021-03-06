<?php

namespace app\modules\organizations\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;  
use app\modules\geo\models\DAL\GeoProvinces;  
use app\modules\geo\models\DAL\GeoCities;

/**
 * This is the model class for table "organizations_units".
 *
 * @property int $id
 * @property int|null $organization_id شعبه
 * @property int|null $parent_id بخش
 * @property string|null $name نام
 * @property int|null $manager_id مدیر
 * @property int|null $province_id استان
 * @property int|null $city_id شهر
 * @property int|null $work_place_status_id وضعیت محل خدمت
 * @property string|null $ws_code کد کارگاه
 * @property string|null $tfn ش.پ. مالیاتی
 * @property int|null $insurance_acc_id شعبه بیمه
 * @property int|null $tax_acc_id حوزه مالیات
 * @property int|null $darsad1 بیمه سهم کارفرما
 * @property int|null $darsad2 بیمه سهم کارفرما
 * @property string|null $unit_description توضیحات
 *
 * @property Users $manager
 * @property GeoProvinces $province
 * @property GeoCities $city
 * @property OrganizationsUnitsListWorkPlaceStatus $workPlaceStatus
 * @property OrganizationsUnitsListTaxAcc $taxAcc
 * @property OrganizationsUnitsListInsuranceAcc $insuranceAcc
 * @property Organizations $organization
 * @property OrganizationsUnits $parent
 * @property OrganizationsUnits[] $organizationsUnits
 * @property OrganizationsUnitsPositions[] $organizationsUnitsPositions
 */
class OrganizationsUnits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_units';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'parent_id', 'manager_id', 'province_id', 'city_id', 'work_place_status_id', 'insurance_acc_id', 'tax_acc_id', 'darsad1', 'darsad2'], 'integer'],
            [['unit_description'], 'string'],
            [['name', 'ws_code', 'tfn'], 'string', 'max' => 255],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['manager_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoProvinces::className(), 'targetAttribute' => ['province_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['work_place_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsUnitsListWorkPlaceStatus::className(), 'targetAttribute' => ['work_place_status_id' => 'id']],
            [['tax_acc_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsUnitsListTaxAcc::className(), 'targetAttribute' => ['tax_acc_id' => 'id']],
            [['insurance_acc_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsUnitsListInsuranceAcc::className(), 'targetAttribute' => ['insurance_acc_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organization_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsUnits::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'parent_id' => Yii::t('organizations', 'Parent ID'),
            'name' => Yii::t('organizations', 'Name'),
            'manager_id' => Yii::t('organizations', 'Manager ID'),
            'province_id' => Yii::t('organizations', 'Province ID'),
            'city_id' => Yii::t('organizations', 'City ID'),
            'work_place_status_id' => Yii::t('organizations', 'Work Place Status ID'),
            'ws_code' => Yii::t('organizations', 'Ws Code'),
            'tfn' => Yii::t('organizations', 'Tfn'),
            'insurance_acc_id' => Yii::t('organizations', 'Insurance Acc ID'),
            'tax_acc_id' => Yii::t('organizations', 'Tax Acc ID'),
            'darsad1' => Yii::t('organizations', 'Darsad1'),
            'darsad2' => Yii::t('organizations', 'Darsad2'),
            'unit_description' => Yii::t('organizations', 'Unit Description'),
        ];
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
    public function getWorkPlaceStatus()
    {
        return $this->hasOne(OrganizationsUnitsListWorkPlaceStatus::className(), ['id' => 'work_place_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxAcc()
    {
        return $this->hasOne(OrganizationsUnitsListTaxAcc::className(), ['id' => 'tax_acc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInsuranceAcc()
    {
        return $this->hasOne(OrganizationsUnitsListInsuranceAcc::className(), ['id' => 'insurance_acc_id']);
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
    public function getParent()
    {
        return $this->hasOne(OrganizationsUnits::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsUnits()
    {
        return $this->hasMany(OrganizationsUnits::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsUnitsPositions()
    {
        return $this->hasMany(OrganizationsUnitsPositions::className(), ['unit_id' => 'id']);
    }
}
