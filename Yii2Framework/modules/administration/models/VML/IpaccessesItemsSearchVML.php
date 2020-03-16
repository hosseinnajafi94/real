<?php

namespace app\modules\administration\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administration\models\DAL\IpaccessesItems;

/**
 * IpaccessesItemsSearchVML represents the model behind the search form of `app\modules\administration\models\DAL\IpaccessesItems`.
 */
class IpaccessesItemsSearchVML extends IpaccessesItems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'created_by'], 'integer'],
            [['id_range', 'description', 'datetime'], 'safe'],
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
        $query = IpaccessesItems::find();

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
            'parent_id' => $this->parent_id,
            'datetime' => $this->datetime,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'id_range', $this->id_range])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
