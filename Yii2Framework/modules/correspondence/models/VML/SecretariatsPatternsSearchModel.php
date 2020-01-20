<?php

namespace app\modules\correspondence\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\correspondence\models\DAL\SecretariatsPatterns;

/**
 * SecretariatsPatternsSearchModel represents the model behind the search form of `app\modules\correspondence\models\DAL\SecretariatsPatterns`.
 */
class SecretariatsPatternsSearchModel extends SecretariatsPatterns
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'secretariat_id', 'size_id', 'sign_count'], 'integer'],
            [['title', 'file'], 'safe'],
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
        $query = SecretariatsPatterns::find();

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
            'secretariat_id' => $this->secretariat_id,
            'size_id' => $this->size_id,
            'sign_count' => $this->sign_count,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
