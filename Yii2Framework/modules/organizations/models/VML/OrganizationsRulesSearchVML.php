<?php

namespace app\modules\organizations\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizations\models\DAL\OrganizationsRules;

/**
 * OrganizationsRulesSearchVML represents the model behind the search form of `app\modules\organizations\models\DAL\OrganizationsRules`.
 */
class OrganizationsRulesSearchVML extends OrganizationsRules
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'org_id', 'type_id'], 'integer'],
            [['title', 'descriptions'], 'safe'],
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
        $query = OrganizationsRules::find();

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
            'org_id' => $this->org_id,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'descriptions', $this->descriptions]);

        return $dataProvider;
    }
}
