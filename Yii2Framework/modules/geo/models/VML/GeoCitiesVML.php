<?php
namespace app\modules\geo\models\VML;
use Yii;
use yii\base\Model;
class GeoCitiesVML extends Model {
    public $id;
    public $province_id;
    public $title;
    public $provinces = [];
    private $_model;
    public function rules() {
        return [
                [['province_id', 'title'], 'required'],
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
    public function setModel($model) {
        $this->_model = $model;
    }
    public function getModel() {
        return $this->_model;
    }
}