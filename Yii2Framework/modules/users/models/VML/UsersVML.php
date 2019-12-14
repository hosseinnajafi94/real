<?php
namespace app\modules\users\models\VML;
use Yii;
use yii\base\Model;
use app\config\components\functions;
//use yii\web\UploadedFile;
use app\modules\users\models\DAL\Users;
use app\modules\geo\models\SRL\GeoProvincesSRL;
use app\modules\geo\models\SRL\GeoCitiesSRL;
use app\modules\tcoding\models\SRL\ListGendersSRL;
use app\modules\organizations\models\SRL\OrganizationsSRL;
use app\modules\users\models\SRL\UsersListMaritalStatusSRL;
use app\modules\users\models\SRL\UsersListMilitaryServiceStatusSRL;
use app\modules\users\models\SRL\UsersListEmploymentStatusSRL;
use app\modules\users\models\SRL\UsersListAccountTypeSRL;
use app\modules\users\models\SRL\UsersListTypeSRL;
use app\modules\users\models\SRL\UsersListPhysicalCondSRL;
use app\modules\users\models\SRL\UsersListPersonnelShareSRL;
use app\modules\users\models\SRL\UsersListInsuranceTypeSRL;
use app\modules\users\models\SRL\UsersListEmploymentTypeSRL;
use app\modules\users\models\SRL\UsersListContractTypeSRL;
use app\modules\users\models\SRL\UsersListHasMachinSRL;
use app\modules\users\models\SRL\UsersListIsOwnerSRL;
class UsersVML extends Model {
    public $id;
    public $organization_id;
    public $group_id;
    public $status_id;
    public $username;
    public $password_hash;
    public $password_reset_token;
    public $auth_key;
    public $code;
    public $fname;
    public $lname;
    public $card_num;
    public $codemelli;
    public $birthplace_province_id;
    public $birthplace_city_id;
    public $birthday;
    public $father_name;
    public $marital_status_id;
    public $religion;
    public $military_service_status_id;
    public $gender_id;
    public $employment_status_id;
    public $requested_salary;
    public $total_work_history;
    public $account_number;
    public $account_type_id;
    public $type_id;
    public $date_start;
    public $head_line;
    public $force_rollcall;
    public $mobile;
    public $phone;
    public $province_id;
    public $city_id;
    public $email;
    public $facebook;
    public $telegram;
    public $instagram;
    public $address;
    public $avatar;
    public $place_of_issue;
    public $insurance_no;
    public $mother_birth_place;
    public $father_birth_place;
    public $mother_first_name;
    public $prev_last_name;
    public $mother_last_name;
    public $passport_no;
    public $info_work_place;
    public $start_date;
    public $emergency_phone;
    public $call_receiver;
    public $physical_cond_id;
    public $physical_desc;
    public $nationality;
    public $issuance_date;
    public $personnel_share_id;
    public $insurance_type_id;
    public $employment_type_id;
    public $contract_type_id;
    public $insurance_start_date;
    public $has_machin_id;
    public $is_owner_id;
    //
    public $statuses                  = [];
    public $groups                    = [];
    public $provinces                 = [];
    public $cities                    = [];
    public $birthplace_provinces      = [];
    public $birthplace_cities         = [];
    public $marital_statuses          = [];
    public $military_service_statuses = [];
    public $genders                   = [];
    public $employment_statuses       = [];
    public $account_types             = [];
    public $types                     = [];
    public $physical_conds            = [];
    public $personnel_shares          = [];
    public $insurance_types           = [];
    public $employment_types          = [];
    public $contract_types            = [];
    public $has_machins               = [];
    public $is_owners                 = [];
    public $organizations             = [];
    //
    public $model;
    public function rules() {
        return [
                [['organization_id', 'group_id', 'status_id', 'birthplace_province_id', 'birthplace_city_id', 'marital_status_id', 'military_service_status_id', 'gender_id', 'employment_status_id', 'requested_salary', 'total_work_history', 'account_type_id', 'type_id', 'province_id', 'city_id', 'physical_cond_id', 'personnel_share_id', 'insurance_type_id', 'employment_type_id', 'contract_type_id', 'has_machin_id', 'is_owner_id'], 'integer'],
                [['birthday', 'date_start', 'start_date', 'issuance_date', 'insurance_start_date'], 'safe'],
                [['head_line', 'address'], 'string'],
                [['force_rollcall'], 'boolean'],
                [['username', 'password_hash', 'password_reset_token', 'code', 'fname', 'lname', 'card_num', 'father_name', 'religion', 'mobile', 'phone', 'email', 'facebook', 'telegram', 'instagram', 'avatar', 'place_of_issue', 'insurance_no', 'mother_birth_place', 'father_birth_place', 'mother_first_name', 'prev_last_name', 'mother_last_name', 'passport_no', 'info_work_place', 'emergency_phone', 'call_receiver', 'physical_desc', 'nationality'], 'string', 'max' => 255],
                [['auth_key'], 'string', 'max' => 32],
                [['codemelli'], 'string', 'max' => 10],
                [['account_number'], 'string', 'max' => 11],
                //[['auth_key'], 'unique'],
                //[['username'], 'unique'],
                //[['codemelli'], 'unique'],
        ];
    }
    public function attributeLabels() {
        return [
            'id'                         => Yii::t('users', 'ID'),
            'organization_id'            => Yii::t('users', 'Organization ID'),
            'group_id'                   => Yii::t('users', 'Group ID'),
            'status_id'                  => Yii::t('users', 'Status ID'),
            'username'                   => Yii::t('users', 'Username'),
            'password_hash'              => Yii::t('users', 'Password Hash'),
            'password_reset_token'       => Yii::t('users', 'Password Reset Token'),
            'auth_key'                   => Yii::t('users', 'Auth Key'),
            'code'                       => Yii::t('users', 'Code'),
            'fname'                      => Yii::t('users', 'Fname'),
            'lname'                      => Yii::t('users', 'Lname'),
            'card_num'                   => Yii::t('users', 'Card Num'),
            'codemelli'                  => Yii::t('users', 'Codemelli'),
            'birthplace_province_id'     => Yii::t('users', 'Birthplace Province ID'),
            'birthplace_city_id'         => Yii::t('users', 'Birthplace City ID'),
            'birthday'                   => Yii::t('users', 'Birthday'),
            'father_name'                => Yii::t('users', 'Father Name'),
            'marital_status_id'          => Yii::t('users', 'Marital Status ID'),
            'religion'                   => Yii::t('users', 'Religion'),
            'military_service_status_id' => Yii::t('users', 'Military Service Status ID'),
            'gender_id'                  => Yii::t('users', 'Gender ID'),
            'employment_status_id'       => Yii::t('users', 'Employment Status ID'),
            'requested_salary'           => Yii::t('users', 'Requested Salary'),
            'total_work_history'         => Yii::t('users', 'Total Work History'),
            'account_number'             => Yii::t('users', 'Account Number'),
            'account_type_id'            => Yii::t('users', 'Account Type ID'),
            'type_id'                    => Yii::t('users', 'Type ID'),
            'date_start'                 => Yii::t('users', 'Date Start'),
            'head_line'                  => Yii::t('users', 'Head Line'),
            'force_rollcall'             => Yii::t('users', 'Force Rollcall'),
            'mobile'                     => Yii::t('users', 'Mobile'),
            'phone'                      => Yii::t('users', 'Phone'),
            'province_id'                => Yii::t('users', 'Province ID'),
            'city_id'                    => Yii::t('users', 'City ID'),
            'email'                      => Yii::t('users', 'Email'),
            'facebook'                   => Yii::t('users', 'Facebook'),
            'telegram'                   => Yii::t('users', 'Telegram'),
            'instagram'                  => Yii::t('users', 'Instagram'),
            'address'                    => Yii::t('users', 'Address'),
            'avatar'                     => Yii::t('users', 'Avatar'),
            'place_of_issue'             => Yii::t('users', 'Place Of Issue'),
            'insurance_no'               => Yii::t('users', 'Insurance No'),
            'mother_birth_place'         => Yii::t('users', 'Mother Birth Place'),
            'father_birth_place'         => Yii::t('users', 'Father Birth Place'),
            'mother_first_name'          => Yii::t('users', 'Mother First Name'),
            'prev_last_name'             => Yii::t('users', 'Prev Last Name'),
            'mother_last_name'           => Yii::t('users', 'Mother Last Name'),
            'passport_no'                => Yii::t('users', 'Passport No'),
            'info_work_place'            => Yii::t('users', 'Info Work Place'),
            'start_date'                 => Yii::t('users', 'Start Date'),
            'emergency_phone'            => Yii::t('users', 'Emergency Phone'),
            'call_receiver'              => Yii::t('users', 'Call Receiver'),
            'physical_cond_id'           => Yii::t('users', 'Physical Cond ID'),
            'physical_desc'              => Yii::t('users', 'Physical Desc'),
            'nationality'                => Yii::t('users', 'Nationality'),
            'issuance_date'              => Yii::t('users', 'Issuance Date'),
            'personnel_share_id'         => Yii::t('users', 'Personnel Share ID'),
            'insurance_type_id'          => Yii::t('users', 'Insurance Type ID'),
            'employment_type_id'         => Yii::t('users', 'Employment Type ID'),
            'contract_type_id'           => Yii::t('users', 'Contract Type ID'),
            'insurance_start_date'       => Yii::t('users', 'Insurance Start Date'),
            'has_machin_id'              => Yii::t('users', 'Has Machin ID'),
            'is_owner_id'                => Yii::t('users', 'Is Owner ID'),
        ];
    }
    public function loaditems() {
        //$this->statuses                  = [];
        //$this->groups                    = [];
        $this->provinces                 = GeoProvincesSRL::getItems();
        $this->cities                    = GeoCitiesSRL::getItems(['province_id' => $this->province_id]);
        $this->birthplace_provinces      = $this->provinces;
        $this->birthplace_cities         = GeoCitiesSRL::getItems(['province_id' => $this->birthplace_province_id]);
        $this->marital_statuses          = UsersListMaritalStatusSRL::getItems();
        $this->military_service_statuses = UsersListMilitaryServiceStatusSRL::getItems();
        $this->genders                   = ListGendersSRL::getItems();
        $this->employment_statuses       = UsersListEmploymentStatusSRL::getItems();
        $this->account_types             = UsersListAccountTypeSRL::getItems();
        $this->types                     = UsersListTypeSRL::getItems();
        $this->physical_conds            = UsersListPhysicalCondSRL::getItems();
        $this->personnel_shares          = UsersListPersonnelShareSRL::getItems();
        $this->insurance_types           = UsersListInsuranceTypeSRL::getItems();
        $this->employment_types          = UsersListEmploymentTypeSRL::getItems();
        $this->contract_types            = UsersListContractTypeSRL::getItems();
        $this->has_machins               = UsersListHasMachinSRL::getItems();
        $this->is_owners                 = UsersListIsOwnerSRL::getItems();
        $this->organizations             = OrganizationsSRL::getItems();
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        $this->birthday             = functions::togdate($this->birthday);
        $this->date_start           = functions::togdate($this->date_start);
        $this->start_date           = functions::togdate($this->start_date);
        $this->issuance_date        = functions::togdate($this->issuance_date);
        $this->insurance_start_date = functions::togdate($this->insurance_start_date);
        if (!$this->validate()) {
            return false;
        }
        $model = $this->model;
        $this->populate($model, $this);
        if (!$model->save()) {
            return false;
        }
        $this->id = $model->id;
        return true;
    }
    public static function newInstance() {
        $data        = new static();
        $data->model = new Users();
        return $data;
    }
    public static function find($id) {
        $model = Users::findOne($id);
        if ($model === null) {
            return null;
        }
        $data                       = new static();
        $data->model                = $model;
        static::populate($data, $model);
        $data->birthday             = functions::tojdate($data->birthday);
        $data->date_start           = functions::tojdate($data->date_start);
        $data->start_date           = functions::tojdate($data->start_date);
        $data->issuance_date        = functions::tojdate($data->issuance_date);
        $data->insurance_start_date = functions::tojdate($data->insurance_start_date);
        return $data;
    }
    public static function populate($dest, $source) {
        $dest->id                         = $source->id;
        $dest->organization_id            = $source->organization_id;
        $dest->group_id                   = $source->group_id;
        $dest->status_id                  = $source->status_id;
        $dest->username                   = $source->username;
        $dest->password_hash              = $source->password_hash;
        $dest->password_reset_token       = $source->password_reset_token;
        $dest->auth_key                   = $source->auth_key;
        $dest->code                       = $source->code;
        $dest->fname                      = $source->fname;
        $dest->lname                      = $source->lname;
        $dest->card_num                   = $source->card_num;
        $dest->codemelli                  = $source->codemelli;
        $dest->birthplace_province_id     = $source->birthplace_province_id;
        $dest->birthplace_city_id         = $source->birthplace_city_id;
        $dest->birthday                   = $source->birthday;
        $dest->father_name                = $source->father_name;
        $dest->marital_status_id          = $source->marital_status_id;
        $dest->religion                   = $source->religion;
        $dest->military_service_status_id = $source->military_service_status_id;
        $dest->gender_id                  = $source->gender_id;
        $dest->employment_status_id       = $source->employment_status_id;
        $dest->requested_salary           = $source->requested_salary;
        $dest->total_work_history         = $source->total_work_history;
        $dest->account_number             = $source->account_number;
        $dest->account_type_id            = $source->account_type_id;
        $dest->type_id                    = $source->type_id;
        $dest->date_start                 = $source->date_start;
        $dest->head_line                  = $source->head_line;
        $dest->force_rollcall             = $source->force_rollcall;
        $dest->mobile                     = $source->mobile;
        $dest->phone                      = $source->phone;
        $dest->province_id                = $source->province_id;
        $dest->city_id                    = $source->city_id;
        $dest->email                      = $source->email;
        $dest->facebook                   = $source->facebook;
        $dest->telegram                   = $source->telegram;
        $dest->instagram                  = $source->instagram;
        $dest->address                    = $source->address;
        $dest->avatar                     = $source->avatar;
        $dest->place_of_issue             = $source->place_of_issue;
        $dest->insurance_no               = $source->insurance_no;
        $dest->mother_birth_place         = $source->mother_birth_place;
        $dest->father_birth_place         = $source->father_birth_place;
        $dest->mother_first_name          = $source->mother_first_name;
        $dest->prev_last_name             = $source->prev_last_name;
        $dest->mother_last_name           = $source->mother_last_name;
        $dest->passport_no                = $source->passport_no;
        $dest->info_work_place            = $source->info_work_place;
        $dest->start_date                 = $source->start_date;
        $dest->emergency_phone            = $source->emergency_phone;
        $dest->call_receiver              = $source->call_receiver;
        $dest->physical_cond_id           = $source->physical_cond_id;
        $dest->physical_desc              = $source->physical_desc;
        $dest->nationality                = $source->nationality;
        $dest->issuance_date              = $source->issuance_date;
        $dest->personnel_share_id         = $source->personnel_share_id;
        $dest->insurance_type_id          = $source->insurance_type_id;
        $dest->employment_type_id         = $source->employment_type_id;
        $dest->contract_type_id           = $source->contract_type_id;
        $dest->insurance_start_date       = $source->insurance_start_date;
        $dest->has_machin_id              = $source->has_machin_id;
        $dest->is_owner_id                = $source->is_owner_id;
    }
//    save
//        $this->avatar = UploadedFile::getInstance($this, 'avatar');
//        $queryCodemelli = Users::find()->where(['codemelli' => $this->codemelli]);
//        if (!$model->isNewRecord) {
//            $queryCodemelli->andWhere(['<>', 'id', $model->id]);
//        }
//        $userCodemelli = $queryCodemelli->one();
//        if ($userCodemelli !== null) {
//            $this->addError('codemelli', 'کد ملی با مقدار "' . $this->codemelli . '" قبلا در سیستم ثبت شده.');
//            return false;
//        }
//        if ($this->avatar) {
//            $filename                = uniqid(time(), true) . '.' . $this->avatar->extension;
//            $this->avatar->saveAs("uploads/users/avatar/$filename");
//            $model->avatar           = $filename;
//            $model->avatar_confirmed = true;
//        }
//        if ($model->isNewRecord) {
//            $model->group_id             = 2;
//            $model->status_id            = 1;
//            $model->password_hash        = Yii::$app->security->generatePasswordHash($this->password_hash);
//            $model->password_reset_token = null;
//            $model->auth_key             = Yii::$app->security->generateRandomString();
//            $model->cardmelli_confirmed  = false;
//            $model->avatar_confirmed     = false;
//        }
//        else if ($this->password_hash) {
//            $model->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
//        }
}