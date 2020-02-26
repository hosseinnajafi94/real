<?php

namespace app\modules\users\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\UsersLoans;

/**
 * UsersLoansSearchVML represents the model behind the search form of `app\modules\users\models\DAL\UsersLoans`.
 */
class UsersLoansSearchVML extends UsersLoans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'position_id', 'group_id', 'user_id', 'loan_type_id', 'form_id'], 'integer'],
            [['date_request', 'date_start', 'date_end', 'amount', 'istallments'], 'safe'],
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
        $query = UsersLoans::find();

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
            'position_id' => $this->position_id,
            'group_id' => $this->group_id,
            'user_id' => $this->user_id,
            'loan_type_id' => $this->loan_type_id,
            'date_request' => $this->date_request,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'form_id' => $this->form_id,
        ]);

        $query->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'istallments', $this->istallments]);

        return $dataProvider;
    }
}
