<?php

namespace app\modules\users\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\UsersEducations;

/**
 * UsersEducationsSearchModel represents the model behind the search form of `app\modules\users\models\DAL\UsersEducations`.
 */
class UsersEducationsSearchModel extends UsersEducations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type_id', 'degree_id', 'gpa', 'points'], 'integer'],
            [['field', 'university', 'start_date', 'end_date', 'evidence', 'description'], 'safe'],
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
        $query = UsersEducations::find();

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
            'degree_id' => $this->degree_id,
            'gpa' => $this->gpa,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'points' => $this->points,
        ]);

        $query->andFilterWhere(['like', 'field', $this->field])
            ->andFilterWhere(['like', 'university', $this->university])
            ->andFilterWhere(['like', 'evidence', $this->evidence])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
