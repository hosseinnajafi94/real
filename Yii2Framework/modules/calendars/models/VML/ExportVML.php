<?php
namespace app\modules\calendars\models\VML;
use Yii;
use yii\base\Model;
use app\config\components\jdf;
use app\modules\calendars\models\DAL\Calendars;
class ExportVML extends Model {
    public $id;
    public $title;
    public $favcolor;
    public $type_id;
    public $status_id;
    public $location;
    public $start_date;
    public $end_date;
    public $start_time;
    public $end_time;
    public $description;
    public $has_reception;
    public $catering_id;
    public function rules() {
        return [
                [['has_reception', 'catering_id', 'type_id', 'status_id', 'id'], 'integer'],
                [['start_date', 'end_date', 'start_time', 'end_time'], 'safe'],
                [['description'], 'string'],
                [['title', 'favcolor', 'location'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels() {
        return [
            'id'            => Yii::t('calendars', 'ID'),
            'title'         => Yii::t('calendars', 'Title'),
            'favcolor'      => Yii::t('calendars', 'Favcolor'),
            'type_id'       => Yii::t('calendars', 'Type ID'),
            'status_id'     => Yii::t('calendars', 'Status ID'),
            'location'      => Yii::t('calendars', 'Location'),
            'start_date'    => Yii::t('calendars', 'Start Date'),
            'end_date'      => Yii::t('calendars', 'End Date'),
            'start_time'    => Yii::t('calendars', 'Start Time'),
            'end_time'      => Yii::t('calendars', 'End Time'),
            'description'   => Yii::t('calendars', 'Description'),
            'catering_id'   => Yii::t('calendars', 'Catering ID'),
            'has_reception' => Yii::t('calendars', 'Has Reception'),
        ];
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        if (!$this->validate()) {
            return false;
        }
        return true;
    }
    public function getRows() {
        $query = Calendars::find()
                ->andFilterWhere([
                    'id'        => $this->id,
                    'type_id'   => $this->type_id,
                    'status_id' => $this->status_id,
                ])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'favcolor', $this->favcolor])
                ->andFilterWhere(['like', 'location', $this->location])
                ->andFilterWhere(['like', 'description', $this->description]);
        if ($this->start_date && $this->end_date) {
            $query->andWhere("cast(start_time as date) BETWEEN '" . \app\config\components\functions::togdate($this->start_date) . "' AND '" . \app\config\components\functions::togdate($this->end_date) . "'");
        }
        if ($this->start_time && $this->end_time) {
            $query->andWhere("cast(start_time as time) BETWEEN '$this->start_time' AND '$this->end_time'");
        }
        $models = $query->orderBy(['start_time' => SORT_ASC])->all();
        $rows   = [];
        /* @var $models Calendars[] */
        foreach ($models as $model) {
            $time  = strtotime($model->start_time);
            $year  = jdf::jdate('Y', $time);
            $row   = [];
            $row[] = jdf::jdate('l', $time);
            $row[] = jdf::jdate('d', $time);
            $row[] = null;
            $row[] = date('Y-m- d', $time);
            $row[] = $model->title;
            $row[] = null;
            $row[] = null;
            $row[] = $model->implementation_steps;
            $row[] = $model->description;
            $month = jdf::jdate('F', $time);
            $index = $this->find($rows, $month);
            if ($index === -1) {
                $rows[] = [
                    'title' => $month,
                    'rows'  => [
                            [$year],
                            ['روزهای هفته', 'هجری شمسی', 'هجری قمری', 'میلادی', 'مناسبت های هجری شمسی', 'مناسبت های هجری قمری', 'مناسبت های میلادی', 'مراحل اجرا', 'توضیحات'],
                        $row
                    ]
                ];
            }
            else {
                $rows[$index]['rows'][] = $row;
            }
        }
        return $rows;
    }
    private function find($rows, $title) {
        foreach ($rows as $index => $row) {
            if ($row['title'] === $title) {
                return $index;
            }
        }
        return -1;
    }
}