<?php
namespace app\modules\organizations\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizations\models\DAL\Organizations;
class OrganizationsSearchVML extends Organizations {
    public $myPageSize = 10;
    public function rules() {
        return [
                [['id', 'manager_id', 'parent_id', 'province_id', 'city_id', 'myPageSize'], 'integer'],
                [['name', 'register_id', 'register_number', 'date_start', 'activity_subject', 'ws_code', 'tfn', 'code', 'license', 'phone', 'fax', 'email', 'post', 'address', 'detail'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($params) {
        $query        = Organizations::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $dataProvider->pagination->pageSize = $this->myPageSize;
        $query->andFilterWhere([
            'id'          => $this->id,
            'manager_id'  => $this->manager_id,
            'date_start'  => $this->date_start,
            'parent_id'   => $this->parent_id,
            'province_id' => $this->province_id,
            'city_id'     => $this->city_id,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'register_id', $this->register_id])
                ->andFilterWhere(['like', 'register_number', $this->register_number])
                ->andFilterWhere(['like', 'activity_subject', $this->activity_subject])
                ->andFilterWhere(['like', 'ws_code', $this->ws_code])
                ->andFilterWhere(['like', 'tfn', $this->tfn])
                ->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'license', $this->license])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'fax', $this->fax])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'post', $this->post])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'detail', $this->detail]);
        return $dataProvider;
    }
}