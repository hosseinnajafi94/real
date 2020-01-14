<?php
namespace app\modules\correspondence\models\VML;
use Yii;
use yii\base\Model;
use app\modules\correspondence\models\DAL\Mails;
use app\modules\correspondence\models\DAL\MailsCopies;
use app\modules\correspondence\models\DAL\MailsSignatories;
use app\modules\correspondence\models\VML\MailsRefrencesVML;
use app\modules\correspondence\models\SRL\SecretariatsSRL;
use app\modules\correspondence\models\SRL\MailsListPatternsSRL;
use app\modules\correspondence\models\SRL\MailsListReceiverTypesSRL;
use app\modules\users\models\SRL\UsersSRL;
class MailsVML extends Model {
    public $id;
    public $type_id;
    public $secretariat_id;
    public $pattern_id;
    public $receiver_type_id;
    public $receiver1_id;
    public $receiver2_id;
    public $text;
    public $copies1            = [];
    public $copies2            = [];
    public $signatories        = [];
    //
    public $list_secretariats  = [];
    public $list_pattern       = [];
    public $list_receiver_type = [];
    public $list_receiver1     = [];
    public $list_receiver2     = [];
    public $list_copies        = [];
    public $list_signatories   = [];
    //
    public $model;
    //
    public function rules() {
        return [
            [['secretariat_id', 'pattern_id', 'text', 'receiver_type_id'], 'required'],
            [['secretariat_id', 'pattern_id', 'receiver_type_id', 'receiver1_id', 'receiver2_id'], 'integer'],
            [['text'], 'string'],
            [['copies1', 'copies2', 'signatories'], 'each', 'rule' => ['integer']]
        ];
    }
    public function attributeLabels() {
        return [
            'secretariat_id'   => Yii::t('correspondence', 'Secretariat ID'),
            'pattern_id'       => Yii::t('correspondence', 'Pattern ID'),
            'receiver_type_id' => Yii::t('correspondence', 'Receiver Type ID'),
            'receiver1_id'     => Yii::t('correspondence', 'Receiver1 ID'),
            'receiver2_id'     => Yii::t('correspondence', 'Receiver2 ID'),
            'copies1'          => Yii::t('correspondence', 'Copies1'),
            'copies2'          => Yii::t('correspondence', 'Copies2'),
            'signatories'      => Yii::t('correspondence', 'Signatories'),
            'text'             => Yii::t('correspondence', 'Text'),
        ];
    }
    public static function search($params) {
        $searchModel  = new MailsSearchVML();
        $dataProvider = $searchModel->search($params);
        return [$searchModel, $dataProvider];
    }
    public static function find($id) {
        $model = Mails::findOne($id);
        if ($model === null) {
            return null;
        }
        $data                   = new static();
        $data->model            = $model;
        $data->id               = $model->id;
        $data->type_id          = $model->type_id;
        $data->secretariat_id   = $model->secretariat_id;
        $data->pattern_id       = $model->pattern_id;
        $data->text             = $model->text;
        $data->receiver_type_id = $model->receiver_type_id;
        $data->receiver1_id     = $model->receiver1_id;
        $data->receiver2_id     = $model->receiver2_id;
        $copies = MailsCopies::find()->where(['mail_id' => $model->id])->orderBy(['id' => SORT_ASC])->all();
        foreach ($copies as $copy) {
            if ($copy->type_id == 1) {
                $data->copies1[] = $copy->user_id;
            }
            else {
                $data->copies2[] = $copy->user_id;
            }
        }
        $signatories = MailsSignatories::find()->where(['mail_id' => $model->id])->orderBy(['id' => SORT_ASC])->all();
        foreach ($signatories as $signatory) {
            $data->signatories[] = $signatory->user_id;
        }
        return $data;
    }
    public static function newInstance($type_id) {
        $data          = new static();
        $data->model   = new Mails();
        $data->type_id = $type_id;
        return $data;
    }
    public function loaditems() {
        $this->list_pattern       = MailsListPatternsSRL::getItems();
        $this->list_receiver_type = MailsListReceiverTypesSRL::getItems();
        $this->list_receiver1     = UsersSRL::getItems();
        $this->list_receiver2     = [];
        $this->list_copies        = $this->list_receiver1;
        $this->list_signatories   = $this->list_receiver1;
        $this->list_secretariats  = SecretariatsSRL::getItems();
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        if (!$this->validate()) {
            return false;
        }
        $model = $this->model;
        if ($model->isNewRecord) {
            $model->user_id   = Yii::$app->user->id;
            $model->type_id   = $this->type_id;
            $model->status_id = 1;
        }
        $model->secretariat_id   = $this->secretariat_id;
        $model->pattern_id       = $this->pattern_id;
        $model->receiver_type_id = $this->receiver_type_id;
        $model->receiver1_id     = $this->receiver1_id;
        $model->receiver2_id     = $this->receiver2_id;
        $model->text             = $this->text;
        if (!$model->save()) {
            return false;
        }
        $this->id = $model->id;
        MailsCopies::deleteAll(['mail_id' => $this->id]);
        MailsSignatories::deleteAll(['mail_id' => $this->id]);
        if (is_array($this->copies1)) {
            foreach ($this->copies1 as $copyId) {
                $row          = new MailsCopies();
                $row->mail_id = $this->id;
                $row->type_id = 1;
                $row->user_id = $copyId;
                $row->save();
            }
        }
        if (is_array($this->copies2)) {
            foreach ($this->copies2 as $copyId) {
                $row          = new MailsCopies();
                $row->mail_id = $this->id;
                $row->type_id = 2;
                $row->user_id = $copyId;
                $row->save();
            }
        }
        if (is_array($this->signatories)) {
            foreach ($this->signatories as $id) {
                $row          = new MailsSignatories();
                $row->mail_id = $this->id;
                $row->user_id = $id;
                $row->save();
            }
        }
        return true;
    }
    public static function findReference($id) {
        $data = static::find($id);
        if ($data == null) {
            return null;
        }
        $row = MailsRefrencesVML::newInstance($data);
        return $row;
    }
}