<?php
namespace app\modules\organizations\models\VML;
use Yii;
use yii\base\Model;
use app\modules\organizations\models\DAL\OrganizationsUnits;
use app\modules\organizations\models\DAL\OrganizationsUnitsPositions;
use app\modules\users\models\SRL\UsersSRL;
use app\modules\geo\models\SRL\GeoCitiesSRL;
use app\modules\geo\models\SRL\GeoProvincesSRL;
use app\modules\organizations\models\SRL\OrganizationsPositionsSRL;
use app\modules\organizations\models\SRL\OrganizationsUnitsListTaxAccSRL;
use app\modules\organizations\models\SRL\OrganizationsUnitsListInsuranceAccSRL;
use app\modules\organizations\models\SRL\OrganizationsUnitsListWorkPlaceStatusSRL;
class OrganizationsUnitsVML extends Model {
    public $id;
    public $parent_id;
    public $organization_id;
    public $name;
    public $manager_id;
    public $province_id;
    public $city_id;
    public $work_place_status_id;
    public $ws_code;
    public $tfn;
    public $insurance_acc_id;
    public $tax_acc_id;
    public $darsad1;
    public $darsad2;
    public $unit_description;
    public $positions         = [];
    //
    public $managers          = [];
    public $provinces         = [];
    public $cities            = [];
    public $workplacestatuses = [];
    public $insuranceaccs     = [];
    public $taxaccs           = [];
    public $list_positions    = [];
    public $model;
    public function rules() {
        return [
                [['manager_id', 'province_id', 'city_id', 'work_place_status_id', 'insurance_acc_id', 'tax_acc_id', 'darsad1', 'darsad2'], 'integer'],
                [['unit_description'], 'string'],
                [['name', 'ws_code', 'tfn'], 'string', 'max' => 255],
                [['positions'], 'each', 'rule' => ['integer']]
        ];
    }
    public function attributeLabels() {
        return [
            'id'                   => Yii::t('organizations', 'ID'),
            'name'                 => Yii::t('organizations', 'Name'),
            'manager_id'           => Yii::t('organizations', 'Manager ID'),
            'province_id'          => Yii::t('organizations', 'Province ID'),
            'city_id'              => Yii::t('organizations', 'City ID'),
            'work_place_status_id' => Yii::t('organizations', 'Work Place Status ID'),
            'ws_code'              => Yii::t('organizations', 'Ws Code'),
            'tfn'                  => Yii::t('organizations', 'Tfn'),
            'insurance_acc_id'     => Yii::t('organizations', 'Insurance Acc ID'),
            'tax_acc_id'           => Yii::t('organizations', 'Tax Acc ID'),
            'darsad1'              => Yii::t('organizations', 'Darsad1'),
            'darsad2'              => Yii::t('organizations', 'Darsad2'),
            'unit_description'     => Yii::t('organizations', 'Unit Description'),
            'positions'            => Yii::t('organizations', 'Positions'),
        ];
    }
    public function loaditems() {
        $this->managers          = UsersSRL::getItems();
        $this->provinces         = GeoProvincesSRL::getItems();
        $this->cities            = GeoCitiesSRL::getItems(['province_id' => $this->province_id]);
        $this->workplacestatuses = OrganizationsUnitsListWorkPlaceStatusSRL::getItems();
        $this->insuranceaccs     = OrganizationsUnitsListInsuranceAccSRL::getItems();
        $this->taxaccs           = OrganizationsUnitsListTaxAccSRL::getItems();
        $this->list_positions    = OrganizationsPositionsSRL::getItems(['organization_id' => $this->organization_id]);
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
        OrganizationsUnitsPositions::deleteAll(['unit_id' => $model->id]);
        if (is_array($this->positions)) {
            foreach ($this->positions as $positionId) {
                $row = new OrganizationsUnitsPositions();
                $row->unit_id = $model->id;
                $row->position_id = $positionId;
                $row->save();
            }
        }
        $this->id = $model->id;
        return true;
    }
    public static function newInstance($org_id, $parent_id = null) {
        $data                  = new static();
        $data->parent_id       = $parent_id;
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
        $positionsIds = [];
        $positions = OrganizationsUnitsPositions::findAll(['unit_id' => $model->id]);
        foreach ($positions as $position) {
            $positionsIds[] = $position->position_id;
        }
        $data->positions = $positionsIds;
        static::populate($data, $model);
        return $data;
    }
    public static function populate($dest, $source) {
        $dest->id                   = $source->id;
        $dest->parent_id            = $source->parent_id;
        $dest->organization_id      = $source->organization_id;
        $dest->name                 = $source->name;
        $dest->manager_id           = $source->manager_id;
        $dest->province_id          = $source->province_id;
        $dest->city_id              = $source->city_id;
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