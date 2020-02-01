<?php
namespace app\modules\accounting\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\accounting\models\DAL\AccountingProjects;
class AccountingProjectsSearchModel extends AccountingProjects {
    public function rules() {
        return [
                [['id', 'form_id'], 'integer'],
                [['code', 'title', 'descriptions'], 'safe'],
                [['is_active', 'voucher_allow'], 'boolean'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($params) {
        $query        = AccountingProjects::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id'            => $this->id,
            'is_active'     => $this->is_active,
            'voucher_allow' => $this->voucher_allow,
            'form_id'       => $this->form_id,
        ]);
        $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'descriptions', $this->descriptions]);
        return $dataProvider;
    }
}