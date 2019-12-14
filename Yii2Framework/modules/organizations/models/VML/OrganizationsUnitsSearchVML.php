<?php
namespace app\modules\organizations\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizations\models\DAL\OrganizationsUnits;
class OrganizationsUnitsSearchVML extends OrganizationsUnits {
    public $myPageSize = 10;
    public function rules() {
        return [
                [['id', 'manager_id', 'province_id', 'city_id', 'acl_id', 'acl_category_id', 'work_place_status_id', 'insurance_acc_id', 'tax_acc_id', 'darsad1', 'darsad2', 'myPageSize'], 'integer'],
                [['name', 'ws_code', 'tfn', 'unit_description'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($org_id, $params) {
        $query        = OrganizationsUnits::find()->where(['organization_id' => $org_id]);
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
            'id'                   => $this->id,
            'manager_id'           => $this->manager_id,
            'province_id'          => $this->province_id,
            'city_id'              => $this->city_id,
            'acl_id'               => $this->acl_id,
            'acl_category_id'      => $this->acl_category_id,
            'work_place_status_id' => $this->work_place_status_id,
            'insurance_acc_id'     => $this->insurance_acc_id,
            'tax_acc_id'           => $this->tax_acc_id,
            'darsad1'              => $this->darsad1,
            'darsad2'              => $this->darsad2,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'ws_code', $this->ws_code])
                ->andFilterWhere(['like', 'tfn', $this->tfn])
                ->andFilterWhere(['like', 'unit_description', $this->unit_description]);
        return $dataProvider;
    }
}