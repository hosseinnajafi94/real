<?php
namespace app\modules\organizations\models\VML;
use Yii;
use yii\base\Model;
use app\modules\organizations\models\DAL\OrganizationsPositionsListSkills;
class OrganizationsPositionsListSkillsVML extends Model {
    public $id;
    public $organization_id;
    public $title;
    public $model;
    public function rules() {
        return [
                [['title'], 'required'],
                [['title'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels() {
        return [
            'title' => Yii::t('organizations', 'Title'),
        ];
    }
    public function loaditems() {
        
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
        $data->model           = new OrganizationsPositionsListSkills();
        return $data;
    }
    public static function find($id) {
        $model = OrganizationsPositionsListSkills::findOne($id);
        if ($model === null) {
            return null;
        }
        $data        = new static();
        $data->model = $model;
        static::populate($data, $model);
        return $data;
    }
    public static function populate($dest, $source) {
        $dest->id              = $source->id;
        $dest->organization_id = $source->organization_id;
        $dest->title           = $source->title;
    }
}