<?php
namespace app\modules\organizations\models\VML;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\config\components\functions;
use app\modules\organizations\models\DAL\Organizations;
use app\modules\organizations\models\SRL\OrganizationsSRL;
use app\modules\geo\models\SRL\GeoProvincesSRL;
use app\modules\geo\models\SRL\GeoCitiesSRL;
use app\modules\users\models\SRL\UsersSRL;
class OrganizationsVML extends Model {
    public $id;
    public $name;
    public $manager_id;
    public $register_id;
    public $register_number;
    public $date_start;
    public $activity_subject;
    public $parent_id;
    public $ws_code;
    public $tfn;
    public $code;
    public $license;
    public $phone;
    public $fax;
    public $email;
    public $post;
    public $logo;
    public $province_id;
    public $city_id;
    public $address;
    public $detail;
    public $managers  = [];
    public $parents   = [];
    public $provinces = [];
    public $cities    = [];
    public $model;
    public function rules() {
        return [
                [['manager_id', 'parent_id', 'province_id', 'city_id'], 'integer'],
                [['date_start'], 'safe'],
                [['name', 'register_id', 'register_number', 'activity_subject', 'ws_code', 'tfn', 'code', 'license', 'phone', 'fax', 'email', 'post', 'address', 'detail'], 'string', 'max' => 255],
                [['logo'], 'file', 'extensions' => 'png, jpg, jpeg, gif']
        ];
    }
    public function attributeLabels() {
        return [
            'id'               => Yii::t('organizations', 'ID'),
            'name'             => Yii::t('organizations', 'Name'),
            'manager_id'       => Yii::t('organizations', 'Manager ID'),
            'register_id'      => Yii::t('organizations', 'Register ID'),
            'register_number'  => Yii::t('organizations', 'Register Number'),
            'date_start'       => Yii::t('organizations', 'Date Start'),
            'activity_subject' => Yii::t('organizations', 'Activity Subject'),
            'parent_id'        => Yii::t('organizations', 'Parent ID'),
            'ws_code'          => Yii::t('organizations', 'Ws Code'),
            'tfn'              => Yii::t('organizations', 'Tfn'),
            'code'             => Yii::t('organizations', 'Code'),
            'license'          => Yii::t('organizations', 'License'),
            'phone'            => Yii::t('organizations', 'Phone'),
            'fax'              => Yii::t('organizations', 'Fax'),
            'email'            => Yii::t('organizations', 'Email'),
            'post'             => Yii::t('organizations', 'Post'),
            'logo'             => Yii::t('organizations', 'Logo'),
            'province_id'      => Yii::t('organizations', 'Province ID'),
            'city_id'          => Yii::t('organizations', 'City ID'),
            'address'          => Yii::t('organizations', 'Address'),
            'detail'           => Yii::t('organizations', 'Detail'),
        ];
    }
    public function loaditems() {
        $this->managers = UsersSRL::getItems();
        $this->parents   = OrganizationsSRL::getItems(['not', ['id' => $this->id]]);
        $this->provinces = GeoProvincesSRL::getItems();
        $this->cities    = GeoCitiesSRL::getItems(['province_id' => $this->province_id]);
    }
    public function save($post) {
        $lastLogo = $this->logo;
        if (!$this->load($post)) {
            return false;
        }
        $this->logo = UploadedFile::getInstance($this, 'logo');
        $this->date_start = functions::togdate($this->date_start);
        if (!$this->validate()) {
            return false;
        }
        if ($this->logo) {
            $filename   = uniqid(time(), true) . '.' . $this->logo->extension;
            $this->logo->saveAs("uploads/organizations/$filename");
            $this->logo = $filename;
        }
        else {
            $this->logo = $lastLogo;
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
        $data->model = new Organizations();
        return $data;
    }
    public static function find($id) {
        $model = Organizations::findOne($id);
        if ($model === null) {
            return null;
        }
        $data        = new static();
        $data->model = $model;
        static::populate($data, $model);
        $data->date_start = functions::tojdate($data->date_start);
        return $data;
    }
    public static function populate($dest, $source) {
        $dest->id               = $source->id;
        $dest->name             = $source->name;
        $dest->manager_id       = $source->manager_id;
        $dest->register_id      = $source->register_id;
        $dest->register_number  = $source->register_number;
        $dest->date_start       = $source->date_start;
        $dest->activity_subject = $source->activity_subject;
        $dest->parent_id        = $source->parent_id;
        $dest->ws_code          = $source->ws_code;
        $dest->tfn              = $source->tfn;
        $dest->code             = $source->code;
        $dest->license          = $source->license;
        $dest->phone            = $source->phone;
        $dest->fax              = $source->fax;
        $dest->email            = $source->email;
        $dest->post             = $source->post;
        $dest->province_id      = $source->province_id;
        $dest->city_id          = $source->city_id;
        $dest->address          = $source->address;
        $dest->detail           = $source->detail;
        $dest->logo             = $source->logo;
    }
}