<?php

namespace app\modules\organizations\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizations\models\DAL\OrganizationsMachines;

/**
 * OrganizationsMachinesSearchVML represents the model behind the search form of `app\modules\organizations\models\DAL\OrganizationsMachines`.
 */
class OrganizationsMachinesSearchVML extends OrganizationsMachines
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'org_id', 'machine_id', 'port', 'calendar_type_id', 'timezone_id', 'model_id', 'daylight_id', 'form_month_id', 'form_day_id', 'to_month_id', 'to_day_id'], 'integer'],
            [['title', 'ip'], 'safe'],
            [['enable_cal_login', 'default_type_sync'], 'boolean'],
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
    public function search($params)
    {
        $query = OrganizationsMachines::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'org_id' => $this->org_id,
            'machine_id' => $this->machine_id,
            'port' => $this->port,
            'calendar_type_id' => $this->calendar_type_id,
            'timezone_id' => $this->timezone_id,
            'model_id' => $this->model_id,
            'daylight_id' => $this->daylight_id,
            'form_month_id' => $this->form_month_id,
            'form_day_id' => $this->form_day_id,
            'to_month_id' => $this->to_month_id,
            'to_day_id' => $this->to_day_id,
            'enable_cal_login' => $this->enable_cal_login,
            'default_type_sync' => $this->default_type_sync,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}
