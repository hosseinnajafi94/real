<?php
namespace app\modules\organizations\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizations\models\DAL\OrganizationsPositionsListSkills;
class OrganizationsPositionsListSkillsSearchVML extends OrganizationsPositionsListSkills {
    public $myPageSize = 10;
    public function rules() {
        return [
                [['id', 'organization_id', 'myPageSize'], 'integer'],
                [['title'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($org_id, $params) {
        $query        = OrganizationsPositionsListSkills::find()->where(['organization_id' => $org_id]);
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
        $dataProvider->pagination->pageSize = $this->myPageSize;
        $query->andFilterWhere([
            'id'              => $this->id,
            'organization_id' => $this->organization_id,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        return $dataProvider;
    }
}