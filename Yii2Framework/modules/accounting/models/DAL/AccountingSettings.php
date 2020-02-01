<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_settings".
 *
 * @property int $id
 * @property int|null $default_account01_id
 * @property int|null $default_account02_id
 * @property int|null $default_account03_id
 * @property int|null $default_account04_id
 * @property int|null $default_account05_id
 * @property int|null $default_account06_id
 * @property int|null $default_account07_id
 * @property int|null $default_account08_id
 * @property int|null $default_account09_id
 * @property int|null $default_account10_id
 * @property int|null $default_account11_id
 * @property int|null $default_account12_id
 * @property int|null $default_account13_id
 * @property int|null $default_account14_id
 * @property int|null $default_account15_id
 * @property int|null $default_account16_id
 * @property int|null $default_account17_id
 * @property int|null $default_account18_id
 * @property int|null $default_account19_id
 * @property int|null $default_account20_id
 * @property int|null $default_account21_id
 * @property int|null $default_account22_id
 * @property int|null $default_account23_id
 * @property int|null $default_account24_id
 * @property int|null $default_account25_id
 * @property int|null $default_account26_id
 * @property int|null $default_account27_id
 * @property int|null $default_account28_id
 * @property int|null $default_account29_id
 * @property int|null $default_account30_id
 * @property int|null $default_account31_id
 * @property int|null $default_account32_id
 * @property int|null $default_account33_id
 * @property int|null $default_account34_id
 * @property int|null $default_account35_id
 * @property int|null $default_account36_id
 * @property int|null $default_account37_id
 * @property int|null $default_account38_id
 * @property int|null $default_account39_id
 * @property int|null $default_account40_id
 * @property int|null $default_account41_id
 * @property int|null $default_account42_id
 * @property int|null $default_account43_id
 * @property int|null $default_account44_id
 * @property int|null $default_account45_id
 * @property int|null $default_account46_id
 * @property int|null $default_account47_id
 * @property int|null $default_account48_id
 * @property int|null $default_account49_id
 * @property int|null $default_account50_id
 * @property int|null $default_account51_id
 * @property int|null $default_account52_id
 * @property int|null $default_account53_id
 * @property int|null $default_account54_id
 * @property int|null $default_account55_id
 * @property int|null $default_account56_id
 * @property int|null $default_account57_id
 * @property int|null $default_account58_id
 * @property int|null $default_account59_id
 * @property int|null $default_account60_id
 * @property int|null $default_account61_id
 * @property int|null $default_account62_id
 * @property int|null $default_account63_id
 * @property int|null $default_account64_id
 * @property int|null $default_account65_id
 * @property int|null $default_account66_id
 * @property int|null $default_account67_id
 * @property int|null $id_p01
 * @property int|null $id_p02
 * @property int|null $id_p03
 * @property int|null $id_p04
 * @property int|null $id_p05
 * @property int|null $id_p06
 * @property int|null $id_p07
 * @property int|null $id_p08
 * @property int|null $id_p09
 * @property int|null $id_p10
 * @property int|null $id_p11
 * @property int|null $id_p12
 * @property int|null $valint01
 * @property int|null $valint02
 * @property int|null $valint03
 * @property int|null $valint04
 * @property int|null $valint05
 * @property int|null $valint06
 * @property int|null $valint07
 * @property int|null $valint08
 * @property int|null $valint09
 * @property int|null $valint10
 * @property int|null $valint11
 * @property int|null $valint12
 * @property int|null $valint13
 * @property int|null $valint14
 * @property bool|null $bit01
 * @property bool|null $bit02
 * @property bool|null $bit03
 * @property bool|null $bit04
 * @property bool|null $bit05
 * @property bool|null $bit06
 * @property string|null $name01
 * @property string|null $name02
 */
class AccountingSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['default_account01_id', 'default_account02_id', 'default_account03_id', 'default_account04_id', 'default_account05_id', 'default_account06_id', 'default_account07_id', 'default_account08_id', 'default_account09_id', 'default_account10_id', 'default_account11_id', 'default_account12_id', 'default_account13_id', 'default_account14_id', 'default_account15_id', 'default_account16_id', 'default_account17_id', 'default_account18_id', 'default_account19_id', 'default_account20_id', 'default_account21_id', 'default_account22_id', 'default_account23_id', 'default_account24_id', 'default_account25_id', 'default_account26_id', 'default_account27_id', 'default_account28_id', 'default_account29_id', 'default_account30_id', 'default_account31_id', 'default_account32_id', 'default_account33_id', 'default_account34_id', 'default_account35_id', 'default_account36_id', 'default_account37_id', 'default_account38_id', 'default_account39_id', 'default_account40_id', 'default_account41_id', 'default_account42_id', 'default_account43_id', 'default_account44_id', 'default_account45_id', 'default_account46_id', 'default_account47_id', 'default_account48_id', 'default_account49_id', 'default_account50_id', 'default_account51_id', 'default_account52_id', 'default_account53_id', 'default_account54_id', 'default_account55_id', 'default_account56_id', 'default_account57_id', 'default_account58_id', 'default_account59_id', 'default_account60_id', 'default_account61_id', 'default_account62_id', 'default_account63_id', 'default_account64_id', 'default_account65_id', 'default_account66_id', 'default_account67_id', 'id_p01', 'id_p02', 'id_p03', 'id_p04', 'id_p05', 'id_p06', 'id_p07', 'id_p08', 'id_p09', 'id_p10', 'id_p11', 'id_p12', 'valint01', 'valint02', 'valint03', 'valint04', 'valint05', 'valint06', 'valint07', 'valint08', 'valint09', 'valint10', 'valint11', 'valint12', 'valint13', 'valint14'], 'integer'],
            [['bit01', 'bit02', 'bit03', 'bit04', 'bit05', 'bit06'], 'boolean'],
            [['name01', 'name02'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('accounting', 'ID'),
            'default_account01_id' => Yii::t('accounting', 'Default Account01 ID'),
            'default_account02_id' => Yii::t('accounting', 'Default Account02 ID'),
            'default_account03_id' => Yii::t('accounting', 'Default Account03 ID'),
            'default_account04_id' => Yii::t('accounting', 'Default Account04 ID'),
            'default_account05_id' => Yii::t('accounting', 'Default Account05 ID'),
            'default_account06_id' => Yii::t('accounting', 'Default Account06 ID'),
            'default_account07_id' => Yii::t('accounting', 'Default Account07 ID'),
            'default_account08_id' => Yii::t('accounting', 'Default Account08 ID'),
            'default_account09_id' => Yii::t('accounting', 'Default Account09 ID'),
            'default_account10_id' => Yii::t('accounting', 'Default Account10 ID'),
            'default_account11_id' => Yii::t('accounting', 'Default Account11 ID'),
            'default_account12_id' => Yii::t('accounting', 'Default Account12 ID'),
            'default_account13_id' => Yii::t('accounting', 'Default Account13 ID'),
            'default_account14_id' => Yii::t('accounting', 'Default Account14 ID'),
            'default_account15_id' => Yii::t('accounting', 'Default Account15 ID'),
            'default_account16_id' => Yii::t('accounting', 'Default Account16 ID'),
            'default_account17_id' => Yii::t('accounting', 'Default Account17 ID'),
            'default_account18_id' => Yii::t('accounting', 'Default Account18 ID'),
            'default_account19_id' => Yii::t('accounting', 'Default Account19 ID'),
            'default_account20_id' => Yii::t('accounting', 'Default Account20 ID'),
            'default_account21_id' => Yii::t('accounting', 'Default Account21 ID'),
            'default_account22_id' => Yii::t('accounting', 'Default Account22 ID'),
            'default_account23_id' => Yii::t('accounting', 'Default Account23 ID'),
            'default_account24_id' => Yii::t('accounting', 'Default Account24 ID'),
            'default_account25_id' => Yii::t('accounting', 'Default Account25 ID'),
            'default_account26_id' => Yii::t('accounting', 'Default Account26 ID'),
            'default_account27_id' => Yii::t('accounting', 'Default Account27 ID'),
            'default_account28_id' => Yii::t('accounting', 'Default Account28 ID'),
            'default_account29_id' => Yii::t('accounting', 'Default Account29 ID'),
            'default_account30_id' => Yii::t('accounting', 'Default Account30 ID'),
            'default_account31_id' => Yii::t('accounting', 'Default Account31 ID'),
            'default_account32_id' => Yii::t('accounting', 'Default Account32 ID'),
            'default_account33_id' => Yii::t('accounting', 'Default Account33 ID'),
            'default_account34_id' => Yii::t('accounting', 'Default Account34 ID'),
            'default_account35_id' => Yii::t('accounting', 'Default Account35 ID'),
            'default_account36_id' => Yii::t('accounting', 'Default Account36 ID'),
            'default_account37_id' => Yii::t('accounting', 'Default Account37 ID'),
            'default_account38_id' => Yii::t('accounting', 'Default Account38 ID'),
            'default_account39_id' => Yii::t('accounting', 'Default Account39 ID'),
            'default_account40_id' => Yii::t('accounting', 'Default Account40 ID'),
            'default_account41_id' => Yii::t('accounting', 'Default Account41 ID'),
            'default_account42_id' => Yii::t('accounting', 'Default Account42 ID'),
            'default_account43_id' => Yii::t('accounting', 'Default Account43 ID'),
            'default_account44_id' => Yii::t('accounting', 'Default Account44 ID'),
            'default_account45_id' => Yii::t('accounting', 'Default Account45 ID'),
            'default_account46_id' => Yii::t('accounting', 'Default Account46 ID'),
            'default_account47_id' => Yii::t('accounting', 'Default Account47 ID'),
            'default_account48_id' => Yii::t('accounting', 'Default Account48 ID'),
            'default_account49_id' => Yii::t('accounting', 'Default Account49 ID'),
            'default_account50_id' => Yii::t('accounting', 'Default Account50 ID'),
            'default_account51_id' => Yii::t('accounting', 'Default Account51 ID'),
            'default_account52_id' => Yii::t('accounting', 'Default Account52 ID'),
            'default_account53_id' => Yii::t('accounting', 'Default Account53 ID'),
            'default_account54_id' => Yii::t('accounting', 'Default Account54 ID'),
            'default_account55_id' => Yii::t('accounting', 'Default Account55 ID'),
            'default_account56_id' => Yii::t('accounting', 'Default Account56 ID'),
            'default_account57_id' => Yii::t('accounting', 'Default Account57 ID'),
            'default_account58_id' => Yii::t('accounting', 'Default Account58 ID'),
            'default_account59_id' => Yii::t('accounting', 'Default Account59 ID'),
            'default_account60_id' => Yii::t('accounting', 'Default Account60 ID'),
            'default_account61_id' => Yii::t('accounting', 'Default Account61 ID'),
            'default_account62_id' => Yii::t('accounting', 'Default Account62 ID'),
            'default_account63_id' => Yii::t('accounting', 'Default Account63 ID'),
            'default_account64_id' => Yii::t('accounting', 'Default Account64 ID'),
            'default_account65_id' => Yii::t('accounting', 'Default Account65 ID'),
            'default_account66_id' => Yii::t('accounting', 'Default Account66 ID'),
            'default_account67_id' => Yii::t('accounting', 'Default Account67 ID'),
            'id_p01' => Yii::t('accounting', 'Id P01'),
            'id_p02' => Yii::t('accounting', 'Id P02'),
            'id_p03' => Yii::t('accounting', 'Id P03'),
            'id_p04' => Yii::t('accounting', 'Id P04'),
            'id_p05' => Yii::t('accounting', 'Id P05'),
            'id_p06' => Yii::t('accounting', 'Id P06'),
            'id_p07' => Yii::t('accounting', 'Id P07'),
            'id_p08' => Yii::t('accounting', 'Id P08'),
            'id_p09' => Yii::t('accounting', 'Id P09'),
            'id_p10' => Yii::t('accounting', 'Id P10'),
            'id_p11' => Yii::t('accounting', 'Id P11'),
            'id_p12' => Yii::t('accounting', 'Id P12'),
            'valint01' => Yii::t('accounting', 'Valint01'),
            'valint02' => Yii::t('accounting', 'Valint02'),
            'valint03' => Yii::t('accounting', 'Valint03'),
            'valint04' => Yii::t('accounting', 'Valint04'),
            'valint05' => Yii::t('accounting', 'Valint05'),
            'valint06' => Yii::t('accounting', 'Valint06'),
            'valint07' => Yii::t('accounting', 'Valint07'),
            'valint08' => Yii::t('accounting', 'Valint08'),
            'valint09' => Yii::t('accounting', 'Valint09'),
            'valint10' => Yii::t('accounting', 'Valint10'),
            'valint11' => Yii::t('accounting', 'Valint11'),
            'valint12' => Yii::t('accounting', 'Valint12'),
            'valint13' => Yii::t('accounting', 'Valint13'),
            'valint14' => Yii::t('accounting', 'Valint14'),
            'bit01' => Yii::t('accounting', 'Bit01'),
            'bit02' => Yii::t('accounting', 'Bit02'),
            'bit03' => Yii::t('accounting', 'Bit03'),
            'bit04' => Yii::t('accounting', 'Bit04'),
            'bit05' => Yii::t('accounting', 'Bit05'),
            'bit06' => Yii::t('accounting', 'Bit06'),
            'name01' => Yii::t('accounting', 'Name01'),
            'name02' => Yii::t('accounting', 'Name02'),
        ];
    }
}
