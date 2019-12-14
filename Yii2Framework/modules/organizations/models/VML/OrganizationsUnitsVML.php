<?php
namespace app\modules\organizations\models\VML;
use Yii;
use yii\base\Model;
use app\modules\organizations\models\DAL\OrganizationsUnits;
use app\modules\users\models\SRL\UsersSRL;
use app\modules\geo\models\SRL\GeoCitiesSRL;
use app\modules\geo\models\SRL\GeoProvincesSRL;
use app\modules\organizations\models\SRL\OrganizationsUnitsListAclSRL;
use app\modules\organizations\models\SRL\OrganizationsUnitsListTaxAccSRL;
use app\modules\organizations\models\SRL\OrganizationsUnitsListAclcategorySRL;
use app\modules\organizations\models\SRL\OrganizationsUnitsListInsuranceAccSRL;
use app\modules\organizations\models\SRL\OrganizationsUnitsListWorkPlaceStatusSRL;
class OrganizationsUnitsVML extends Model {
    public $id;
    public $organization_id;
    public $name;
    public $manager_id;
    public $province_id;
    public $city_id;
    public $acl_id;
    public $acl_category_id;
    public $work_place_status_id;
    public $ws_code;
    public $tfn;
    public $insurance_acc_id;
    public $tax_acc_id;
    public $darsad1;
    public $darsad2;
    public $unit_description;
    //
    public $managers          = [];
    public $provinces         = [];
    public $cities            = [];
    public $acls              = [];
    public $aclcategories     = [];
    public $workplacestatuses = [];
    public $insuranceaccs     = [];
    public $taxaccs           = [];
    public $model;
    public function rules() {
        return [
                [['manager_id', 'province_id', 'city_id', 'acl_id', 'acl_category_id', 'work_place_status_id', 'insurance_acc_id', 'tax_acc_id', 'darsad1', 'darsad2'], 'integer'],
                [['unit_description'], 'string'],
                [['name', 'ws_code', 'tfn'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels() {
        return [
            'id'                   => Yii::t('organizations', 'ID'),
            'name'                 => Yii::t('organizations', 'Name'),
            'manager_id'           => Yii::t('organizations', 'Manager ID'),
            'province_id'          => Yii::t('organizations', 'Province ID'),
            'city_id'              => Yii::t('organizations', 'City ID'),
            'acl_id'               => Yii::t('organizations', 'Acl ID'),
            'acl_category_id'      => Yii::t('organizations', 'Acl Category ID'),
            'work_place_status_id' => Yii::t('organizations', 'Work Place Status ID'),
            'ws_code'              => Yii::t('organizations', 'Ws Code'),
            'tfn'                  => Yii::t('organizations', 'Tfn'),
            'insurance_acc_id'     => Yii::t('organizations', 'Insurance Acc ID'),
            'tax_acc_id'           => Yii::t('organizations', 'Tax Acc ID'),
            'darsad1'              => Yii::t('organizations', 'Darsad1'),
            'darsad2'              => Yii::t('organizations', 'Darsad2'),
            'unit_description'     => Yii::t('organizations', 'Unit Description'),
        ];
    }
    public function loaditems() {
        $this->managers          = UsersSRL::getItems();
        $this->provinces         = GeoProvincesSRL::getItems();
        $this->cities            = GeoCitiesSRL::getItems(['province_id' => $this->province_id]);
        $this->acls              = OrganizationsUnitsListAclSRL::getItems();
        $this->aclcategories     = OrganizationsUnitsListAclcategorySRL::getItems();
        $this->workplacestatuses = OrganizationsUnitsListWorkPlaceStatusSRL::getItems();
        $this->insuranceaccs     = OrganizationsUnitsListInsuranceAccSRL::getItems();
        $this->taxaccs           = OrganizationsUnitsListTaxAccSRL::getItems();
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
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
    public static function newInstance($org_id) {
        $data                  = new static();
        $data->organization_id = $org_id;
        $data->model           = new OrganizationsUnits();
        return $data;
    }
    public static function find($id) {
        $model = OrganizationsUnits::findOne($id);
        if ($model === null) {
            return null;
        }
        $data        = new static();
        $data->model = $model;
        static::populate($data, $model);
        return $data;
    }
    public static function populate($dest, $source) {
        $dest->id                   = $source->id;
        $dest->organization_id      = $source->organization_id;
        $dest->name                 = $source->name;
        $dest->manager_id           = $source->manager_id;
        $dest->province_id          = $source->province_id;
        $dest->city_id              = $source->city_id;
        $dest->acl_id               = $source->acl_id;
        $dest->acl_category_id      = $source->acl_category_id;
        $dest->work_place_status_id = $source->work_place_status_id;
        $dest->ws_code              = $source->ws_code;
        $dest->tfn                  = $source->tfn;
        $dest->insurance_acc_id     = $source->insurance_acc_id;
        $dest->tax_acc_id           = $source->tax_acc_id;
        $dest->darsad1              = $source->darsad1;
        $dest->darsad2              = $source->darsad2;
        $dest->unit_description     = $source->unit_description;
    }
}