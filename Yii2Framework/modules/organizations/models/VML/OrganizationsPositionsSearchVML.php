<?php
namespace app\modules\organizations\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizations\models\DAL\OrganizationsPositions;
class OrganizationsPositionsSearchVML extends OrganizationsPositions {
    public $myPageSize = 10;
    public function rules() {
        return [
                [['id', 'organization_id', 'persons', 'form_id', 'degree_id', 'experience', 'gender_id', 'myPageSize'], 'integer'],
                [['name', 'job_code', 'description', 'extra_description', 'resume_deadline', 'skills'], 'safe'],
                [['hiring_enable'], 'boolean'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($org_id, $params) {
        $query        = OrganizationsPositions::find()->where(['organization_id' => $org_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
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
            'persons'         => $this->persons,
            'hiring_enable'   => $this->hiring_enable,
            'form_id'         => $this->form_id,
            'degree_id'       => $this->degree_id,
            'experience'      => $this->experience,
            'gender_id'       => $this->gender_id,
            'resume_deadline' => $this->resume_deadline,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'job_code', $this->job_code])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'extra_description', $this->extra_description])
                ->andFilterWhere(['like', 'skills', $this->skills]);
        return $dataProvider;
    }
}