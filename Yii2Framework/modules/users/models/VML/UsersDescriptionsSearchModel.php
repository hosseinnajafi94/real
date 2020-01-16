<?php
namespace app\modules\users\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\UsersDescriptions;
class UsersDescriptionsSearchModel extends UsersDescriptions {
    public function rules() {
        return [
                [['id', 'user_id'], 'integer'],
                [['descriptions'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($type_id, $params) {
        $query = UsersDescriptions::find()->where(['type_id' => $type_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id'      => $this->id,
            'user_id' => $this->user_id,
        ]);
        $query->andFilterWhere(['like', 'descriptions', $this->descriptions]);
        return $dataProvider;
    }
}