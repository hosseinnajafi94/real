<?php

namespace app\modules\users\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\UsersGroups;

/**
 * UsersGroupsSearchVML represents the model behind the search form of `app\modules\users\models\DAL\UsersGroups`.
 */
class UsersGroupsSearchVML extends UsersGroups
{
    public $perpage = 10;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'group_id', 'perpage'], 'integer'],
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
    public function search($params, $group_id)
    {
        $query = UsersGroups::find()->where(['group_id' => $group_id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $dataProvider->pagination->pageSize = $this->perpage;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'group_id' => $this->group_id,
        ]);

        return $dataProvider;
    }
    public function search2($params, $user_id)
    {
        $query = UsersGroups::find()->where(['user_id' => $user_id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $dataProvider->pagination->pageSize = $this->perpage;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'group_id' => $this->group_id,
        ]);

        return $dataProvider;
    }
}
