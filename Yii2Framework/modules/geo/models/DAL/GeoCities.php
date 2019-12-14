<?php
namespace app\modules\geo\models\DAL;
use Yii;
use app\modules\users\models\DAL\Users;
/**
 * This is the model class for table "geo_cities".
 * @author Hossein Najafi <hnajafi1994@gmail.com>
 *
 * @property int $id
 * @property int $province_id
 * @property string $title
 *
 * @property GeoProvinces $province
 * @property Users[] $users
 */
class GeoCities extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'geo_cities';
    }
    public function rules() {
        return [
                [['province_id', 'title'], 'required'],
                [['province_id'], 'integer'],
                [['title'], 'string', 'max' => 255],
                [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoProvinces::className(), 'targetAttribute' => ['province_id' => 'id']],
        ];
    }
    public function attributeLabels() {
        return [
            'id' => Yii::t('geo', 'ID'),
            'province_id' => Yii::t('geo', 'Province ID'),
            'title' => Yii::t('geo', 'Title'),
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince() {
        return $this->hasOne(GeoProvinces::className(), ['id' => 'province_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers() {
        return $this->hasMany(Users::className(), ['city_id' => 'id']);
    }
}