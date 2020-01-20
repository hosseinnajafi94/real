<?php
namespace app\modules\correspondence\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\correspondence\models\DAL\SecretariatsPatterns;
class PatternsSearchVML extends SecretariatsPatterns {
    public function rules() {
        return [
                [['id', 'size_id', 'sign_count'], 'integer'],
                [['title', 'file'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($params) {
        $query        = SecretariatsPatterns::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id'         => $this->id,
            'size_id'    => $this->size_id,
            'sign_count' => $this->sign_count,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'file', $this->file]);
        return $dataProvider;
    }
}