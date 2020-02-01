<?php
namespace app\modules\accounting\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\accounting\models\DAL\AccountingListSymbols;
class AccountingListSymbolsSearchModel extends AccountingListSymbols {
    public function rules() {
        return [
                [['id', 'sort', 'code_id', 'decimal_count', 'fee_decimal_count'], 'integer'],
                [['title', 'short_title', 'descriptions'], 'safe'],
                [['is_active', 'auto_update'], 'boolean'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($params) {
        $query = AccountingListSymbols::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['sort' => SORT_ASC]]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id'                => $this->id,
            'sort'              => $this->sort,
            'code_id'           => $this->code_id,
            'decimal_count'     => $this->decimal_count,
            'fee_decimal_count' => $this->fee_decimal_count,
            'is_active'         => $this->is_active,
            'auto_update'       => $this->auto_update,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'short_title', $this->short_title]);
        $query->andFilterWhere(['like', 'descriptions', $this->descriptions]);
        return $dataProvider;
    }
}