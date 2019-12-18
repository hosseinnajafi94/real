<?php
namespace app\modules\organizations\models\VML;
use Yii;
use yii\base\Model;
use app\config\components\functions;
use app\modules\organizations\models\DAL\OrganizationsPositions;
use app\modules\organizations\models\SRL\OrganizationsPositionsListFormsSRL;
use app\modules\organizations\models\SRL\OrganizationsPositionsListSkillsSRL;
use app\modules\organizations\models\SRL\OrganizationsPositionsListColumnsSRL;
use app\modules\tcoding\models\SRL\ListDegreeSRL;
use app\modules\tcoding\models\SRL\ListGendersSRL;
use app\modules\organizations\models\DAL\OrganizationsPositionsSkills;
use app\modules\organizations\models\DAL\OrganizationsPositionsColumns;
class OrganizationsPositionsVML extends Model {
    public $id;
    public $organization_id;
    public $name;
    public $persons;
    public $hiring_enable;
    public $job_code;
    public $description;
    public $form_id;
    public $extra_description;
    public $degree_id;
    public $experience;
    public $gender_id;
    public $resume_deadline;
    public $skills;
    public $position_skills = [];
    public $view_in_portal  = [];
    //
    public $forms           = [];
    public $degrees         = [];
    public $genders         = [];
    public $list_skills     = [];
    public $list_columns    = [];
    public $model;
    public function rules() {
        return [
                [['persons', 'form_id', 'degree_id', 'experience', 'gender_id'], 'integer'],
                [['hiring_enable'], 'boolean'],
                [['description', 'extra_description', 'skills'], 'string'],
                [['resume_deadline'], 'safe'],
                [['name', 'job_code'], 'string', 'max' => 255],
                [['position_skills', 'view_in_portal'], 'each', 'rule' => ['integer']],
        ];
    }
    public function attributeLabels() {
        return [
            'id'                => Yii::t('organizations', 'ID'),
            'organization_id'   => Yii::t('organizations', 'Organization ID'),
            'name'              => Yii::t('organizations', 'Name'),
            'persons'           => Yii::t('organizations', 'Persons'),
            'hiring_enable'     => Yii::t('organizations', 'Hiring Enable'),
            'job_code'          => Yii::t('organizations', 'Job Code'),
            'description'       => Yii::t('organizations', 'Description'),
            'form_id'           => Yii::t('organizations', 'Form ID'),
            'extra_description' => Yii::t('organizations', 'Extra Description'),
            'degree_id'         => Yii::t('organizations', 'Degree ID'),
            'experience'        => Yii::t('organizations', 'Experience'),
            'gender_id'         => Yii::t('organizations', 'Gender ID'),
            'resume_deadline'   => Yii::t('organizations', 'Resume Deadline'),
            'skills'            => Yii::t('organizations', 'Skills'),
            'position_skills'   => Yii::t('organizations', 'Position Skills'),
            'view_in_portal'    => Yii::t('organizations', 'View In Portal'),
        ];
    }
    public function loaditems() {
        $this->forms        = OrganizationsPositionsListFormsSRL::getItems();
        $this->degrees      = ListDegreeSRL::getItems();
        $this->genders      = ListGendersSRL::getItems();
        $this->list_skills  = OrganizationsPositionsListSkillsSRL::getItems(['organization_id' => $this->organization_id]);
        $this->list_columns = OrganizationsPositionsListColumnsSRL::getItems();
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        $this->resume_deadline = functions::togdate($this->resume_deadline);
        if (!$this->validate()) {
            return false;
        }
        $model = $this->model;
        $this->populate($model, $this);
        if (!$model->save()) {
            return false;
        }

        OrganizationsPositionsSkills::deleteAll(['position_id' => $model->id]);
        if (is_array($this->position_skills)) {
            foreach ($this->position_skills as $skillId) {
                $row              = new OrganizationsPositionsSkills();
                $row->position_id = $model->id;
                $row->skill_id    = $skillId;
                $row->save();
            }
        }

        OrganizationsPositionsColumns::deleteAll(['position_id' => $model->id]);
        if (is_array($this->view_in_portal)) {
            foreach ($this->view_in_portal as $columnId) {
                $row              = new OrganizationsPositionsColumns();
                $row->position_id = $model->id;
                $row->column_id   = $columnId;
                $row->save();
            }
        }

        $this->id = $model->id;
        return true;
    }
    public static function newInstance($org_id) {
        $data                  = new static();
        $data->organization_id = $org_id;
        $data->model           = new OrganizationsPositions();
        return $data;
    }
    public static function find($id) {

        $model = OrganizationsPositions::findOne($id);
        if ($model === null) {
            return null;
        }

        $data        = new static();
        $data->model = $model;
        static::populate($data, $model);

        $data->resume_deadline = functions::tojdate($data->resume_deadline);

        $ids1   = [];
        $skills = $model->getOrganizationsPositionsSkills()->all();
        foreach ($skills as $skill) {
            $ids1[] = $skill->skill_id;
        }
        $data->position_skills = $ids1;

        $ids2    = [];
        $columns = $model->getOrganizationsPositionsColumns()->all();
        foreach ($columns as $column) {
            $ids2[] = $column->column_id;
        }
        $data->view_in_portal = $ids2;

        return $data;
    }
    public static function populate($dest, $source) {
        $dest->id                = $source->id;
        $dest->organization_id   = $source->organization_id;
        $dest->name              = $source->name;
        $dest->persons           = $source->persons;
        $dest->hiring_enable     = $source->hiring_enable;
        $dest->job_code          = $source->job_code;
        $dest->description       = $source->description;
        $dest->form_id           = $source->form_id;
        $dest->extra_description = $source->extra_description;
        $dest->degree_id         = $source->degree_id;
        $dest->experience        = $source->experience;
        $dest->gender_id         = $source->gender_id;
        $dest->resume_deadline   = $source->resume_deadline;
        $dest->skills            = $source->skills;
    }
}