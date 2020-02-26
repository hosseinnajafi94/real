<?php
namespace app\modules\administration\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administration\models\DAL\UsersListGroups;
class UsersListGroupsSearchVML extends UsersListGroups {
    public function rules() {
        return [
                [['id', 'admin_id'], 'integer'],
                [['name'], 'safe'],
        ];
    }
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params) {
        $query = UsersListGroups::find();

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
            'id'       => $this->id,
            'admin_id' => $this->admin_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}