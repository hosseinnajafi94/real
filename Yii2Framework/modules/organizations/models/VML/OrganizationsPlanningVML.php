<?php
namespace app\modules\organizations\models\VML;
use Yii;
use yii\base\Model;
use app\config\components\functions;
use app\modules\organizations\models\DAL\OrganizationsPlanning;
class OrganizationsPlanningVML extends Model {
    public $id;
    public $organization_id;
    public $type_id;
    public $parent_id;
    public $title;
    public $description;
    public $create_at;
    public $create_by;
    public $updated_at;
    public $updated_by;
    //
    public $model;
    //
    public function rules() {
        return [
                [['title'], 'string', 'max' => 255],
                [['description'], 'string'],
        ];
    }
    public function attributeLabels() {
        return [
            'id'              => Yii::t('organizations', 'ID'),
            'organization_id' => Yii::t('organizations', 'Organization ID'),
            'type_id'         => Yii::t('organizations', 'Type ID'),
            'parent_id'       => Yii::t('organizations', 'Parent ID'),
            'title'           => Yii::t('organizations', 'Title'),
            'description'     => Yii::t('organizations', 'Desc'),
            'create_at'       => Yii::t('organizations', 'Create At'),
            'created_by'      => Yii::t('organizations', 'Created By'),
            'updated_at'      => Yii::t('organizations', 'Updated At'),
            'updated_by'      => Yii::t('organizations', 'Updated By'),
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
        /* @var $model OrganizationsPlanning */
        $model = $this->model;
        if ($model->isNewRecord) {
            $model->created_at = functions::getdatetime();
            $model->created_by = Yii::$app->user->id;
        }
        $model->updated_at = functions::getdatetime();
        $model->updated_by = Yii::$app->user->id;
        $this->populate($model, $this);
        if (!$model->save()) {
            return false;
        }
        $this->id = $model->id;
        return true;
    }
    public static function newInstance($org_id, $parent_id = null) {
        $data                  = new static();
        $data->organization_id = $org_id;
        $data->parent_id       = $parent_id;
        $data->model           = new OrganizationsPlanning();
        if ($parent_id !== null) {
            $parent = OrganizationsPlanning::findOne($parent_id);
            if ($parent === null) {
                return null;
            }
            $data->type_id = ((int) $parent->type_id) + 1;
            if ($data->type_id === 4) {
                return null;
            }
        }
        else {
            $data->type_id = 1;
        }
        return $data;
    }
    public static function find($id) {
        $model = OrganizationsPlanning::findOne($id);
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
        $dest->type_id         = $source->type_id;
        $dest->parent_id       = $source->parent_id;
        $dest->title           = $source->title;
        $dest->description     = $source->description;
    }
}