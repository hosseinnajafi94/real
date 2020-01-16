<?php
namespace app\modules\calendars\models\VML;
use Yii;
use yii\base\Model;
use app\modules\users\models\SRL\UsersSRL;
use app\modules\calendars\models\DAL\CalendarsListType;
use app\modules\calendars\models\DAL\CalendarsSections;
class CalendarsListTypeVML extends Model {
    public $id;
    public $title;
    public $description;
    public $sections1     = [];
    public $sections2     = [];
    public $sections3     = [];
    //
    public $list_sections = [];
    //
    public $model;
    public function rules() {
        return [
                [['title'], 'required'],
                [['id'], 'integer'],
                [['description'], 'string'],
                [['title'], 'string', 'max' => 255],
                [['sections1', 'sections2', 'sections3'], 'each', 'rule' => ['integer']],
        ];
    }
    public function attributeLabels() {
        return [
            'id'           => Yii::t('calendars', 'ID'),
            'title'        => Yii::t('calendars', 'Title'),
            'description' => Yii::t('calendars', 'Description'),
            'sections1'    => Yii::t('calendars', 'Sections1'),
            'sections2'    => Yii::t('calendars', 'Sections2'),
            'sections3'    => Yii::t('calendars', 'Sections3'),
        ];
    }
    public static function newInstance() {
        $data        = new static();
        $data->model = new CalendarsListType();
        return $data;
    }
    public function loaditems() {
        $this->list_sections = UsersSRL::getItems();
        return $this;
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        if (!$this->validate()) {
            return false;
        }
        $model              = $this->model;
        if ($this->id) {
            $model = CalendarsListType::findOne($this->id);
            if ($model === null) {
                return false;
            }
        }
        $model->title       = $this->title;
        $model->descriptions = $this->description;
        if (!$model->save()) {
            return false;
        }
        $this->id = $model->id;
        CalendarsSections::deleteAll(['type_id' => $this->id]);
        if (is_array($this->sections1)) {
            foreach ($this->sections1 as $section1UserId) {
                $row             = new CalendarsSections();
                $row->section_id = 1;
                $row->type_id    = $this->id;
                $row->user_id    = $section1UserId;
                $row->save();
            }
        }
        if (is_array($this->sections2)) {
            foreach ($this->sections2 as $section2UserId) {
                $row             = new CalendarsSections();
                $row->section_id = 2;
                $row->type_id    = $this->id;
                $row->user_id    = $section2UserId;
                $row->save();
            }
        }
        if (is_array($this->sections3)) {
            foreach ($this->sections3 as $section3UserId) {
                $row             = new CalendarsSections();
                $row->section_id = 3;
                $row->type_id    = $this->id;
                $row->user_id    = $section3UserId;
                $row->save();
            }
        }
        return true;
    }
    public function getTypes() {
        $types = CalendarsListType::find()->select('*, descriptions as description')->orderBy(['id' => SORT_ASC])->asArray()->all();
        foreach ($types as &$type) {
            $rows = CalendarsSections::find()->where(['type_id' => $type['id']])->asArray()->all();
            foreach ($rows as $row) {
                $type['sections' . $row['section_id']][] = $row['user_id'];
            }
        }
        return $types;
    }
}