<?php

namespace app\modules\administration\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administration\models\DAL\SysEvents;

/**
 * SysEventsSearchVML represents the model behind the search form of `app\modules\administration\models\DAL\SysEvents`.
 */
class SysEventsSearchVML extends SysEvents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_id', 'user_id'], 'integer'],
            [['ip', 'title', 'datetime'], 'safe'],
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
        $query = SysEvents::find();

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
            'status_id' => $this->status_id,
            'user_id' => $this->user_id,
            'datetime' => $this->datetime,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
