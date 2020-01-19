<?php
namespace app\modules\calendars\models\VML;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\calendars\models\DAL\Calendars;
/**
 * CalendarsSearchVML represents the model behind the search form of `app\modules\calendars\models\DAL\Calendars`.
 */
class CalendarsSearchVML extends Calendars {
    public $list_type   = [];
    public $list_status = [];
    public $list_users = [];
    public function init() {
        parent::init();
        $this->list_type   = \app\modules\calendars\models\SRL\CalendarsListTypeSRL::getItems();
        $this->list_status = \app\modules\calendars\models\SRL\CalendarsListStatusSRL::getItems();
        $this->list_users = \app\modules\users\models\SRL\UsersSRL::getItems();
    }
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id', 'type_id', 'status_id', 'time_id', 'period_id', 'alarm_type_id', 'catering_id'], 'integer'],
                [['title', 'favcolor', 'location', 'start_time', 'end_time', 'description', 'file'], 'safe'],
            ['has_reception', 'boolean']
        ];
    }
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            'start_time'           => Yii::t('calendars', 'Start Date'),
            'end_time'             => Yii::t('calendars', 'End Date'),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Calendars::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id'            => $this->id,
            'type_id'       => $this->type_id,
            'status_id'     => $this->status_id,
//            'start_time'    => $this->start_time,
//            'end_time'      => $this->end_time,
            'time_id'       => $this->time_id,
            'period_id'     => $this->period_id,
            'alarm_type_id' => $this->alarm_type_id,
            'catering_id' => $this->catering_id,
            'has_reception' => $this->has_reception == 1 ? 1 : [0, 1, null],
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'favcolor', $this->favcolor])
                ->andFilterWhere(['like', 'location', $this->location])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'file', $this->file]);
        
        $start_time = \app\config\components\functions::togdate($this->start_time);
        if ($start_time) {
            $query->andWhere("start_time BETWEEN '$start_time 00:00:00' AND '$start_time 23:59:59'");
        }
        
        $end_time = \app\config\components\functions::togdate($this->end_time);
        if ($end_time) {
            $query->andWhere("end_time BETWEEN '$end_time 00:00:00' AND '$end_time 23:59:59'");
        }
        
        return $dataProvider;
    }
}