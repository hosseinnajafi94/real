<?php

namespace app\modules\calendars\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\calendars\models\DAL\Calendars;

/**
 * CalendarsSearchVML represents the model behind the search form of `app\modules\calendars\models\DAL\Calendars`.
 */
class CalendarsSearchVML extends Calendars
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'status_id', 'time_id', 'period_id', 'alarm_type_id'], 'integer'],
            [['title', 'favcolor', 'location', 'start_time', 'end_time', 'description', 'file'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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
    public function search($params)
    {
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
            'id' => $this->id,
            'type_id' => $this->type_id,
            'status_id' => $this->status_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'time_id' => $this->time_id,
            'period_id' => $this->period_id,
            'alarm_type_id' => $this->alarm_type_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'favcolor', $this->favcolor])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
