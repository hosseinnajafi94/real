<?php

namespace app\modules\accounting\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\accounting\models\DAL\AccountingClientFormats;

/**
 * AccountingClientFormatsSearchModel represents the model behind the search form of `app\modules\accounting\models\DAL\AccountingClientFormats`.
 */
class AccountingClientFormatsSearchModel extends AccountingClientFormats
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'length', 'format_id', 'order_id', 'account_name_id'], 'integer'],
            [['title'], 'safe'],
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
        $query = AccountingClientFormats::find();

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
            'length' => $this->length,
            'format_id' => $this->format_id,
            'order_id' => $this->order_id,
            'account_name_id' => $this->account_name_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
