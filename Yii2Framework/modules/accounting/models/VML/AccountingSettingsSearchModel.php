<?php

namespace app\modules\accounting\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\accounting\models\DAL\AccountingSettings;

/**
 * AccountingSettingsSearchModel represents the model behind the search form of `app\modules\accounting\models\DAL\AccountingSettings`.
 */
class AccountingSettingsSearchModel extends AccountingSettings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'default_account01_id', 'default_account02_id', 'default_account03_id', 'default_account04_id', 'default_account05_id', 'default_account06_id', 'default_account07_id', 'default_account08_id', 'default_account09_id', 'default_account10_id', 'default_account11_id', 'default_account12_id', 'default_account13_id', 'default_account14_id', 'default_account15_id', 'default_account16_id', 'default_account17_id', 'default_account18_id', 'default_account19_id', 'default_account20_id', 'default_account21_id', 'default_account22_id', 'default_account23_id', 'default_account24_id', 'default_account25_id', 'default_account26_id', 'default_account27_id', 'default_account28_id', 'default_account29_id', 'default_account30_id', 'default_account31_id', 'default_account32_id', 'default_account33_id', 'default_account34_id', 'default_account35_id', 'default_account36_id', 'default_account37_id', 'default_account38_id', 'default_account39_id', 'default_account40_id', 'default_account41_id', 'default_account42_id', 'default_account43_id', 'default_account44_id', 'default_account45_id', 'default_account46_id', 'default_account47_id', 'default_account48_id', 'default_account49_id', 'default_account50_id', 'default_account51_id', 'default_account52_id', 'default_account53_id', 'default_account54_id', 'default_account55_id', 'default_account56_id', 'default_account57_id', 'default_account58_id', 'default_account59_id', 'default_account60_id', 'default_account61_id', 'default_account62_id', 'default_account63_id', 'default_account64_id', 'default_account65_id', 'default_account66_id', 'default_account67_id', 'id_p01', 'id_p02', 'id_p03', 'id_p04', 'id_p05', 'id_p06', 'id_p07', 'id_p08', 'id_p09', 'id_p10', 'valint01', 'valint02', 'valint03', 'valint04', 'valint05', 'valint06', 'valint07', 'valint08', 'valint09', 'valint10', 'valint11', 'valint12', 'valint13', 'valint14'], 'integer'],
            [['bit01', 'bit02', 'bit03', 'bit04', 'bit05', 'bit06'], 'boolean'],
            [['name01', 'name02'], 'safe'],
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
        $query = AccountingSettings::find();

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
            'default_account01_id' => $this->default_account01_id,
            'default_account02_id' => $this->default_account02_id,
            'default_account03_id' => $this->default_account03_id,
            'default_account04_id' => $this->default_account04_id,
            'default_account05_id' => $this->default_account05_id,
            'default_account06_id' => $this->default_account06_id,
            'default_account07_id' => $this->default_account07_id,
            'default_account08_id' => $this->default_account08_id,
            'default_account09_id' => $this->default_account09_id,
            'default_account10_id' => $this->default_account10_id,
            'default_account11_id' => $this->default_account11_id,
            'default_account12_id' => $this->default_account12_id,
            'default_account13_id' => $this->default_account13_id,
            'default_account14_id' => $this->default_account14_id,
            'default_account15_id' => $this->default_account15_id,
            'default_account16_id' => $this->default_account16_id,
            'default_account17_id' => $this->default_account17_id,
            'default_account18_id' => $this->default_account18_id,
            'default_account19_id' => $this->default_account19_id,
            'default_account20_id' => $this->default_account20_id,
            'default_account21_id' => $this->default_account21_id,
            'default_account22_id' => $this->default_account22_id,
            'default_account23_id' => $this->default_account23_id,
            'default_account24_id' => $this->default_account24_id,
            'default_account25_id' => $this->default_account25_id,
            'default_account26_id' => $this->default_account26_id,
            'default_account27_id' => $this->default_account27_id,
            'default_account28_id' => $this->default_account28_id,
            'default_account29_id' => $this->default_account29_id,
            'default_account30_id' => $this->default_account30_id,
            'default_account31_id' => $this->default_account31_id,
            'default_account32_id' => $this->default_account32_id,
            'default_account33_id' => $this->default_account33_id,
            'default_account34_id' => $this->default_account34_id,
            'default_account35_id' => $this->default_account35_id,
            'default_account36_id' => $this->default_account36_id,
            'default_account37_id' => $this->default_account37_id,
            'default_account38_id' => $this->default_account38_id,
            'default_account39_id' => $this->default_account39_id,
            'default_account40_id' => $this->default_account40_id,
            'default_account41_id' => $this->default_account41_id,
            'default_account42_id' => $this->default_account42_id,
            'default_account43_id' => $this->default_account43_id,
            'default_account44_id' => $this->default_account44_id,
            'default_account45_id' => $this->default_account45_id,
            'default_account46_id' => $this->default_account46_id,
            'default_account47_id' => $this->default_account47_id,
            'default_account48_id' => $this->default_account48_id,
            'default_account49_id' => $this->default_account49_id,
            'default_account50_id' => $this->default_account50_id,
            'default_account51_id' => $this->default_account51_id,
            'default_account52_id' => $this->default_account52_id,
            'default_account53_id' => $this->default_account53_id,
            'default_account54_id' => $this->default_account54_id,
            'default_account55_id' => $this->default_account55_id,
            'default_account56_id' => $this->default_account56_id,
            'default_account57_id' => $this->default_account57_id,
            'default_account58_id' => $this->default_account58_id,
            'default_account59_id' => $this->default_account59_id,
            'default_account60_id' => $this->default_account60_id,
            'default_account61_id' => $this->default_account61_id,
            'default_account62_id' => $this->default_account62_id,
            'default_account63_id' => $this->default_account63_id,
            'default_account64_id' => $this->default_account64_id,
            'default_account65_id' => $this->default_account65_id,
            'default_account66_id' => $this->default_account66_id,
            'default_account67_id' => $this->default_account67_id,
            'id_p01' => $this->id_p01,
            'id_p02' => $this->id_p02,
            'id_p03' => $this->id_p03,
            'id_p04' => $this->id_p04,
            'id_p05' => $this->id_p05,
            'id_p06' => $this->id_p06,
            'id_p07' => $this->id_p07,
            'id_p08' => $this->id_p08,
            'id_p09' => $this->id_p09,
            'id_p10' => $this->id_p10,
            'valint01' => $this->valint01,
            'valint02' => $this->valint02,
            'valint03' => $this->valint03,
            'valint04' => $this->valint04,
            'valint05' => $this->valint05,
            'valint06' => $this->valint06,
            'valint07' => $this->valint07,
            'valint08' => $this->valint08,
            'valint09' => $this->valint09,
            'valint10' => $this->valint10,
            'valint11' => $this->valint11,
            'valint12' => $this->valint12,
            'valint13' => $this->valint13,
            'valint14' => $this->valint14,
            'bit01' => $this->bit01,
            'bit02' => $this->bit02,
            'bit03' => $this->bit03,
            'bit04' => $this->bit04,
            'bit05' => $this->bit05,
            'bit06' => $this->bit06,
        ]);

        $query->andFilterWhere(['like', 'name01', $this->name01])
            ->andFilterWhere(['like', 'name02', $this->name02]);

        return $dataProvider;
    }
}
