<?php
namespace app\modules\correspondence\models\VML;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\modules\correspondence\models\DAL\MailsListPatterns;
use app\modules\correspondence\models\SRL\MailsListSizesSRL;
use app\modules\correspondence\models\VML\MailsListPatternsSearchVML;
class PatternsVML extends Model {
    public $id;
    public $title;
    public $size_id;
    public $sign_count;
    public $file;
    //
    public $list_size = [];
    //
    public $model;
    //
    public static function search($params) {
        $searchModel  = new MailsListPatternsSearchVML();
        $dataProvider = $searchModel->search($params);
        return [$searchModel, $dataProvider];
    }
    public function rules() {
        return [
                [['title', 'size_id', 'sign_count'], 'required'],
                [['file'], 'required', 'on' => 'create'],
                [['size_id', 'sign_count'], 'integer'],
                [['title'], 'string', 'max' => 255],
                [['file'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }
    public function attributeLabels() {
        return [
            'id'         => Yii::t('correspondence', 'ID'),
            'title'      => Yii::t('correspondence', 'Title'),
            'size_id'    => Yii::t('correspondence', 'Size ID'),
            'sign_count' => Yii::t('correspondence', 'Sign Count'),
            'file'       => Yii::t('correspondence', 'File'),
        ];
    }
    public function loaditems() {
        $this->list_size = MailsListSizesSRL::getItems();
    }
    public static function newInstance() {
        $data           = new static();
        $data->scenario = 'create';
        $data->model    = new MailsListPatterns();
        return $data;
    }
    public static function find($id) {
        $model = MailsListPatterns::findOne($id);
        if ($model === null) {
            return null;
        }
        $data             = new static();
        $data->model      = $model;
        $data->id         = $model->id;
        $data->title      = $model->title;
        $data->size_id    = $model->size_id;
        $data->sign_count = $model->sign_count;
        $data->file       = $model->file;
        return $data;
    }
    public function save($post) {
        $oldFile = $this->file;
        if (!$this->load($post)) {
            return false;
        }
        $this->file = UploadedFile::getInstance($this, 'file');
        if (!$this->validate()) {
            return false;
        }
        if ($this->file) {
            $filename   = uniqid(time(), true) . '.' . $this->file->extension;
            $this->file->saveAs("uploads/patterns/$filename");
            $this->file = $filename;
        }
        else {
            $this->file = $oldFile;
        }
        $model             = $this->model;
        $model->title      = $this->title;
        $model->size_id    = $this->size_id;
        $model->sign_count = $this->sign_count;
        $model->file       = $this->file;
        if (!$model->save()) {
            return false;
        }
        $this->id = $model->id;
        return true;
    }
}