<?php
namespace app\modules\correspondence\models\VML;
use Yii;
use yii\base\Model;
use app\modules\correspondence\models\DAL\MailsRefrences;
use app\modules\users\models\SRL\UsersSRL;
class MailsRefrencesVML extends Model {
    public $id;
    public $mail_id;
    public $user_id;
    public $description;
    //
    public $list_users = [];
    //
    public $mail;
    public $model;
    //

    public function rules() {
        return [
                [['mail_id', 'user_id'], 'required'],
                [['mail_id', 'user_id'], 'integer'],
                [['description'], 'string'],
        ];
    }
    public function attributeLabels() {
        return [
            'id'          => Yii::t('correspondence', 'ID'),
            'mail_id'     => Yii::t('correspondence', 'Mail ID'),
            'user_id'     => Yii::t('correspondence', 'User ID'),
            'description' => Yii::t('correspondence', 'Description'),
        ];
    }
    public static function newInstance($mail) {
        $data          = new static();
        $data->model   = new MailsRefrences();
        $data->mail    = $mail;
        $data->mail_id = $mail->id;
        return $data;
    }
    public function loaditems() {
        $this->list_users = UsersSRL::getItems();
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        if (!$this->validate()) {
            return false;
        }
        $model              = $this->model;
        $model->mail_id     = $this->mail_id;
        $model->user_id     = $this->user_id;
        $model->description = $this->description;
        if (!$model->save()) {
            return false;
        }
        
        $this->mail->model->status_id = 2;
        $this->mail->model->save();
        
        $this->id = $model->id;
        return true;
    }
}