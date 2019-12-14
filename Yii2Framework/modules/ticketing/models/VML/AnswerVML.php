<?php
namespace app\modules\ticketing\models\VML;
use Yii;
use yii\base\Model;
class AnswerVML extends Model {
    public $message;
    public $file;
    public $file2 = [];
    private $_model;
    public function rules() {
        return [
                [['message'], 'required'],
                [['message'], 'string'],
                [['file'], 'file', 'skipOnEmpty' => true, 'maxSize' => 1024 * 1024 * 100, 'extensions' => 'zip, png, jpg, jpeg, mp4, mp3'],
                [['file2'], 'each', 'rule' => ['string']],
        ];
    }
    public function attributeLabels() {
        return [
            'message' => Yii::t('ticketing', 'Message'),
            'file' => Yii::t('ticketing', 'File'),
        ];
    }
    public function attributeHints() {
        return [
            'file' => 'حداکثر حجم مجاز 100MB, پسوند مجاز zip, png, jpg, jpeg, mp4, mp3',
        ];
    }
    public function setModel($model) {
        $this->_model = $model;
    }
    public function getModel() {
        return $this->_model;
    }
}