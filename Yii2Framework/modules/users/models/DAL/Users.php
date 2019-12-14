<?php

namespace app\modules\users\models\DAL;

use Yii;
use app\modules\organizations\models\DAL\Organizations;
use app\modules\geo\models\DAL\GeoProvinces;
use app\modules\geo\models\DAL\GeoCities;
use app\modules\tcoding\models\DAL\ListGenders;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int|null $organization_id شعبه
 * @property int|null $group_id گروه کاربری
 * @property int|null $status_id وضعیت کاربری
 * @property string|null $username نام کاربری
 * @property string|null $password_hash رمز عبور
 * @property string|null $password_reset_token کلید بازیابی رمز عبور
 * @property string|null $auth_key کلید اعتبار سنجی
 * @property string|null $code کد پرسنلی
 * @property string|null $fname نام
 * @property string|null $lname نام خانوادگی
 * @property string|null $card_num شماره شناسنامه
 * @property string|null $codemelli کد ملی
 * @property int|null $birthplace_province_id استان محل تولد
 * @property int|null $birthplace_city_id شهر  محل تولد
 * @property string|null $birthday تاریخ تولد
 * @property string|null $father_name نام پدر
 * @property int|null $marital_status_id وضعیت تأهل
 * @property string|null $religion دین
 * @property int|null $military_service_status_id وضعیت نظام وظیفه
 * @property int|null $gender_id جنسیت
 * @property int|null $employment_status_id وضعیت اشتغال
 * @property int|null $requested_salary حقوق درخواستی
 * @property int|null $total_work_history مجموع سابقه کاری
 * @property string|null $account_number شماره حساب بانکی
 * @property int|null $account_type_id نوع حساب
 * @property int|null $type_id نوع
 * @property string|null $date_start تاریخ شروع همکاری
 * @property string|null $head_line توضیحات شخصی
 * @property bool|null $force_rollcall حضور غیاب اجباری
 * @property string|null $mobile موبایل
 * @property string|null $phone تلفن
 * @property int|null $province_id استان
 * @property int|null $city_id شهر
 * @property string|null $email ایمیل
 * @property string|null $facebook فیس بوک
 * @property string|null $telegram تلگرام
 * @property string|null $instagram اینستاگرام
 * @property string|null $address آدرس
 * @property string|null $avatar آواتار
 * @property string|null $place_of_issue محل صدور شناسنامه
 * @property string|null $insurance_no شماره بیمه
 * @property string|null $mother_birth_place محل تولد مادر
 * @property string|null $father_birth_place محل تولد پدر
 * @property string|null $mother_first_name نام مادر
 * @property string|null $prev_last_name نام خانوادگی قبلی
 * @property string|null $mother_last_name نوع خودرو
 * @property string|null $passport_no پلاک خودرو
 * @property string|null $info_work_place محل خدمت
 * @property string|null $start_date تاریخ شروع خدمت
 * @property string|null $emergency_phone تلفن اضطراری
 * @property string|null $call_receiver مخاطب تلفن اضطراری
 * @property int|null $physical_cond_id وضعیت جسمی
 * @property string|null $physical_desc توضیحات وضعیت جسمی
 * @property string|null $nationality ملیت
 * @property string|null $issuance_date تاریخ صدور شناسنامه
 * @property int|null $personnel_share_id وضعیت کارمند
 * @property int|null $insurance_type_id نوع بیمه
 * @property int|null $employment_type_id نوع استخدام
 * @property int|null $contract_type_id نوع قرارداد
 * @property string|null $insurance_start_date تاریخ شروع بیمه
 * @property int|null $has_machin_id اتومبیل شخصی
 * @property int|null $is_owner_id وضعیت مسکن
 *
 * @property Organizations[] $organizations
 * @property OrganizationsUnits[] $organizationsUnits
 * @property Tickets[] $tickets
 * @property Tickets[] $tickets0
 * @property TicketsMessages[] $ticketsMessages
 * @property UsersListStatuses $status
 * @property UsersListGroups $group
 * @property GeoProvinces $province
 * @property GeoCities $city
 * @property GeoProvinces $birthplaceProvince
 * @property GeoCities $birthplaceCity
 * @property UsersListMaritalStatus $maritalStatus
 * @property UsersListMilitaryServiceStatus $militaryServiceStatus
 * @property ListGenders $gender
 * @property UsersListEmploymentStatus $employmentStatus
 * @property UsersListAccountType $accountType
 * @property UsersListType $type
 * @property UsersListPhysicalCond $physicalCond
 * @property UsersListPersonnelShare $personnelShare
 * @property UsersListInsuranceType $insuranceType
 * @property UsersListEmploymentType $employmentType
 * @property UsersListContractType $contractType
 * @property UsersListHasMachin $hasMachin
 * @property UsersListIsOwner $isOwner
 * @property Organizations $organization
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'group_id', 'status_id', 'birthplace_province_id', 'birthplace_city_id', 'marital_status_id', 'military_service_status_id', 'gender_id', 'employment_status_id', 'requested_salary', 'total_work_history', 'account_type_id', 'type_id', 'province_id', 'city_id', 'physical_cond_id', 'personnel_share_id', 'insurance_type_id', 'employment_type_id', 'contract_type_id', 'has_machin_id', 'is_owner_id'], 'integer'],
            [['birthday', 'date_start', 'start_date', 'issuance_date', 'insurance_start_date'], 'safe'],
            [['head_line', 'address'], 'string'],
            [['force_rollcall'], 'boolean'],
            [['username', 'password_hash', 'password_reset_token', 'code', 'fname', 'lname', 'card_num', 'father_name', 'religion', 'mobile', 'phone', 'email', 'facebook', 'telegram', 'instagram', 'avatar', 'place_of_issue', 'insurance_no', 'mother_birth_place', 'father_birth_place', 'mother_first_name', 'prev_last_name', 'mother_last_name', 'passport_no', 'info_work_place', 'emergency_phone', 'call_receiver', 'physical_desc', 'nationality'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['codemelli'], 'string', 'max' => 10],
            [['account_number'], 'string', 'max' => 11],
            [['auth_key'], 'unique'],
            [['username'], 'unique'],
            [['codemelli'], 'unique'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListGroups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoProvinces::className(), 'targetAttribute' => ['province_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['birthplace_province_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoProvinces::className(), 'targetAttribute' => ['birthplace_province_id' => 'id']],
            [['birthplace_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCities::className(), 'targetAttribute' => ['birthplace_city_id' => 'id']],
            [['marital_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListMaritalStatus::className(), 'targetAttribute' => ['marital_status_id' => 'id']],
            [['military_service_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListMilitaryServiceStatus::className(), 'targetAttribute' => ['military_service_status_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListGenders::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['employment_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListEmploymentStatus::className(), 'targetAttribute' => ['employment_status_id' => 'id']],
            [['account_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListAccountType::className(), 'targetAttribute' => ['account_type_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['physical_cond_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListPhysicalCond::className(), 'targetAttribute' => ['physical_cond_id' => 'id']],
            [['personnel_share_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListPersonnelShare::className(), 'targetAttribute' => ['personnel_share_id' => 'id']],
            [['insurance_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListInsuranceType::className(), 'targetAttribute' => ['insurance_type_id' => 'id']],
            [['employment_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListEmploymentType::className(), 'targetAttribute' => ['employment_type_id' => 'id']],
            [['contract_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListContractType::className(), 'targetAttribute' => ['contract_type_id' => 'id']],
            [['has_machin_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListHasMachin::className(), 'targetAttribute' => ['has_machin_id' => 'id']],
            [['is_owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersListIsOwner::className(), 'targetAttribute' => ['is_owner_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organization_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'organization_id' => Yii::t('users', 'Organization ID'),
            'group_id' => Yii::t('users', 'Group ID'),
            'status_id' => Yii::t('users', 'Status ID'),
            'username' => Yii::t('users', 'Username'),
            'password_hash' => Yii::t('users', 'Password Hash'),
            'password_reset_token' => Yii::t('users', 'Password Reset Token'),
            'auth_key' => Yii::t('users', 'Auth Key'),
            'code' => Yii::t('users', 'Code'),
            'fname' => Yii::t('users', 'Fname'),
            'lname' => Yii::t('users', 'Lname'),
            'card_num' => Yii::t('users', 'Card Num'),
            'codemelli' => Yii::t('users', 'Codemelli'),
            'birthplace_province_id' => Yii::t('users', 'Birthplace Province ID'),
            'birthplace_city_id' => Yii::t('users', 'Birthplace City ID'),
            'birthday' => Yii::t('users', 'Birthday'),
            'father_name' => Yii::t('users', 'Father Name'),
            'marital_status_id' => Yii::t('users', 'Marital Status ID'),
            'religion' => Yii::t('users', 'Religion'),
            'military_service_status_id' => Yii::t('users', 'Military Service Status ID'),
            'gender_id' => Yii::t('users', 'Gender ID'),
            'employment_status_id' => Yii::t('users', 'Employment Status ID'),
            'requested_salary' => Yii::t('users', 'Requested Salary'),
            'total_work_history' => Yii::t('users', 'Total Work History'),
            'account_number' => Yii::t('users', 'Account Number'),
            'account_type_id' => Yii::t('users', 'Account Type ID'),
            'type_id' => Yii::t('users', 'Type ID'),
            'date_start' => Yii::t('users', 'Date Start'),
            'head_line' => Yii::t('users', 'Head Line'),
            'force_rollcall' => Yii::t('users', 'Force Rollcall'),
            'mobile' => Yii::t('users', 'Mobile'),
            'phone' => Yii::t('users', 'Phone'),
            'province_id' => Yii::t('users', 'Province ID'),
            'city_id' => Yii::t('users', 'City ID'),
            'email' => Yii::t('users', 'Email'),
            'facebook' => Yii::t('users', 'Facebook'),
            'telegram' => Yii::t('users', 'Telegram'),
            'instagram' => Yii::t('users', 'Instagram'),
            'address' => Yii::t('users', 'Address'),
            'avatar' => Yii::t('users', 'Avatar'),
            'place_of_issue' => Yii::t('users', 'Place Of Issue'),
            'insurance_no' => Yii::t('users', 'Insurance No'),
            'mother_birth_place' => Yii::t('users', 'Mother Birth Place'),
            'father_birth_place' => Yii::t('users', 'Father Birth Place'),
            'mother_first_name' => Yii::t('users', 'Mother First Name'),
            'prev_last_name' => Yii::t('users', 'Prev Last Name'),
            'mother_last_name' => Yii::t('users', 'Mother Last Name'),
            'passport_no' => Yii::t('users', 'Passport No'),
            'info_work_place' => Yii::t('users', 'Info Work Place'),
            'start_date' => Yii::t('users', 'Start Date'),
            'emergency_phone' => Yii::t('users', 'Emergency Phone'),
            'call_receiver' => Yii::t('users', 'Call Receiver'),
            'physical_cond_id' => Yii::t('users', 'Physical Cond ID'),
            'physical_desc' => Yii::t('users', 'Physical Desc'),
            'nationality' => Yii::t('users', 'Nationality'),
            'issuance_date' => Yii::t('users', 'Issuance Date'),
            'personnel_share_id' => Yii::t('users', 'Personnel Share ID'),
            'insurance_type_id' => Yii::t('users', 'Insurance Type ID'),
            'employment_type_id' => Yii::t('users', 'Employment Type ID'),
            'contract_type_id' => Yii::t('users', 'Contract Type ID'),
            'insurance_start_date' => Yii::t('users', 'Insurance Start Date'),
            'has_machin_id' => Yii::t('users', 'Has Machin ID'),
            'is_owner_id' => Yii::t('users', 'Is Owner ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organizations::className(), ['manager_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsUnits()
    {
        return $this->hasMany(OrganizationsUnits::className(), ['manager_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['sender_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets0()
    {
        return $this->hasMany(Tickets::className(), ['receiver_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketsMessages()
    {
        return $this->hasMany(TicketsMessages::className(), ['sender_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(UsersListStatuses::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(UsersListGroups::className(), ['id' => 'group_id']);
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
    public function getBirthplaceProvince()
    {
        return $this->hasOne(GeoProvinces::className(), ['id' => 'birthplace_province_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBirthplaceCity()
    {
        return $this->hasOne(GeoCities::className(), ['id' => 'birthplace_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaritalStatus()
    {
        return $this->hasOne(UsersListMaritalStatus::className(), ['id' => 'marital_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMilitaryServiceStatus()
    {
        return $this->hasOne(UsersListMilitaryServiceStatus::className(), ['id' => 'military_service_status_id']);
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
    public function getEmploymentStatus()
    {
        return $this->hasOne(UsersListEmploymentStatus::className(), ['id' => 'employment_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountType()
    {
        return $this->hasOne(UsersListAccountType::className(), ['id' => 'account_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(UsersListType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhysicalCond()
    {
        return $this->hasOne(UsersListPhysicalCond::className(), ['id' => 'physical_cond_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelShare()
    {
        return $this->hasOne(UsersListPersonnelShare::className(), ['id' => 'personnel_share_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInsuranceType()
    {
        return $this->hasOne(UsersListInsuranceType::className(), ['id' => 'insurance_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmploymentType()
    {
        return $this->hasOne(UsersListEmploymentType::className(), ['id' => 'employment_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractType()
    {
        return $this->hasOne(UsersListContractType::className(), ['id' => 'contract_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHasMachin()
    {
        return $this->hasOne(UsersListHasMachin::className(), ['id' => 'has_machin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsOwner()
    {
        return $this->hasOne(UsersListIsOwner::className(), ['id' => 'is_owner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'organization_id']);
    }
}
