<?php

namespace app\modules\administration\models\DAL;

use Yii;

/**
 * This is the model class for table "geo_contries".
 *
 * @property int $id
 * @property string $title
 *
 * @property Geoip[] $geoips
 */
class GeoContries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'geo_contries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('administration', 'ID'),
            'title' => Yii::t('administration', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoips()
    {
        return $this->hasMany(Geoip::className(), ['country_id' => 'id']);
    }
}
