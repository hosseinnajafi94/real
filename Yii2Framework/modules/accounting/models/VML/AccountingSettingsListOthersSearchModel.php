<?php
namespace app\modules\accounting\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\accounting\models\DAL\AccountingSettingsListOthers;
class AccountingSettingsListOthersSearchModel extends AccountingSettingsListOthers {
    public function rules() {
        return [
                [['id', 'client_id'], 'integer'],
                [['title'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($params) {
        $query = AccountingSettingsListOthers::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id'        => $this->id,
            'client_id' => $this->client_id,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        return $dataProvider;
    }
}