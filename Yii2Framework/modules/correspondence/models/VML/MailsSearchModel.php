<?php

namespace app\modules\correspondence\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\correspondence\models\DAL\Mails;

/**
 * MailsSearchModel represents the model behind the search form of `app\modules\correspondence\models\DAL\Mails`.
 */
class MailsSearchModel extends Mails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type_id', 'secretariat_id', 'pattern_id', 'receiver_type_id', 'receiver1_id', 'receiver2_id', 'status_id', 'section_1', 'section_2', 'section_3'], 'integer'],
            [['text'], 'safe'],
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
        $query = Mails::find();

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
            'secretariat_id' => $this->secretariat_id,
            'pattern_id' => $this->pattern_id,
            'receiver_type_id' => $this->receiver_type_id,
            'receiver1_id' => $this->receiver1_id,
            'receiver2_id' => $this->receiver2_id,
            'status_id' => $this->status_id,
            'section_1' => $this->section_1,
            'section_2' => $this->section_2,
            'section_3' => $this->section_3,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
