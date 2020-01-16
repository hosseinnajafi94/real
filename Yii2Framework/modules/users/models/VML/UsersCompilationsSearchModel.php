<?php

namespace app\modules\users\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\UsersCompilations;

/**
 * UsersCompilationsSearchModel represents the model behind the search form of `app\modules\users\models\DAL\UsersCompilations`.
 */
class UsersCompilationsSearchModel extends UsersCompilations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type_id', 'submit_type_id', 'year', 'page_number', 'points'], 'integer'],
            [['title', 'place', 'descriptions'], 'safe'],
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
        $query = UsersCompilations::find();

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
            'user_id' => $this->user_id,
            'type_id' => $this->type_id,
            'submit_type_id' => $this->submit_type_id,
            'year' => $this->year,
            'page_number' => $this->page_number,
            'points' => $this->points,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'descriptions', $this->descriptions]);

        return $dataProvider;
    }
}
