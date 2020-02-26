<?php

namespace app\modules\administration\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administration\models\DAL\UsersListGroupsPermissions;

/**
 * UsersListGroupsPermissionsSearchVML represents the model behind the search form of `app\modules\administration\models\DAL\UsersListGroupsPermissions`.
 */
class UsersListGroupsPermissionsSearchVML extends UsersListGroupsPermissions
{
    public $perpage = 10;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'module_id', 'group_id', 'perpage'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $group_id)
    {
        $query = UsersListGroupsPermissions::find()->where(['group_id' => $group_id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $dataProvider->pagination->pageSize = $this->perpage;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'group_id' => $this->group_id,
            'module_id' => $this->module_id,
        ]);

        return $dataProvider;
    }
}
