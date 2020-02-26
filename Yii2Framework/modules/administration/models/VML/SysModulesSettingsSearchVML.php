<?php

namespace app\modules\administration\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administration\models\DAL\SysModulesSettings;

/**
 * SysModulesSettingsSearchVML represents the model behind the search form of `app\modules\administration\models\DAL\SysModulesSettings`.
 */
class SysModulesSettingsSearchVML extends SysModulesSettings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'week_id', 'day'], 'integer'],
            [['time'], 'safe'],
            [['auto_update'], 'boolean'],
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
        $query = SysModulesSettings::find();

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
            'type_id' => $this->type_id,
            'week_id' => $this->week_id,
            'day' => $this->day,
            'time' => $this->time,
            'auto_update' => $this->auto_update,
        ]);

        return $dataProvider;
    }
}
