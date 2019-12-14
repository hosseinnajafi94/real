<?php
namespace app\modules\geo\models\DAL;
use Yii;
use app\modules\users\models\DAL\Users;
/**
 * This is the model class for table "geo_provinces".
 * @author Hossein Najafi <hnajafi1994@gmail.com>
 *
 * @property int $id
 * @property string $title
 *
 * @property GeoCities[] $geoCities
 * @property Users[] $users
 */
class GeoProvinces extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'geo_provinces';
    }
    public function rules() {
        return [
                [['title'], 'required'],
                [['title'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels() {
        return [
            'id' => Yii::t('geo', 'ID'),
            'title' => Yii::t('geo', 'Title'),
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoCities() {
        return $this->hasMany(GeoCities::className(), ['province_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers() {
        return $this->hasMany(Users::className(), ['province_id' => 'id']);
    }
}