<?php
namespace app\modules\organizations\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizations\models\DAL\OrganizationsPlanning;
class OrganizationsPlanningSearchVML extends OrganizationsPlanning {
    public $parent;
    public $myPageSize = 10;
    public function rules() {
        return [
                [['id', 'organization_id', 'type_id', 'parent_id', 'created_by', 'updated_by', 'myPageSize'], 'integer'],
                [['title', 'description', 'created_at', 'updated_at'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($org_id, $params) {
        $query        = OrganizationsPlanning::find()->where(['organization_id' => $org_id]);
        $dataProvider = new ActiveDataProvider([
            'query'      => $query,
            'sort'       => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andWhere(['parent_id' => $this->parent_id]);
        if (is_numeric($this->parent_id) && !is_null($this->parent_id)) {
            $this->parent = OrganizationsPlanning::findOne($this->parent_id);
        }
        $dataProvider->pagination->pageSize = $this->myPageSize;
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['organization_id' => $this->organization_id]);
        $query->andFilterWhere(['type_id' => $this->type_id]);
        $query->andFilterWhere(['created_at' => $this->created_at]);
        $query->andFilterWhere(['created_by' => $this->created_by]);
        $query->andFilterWhere(['updated_at' => $this->updated_at]);
        $query->andFilterWhere(['updated_by' => $this->updated_by]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'description', $this->description]);
        return $dataProvider;
    }
}