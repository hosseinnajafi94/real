<?php
namespace app\modules\notifications\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\notifications\models\DAL\Notifications;
class NotificationsSearchVML extends Notifications {
    public function rules() {
        return [
                [['id', 'read'], 'integer'],
                [['title', 'description', 'datetime', 'icon'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($user_id, $params) {
        $query        = Notifications::find()
                ->where(['type_id' => 1, 'user_id' => $user_id])
                ->orWhere(['type_id' => 2]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'       => ['defaultOrder' => ['read' => SORT_ASC, 'id' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id'       => $this->id,
            'datetime' => $this->datetime,
            'read'     => $this->read,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'icon', $this->icon]);
        return $dataProvider;
    }
}