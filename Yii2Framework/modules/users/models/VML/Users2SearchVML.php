<?php
namespace app\modules\users\models\VML;
use Yii;
use yii\base\Model;
class UsersSearchVML extends Model {
    public $group_id;
    public $status_id;
    public $codemelli;
    public $mobile;
    public $username;
    public $password_hash;
    public $password_reset_token;
    public $auth_key;
    public $avatar;
    public $email;
    public $fname;
    public $lname;
    public $province_id;
    public $city_id;
    public $codeposti;
    public $address;
    public $cardmelli;
    public $cardmelli_confirmed;
    public $avatar_confirmed;
    public $groups = [];
    public $statuses = [];
    public $provinces = [];
    public $cities = [];
    public function rules() {
        return [
                [['group_id', 'status_id', 'province_id', 'city_id'], 'integer'],
                [['codemelli', 'mobile', 'username', 'password_hash', 'password_reset_token', 'auth_key', 'avatar', 'email', 'fname', 'lname', 'codeposti', 'address', 'cardmelli'], 'string', 'max' => 255],
                [['cardmelli_confirmed', 'avatar_confirmed'], 'boolean'],
        ];
    }
    public function attributeLabels() {
        return [
            'group_id' => Yii::t('users', 'Group ID'),
            'status_id' => Yii::t('users', 'Status ID'),
            'codemelli' => Yii::t('users', 'Codemelli'),
            'mobile' => Yii::t('users', 'Mobile'),
            'username' => Yii::t('users', 'Username'),
            'password_hash' => Yii::t('users', 'Password Hash'),
            'password_reset_token' => Yii::t('users', 'Password Reset Token'),
            'auth_key' => Yii::t('users', 'Auth Key'),
            'avatar' => Yii::t('users', 'Avatar'),
            'email' => Yii::t('users', 'Email'),
            'fname' => Yii::t('users', 'Fname'),
            'lname' => Yii::t('users', 'Lname'),
            'province_id' => Yii::t('users', 'Province ID'),
            'city_id' => Yii::t('users', 'City ID'),
            'codeposti' => Yii::t('users', 'Codeposti'),
            'address' => Yii::t('users', 'Address'),
            'cardmelli' => Yii::t('users', 'Cardmelli'),
            'cardmelli_confirmed' => Yii::t('users', 'Cardmelli Confirmed'),
            'avatar_confirmed' => Yii::t('users', 'Avatar Confirmed'),
        ];
    }
}