<?php

namespace app\modules\correspondence\models\VML;

use Yii;
use yii\base\Model;
use app\modules\users\models\SRL\UsersSRL;
use app\modules\correspondence\models\DAL\Secretariats;
use app\modules\correspondence\models\DAL\SecretariatsMembers;
use app\modules\correspondence\models\DAL\SecretariatsSignatories;

class SecretariatsVML extends Model {

    public $id;
    public $name;
    public $section_1;
    public $section_2;
    public $splitter_1;
    public $splitter_2;
    public $members = [];
    public $signatories = [];
    public $list_users = [];
    //
    public $model;

    //
    public static function search($params) {
        $searchModel = new SecretariatsSearchVML();
        $dataProvider = $searchModel->search($params);
        return [$searchModel, $dataProvider];
    }

    public function rules() {
        return [
                [['name', 'section_1', 'section_2', 'splitter_1', 'splitter_2'], 'required'],
                [['section_1', 'section_2'], 'integer'],
                [['name', 'splitter_1', 'splitter_2'], 'string', 'max' => 255],
                [['members', 'signatories'], 'each', 'rule' => ['integer']],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('correspondence', 'ID'),
            'name' => Yii::t('correspondence', 'Secretariat Name'),
            'section_1' => Yii::t('correspondence', 'Section 1'),
            'section_2' => Yii::t('correspondence', 'Section 2'),
            'splitter_1' => Yii::t('correspondence', 'Splitter 1'),
            'splitter_2' => Yii::t('correspondence', 'Splitter 2'),
            'members' => Yii::t('correspondence', 'Members'),
            'signatories' => Yii::t('correspondence', 'Signatories'),
        ];
    }

    public function loaditems() {
        $this->list_users = UsersSRL::getItems();
    }

    public static function newInstance() {
        $data = new static();
        $data->model = new Secretariats();
        return $data;
    }

    public static function find($id) {
        $model = Secretariats::findOne($id);
        if ($model === null) {
            return null;
        }
        $data = new static();
        $data->model = $model;
        $data->id = $model->id;
        $data->name = $model->name;
        $data->section_1 = $model->section_1;
        $data->section_2 = $model->section_2;
        $data->splitter_1 = $model->splitter_1;
        $data->splitter_2 = $model->splitter_2;

        $data->members = [];
        $members = $model->getSecretariatsMembers()->all();
        foreach ($members as $member) {
            $data->members[] = $member->user_id;
        }

        $data->signatories = [];
        $signatories = $model->getSecretariatsSignatories()->all();
        foreach ($signatories as $signatory) {
            $data->signatories[] = $signatory->user_id;
        }

        return $data;
    }

    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        if (!$this->validate()) {
            return false;
        }
        $model = $this->model;
        $model->name = $this->name;
        $model->section_1 = $this->section_1;
        $model->section_2 = $this->section_2;
        $model->splitter_1 = $this->splitter_1;
        $model->splitter_2 = $this->splitter_2;
        if (!$model->save()) {
            return false;
        }
        $this->id = $model->id;

        SecretariatsMembers::deleteAll(['secretariat_id' => $model->id]);
        if (is_array($this->members) && !empty($this->members)) {
            foreach ($this->members as $userId) {
                $row = new SecretariatsMembers();
                $row->secretariat_id = $model->id;
                $row->user_id = $userId;
                $row->save();
            }
        }

        SecretariatsSignatories::deleteAll(['secretariat_id' => $model->id]);
        if (is_array($this->signatories) && !empty($this->signatories)) {
            foreach ($this->signatories as $userId) {
                $row = new SecretariatsSignatories();
                $row->secretariat_id = $model->id;
                $row->user_id = $userId;
                $row->save();
            }
        }

        return true;
    }

}
