<?php
namespace app\modules\ticketing\models\VML;
use Yii;
use yii\base\Model;
class TicketsVML extends Model {
    public $id;
    public $title;
    public $receiver_id;
    public $support_id;
    public $category_id;
    public $message;
    public $file;
    public $file2 = [];
    public $types = [];
    public $receivers = [];
    public $supports = [];
    public $categories = [];
    public $user;
    private $_model;
    public function rules() {
        return [
                [['title', 'support_id', 'category_id', 'message'], 'required'],
                [['receiver_id'], 'required', 'when' => function ($model) {
                    return $model->user->group_id == 1000;
                }, 'whenClient' => 'function (attribute) {
                    return ' . ($this->user->group_id == 1000 ? 'false' : 'false') . ';
                }'],
                [['receiver_id', 'support_id', 'category_id'], 'integer'],
                [['title'], 'string', 'max' => 255],
                [['message'], 'string'],
                [['file'], 'file', 'skipOnEmpty' => true, 'maxSize' => 1024 * 1024 * 100, 'extensions' => 'zip, png, jpg, jpeg, mp4, mp3'],
                [['file2'], 'each', 'rule' => ['string']],
        ];
    }
    public function attributeLabels() {
        return [
            'title' => Yii::t('ticketing', 'Title'),
            'receiver_id' => Yii::t('ticketing', 'Receiver ID'),
            'support_id' => Yii::t('ticketing', 'Support ID'),
            'category_id' => Yii::t('ticketing', 'Category ID'),
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