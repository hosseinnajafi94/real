<?php
namespace app\modules\geo\models\VML;
use Yii;
use yii\base\Model;
class GeoCitiesSearchVML extends Model {
    public $province_id;
    public $title;
    public $provinces = [];
    public function rules() {
        return [
                [['province_id'], 'integer'],
                [['title'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels() {
        return [
            'province_id' => Yii::t('geo', 'Province ID'),
            'title' => Yii::t('geo', 'Title'),
        ];
    }
}