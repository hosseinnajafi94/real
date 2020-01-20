<?php

namespace app\modules\correspondence\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\correspondence\models\DAL\Secretariats;

/**
 * SecretariatsSearchModel represents the model behind the search form of `app\modules\correspondence\models\DAL\Secretariats`.
 */
class SecretariatsSearchModel extends Secretariats
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'section_1', 'section_2'], 'integer'],
            [['name', 'splitter_1', 'splitter_2'], 'safe'],
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
        $query = Secretariats::find();

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
            'section_1' => $this->section_1,
            'section_2' => $this->section_2,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'splitter_1', $this->splitter_1])
            ->andFilterWhere(['like', 'splitter_2', $this->splitter_2]);

        return $dataProvider;
    }
}
