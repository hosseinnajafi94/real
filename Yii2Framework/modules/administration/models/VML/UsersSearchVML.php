<?php
namespace app\modules\administration\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\Users;
class UsersSearchVML extends Users {
    public $perpage = 10;
    public function rules() {
        return [
            [['perpage'], 'integer'],
            [['username'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function searchAdmin($params) {
        $query        = Users::find()->where(['in_admin' => true]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'       => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'username', $this->username]);
        return $dataProvider;
    }
    public function search($params) {
        $query        = Users::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'       => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'username', $this->username]);
        return $dataProvider;
    }
}