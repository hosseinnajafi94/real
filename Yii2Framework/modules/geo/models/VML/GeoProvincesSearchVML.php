<?php
namespace app\modules\geo\models\VML;
use Yii;
use yii\base\Model;
class GeoProvincesSearchVML extends Model {
    public $title;
    public function rules() {
        return [
                [['title'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels() {
        return [
            'title' => Yii::t('geo', 'Title'),
        ];
    }
}