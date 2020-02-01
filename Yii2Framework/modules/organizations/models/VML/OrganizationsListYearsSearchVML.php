<?php
namespace app\modules\organizations\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizations\models\DAL\OrganizationsListYears;
class OrganizationsListYearsSearchVML extends OrganizationsListYears {
    public function rules() {
        return [
                [['id', 'organization_id', 'type_id'], 'integer'],
                [['title', 'start_date', 'end_date'], 'safe'],
                [['sanad'], 'boolean'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($id, $params) {
        $query = OrganizationsListYears::find()->where(['organization_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id'              => $this->id,
            'type_id'         => $this->type_id,
            'start_date'      => $this->start_date,
            'end_date'        => $this->end_date,
            'sanad'           => $this->sanad,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        return $dataProvider;
    }
}