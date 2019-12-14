<?php
namespace app\modules\users\models\VML;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\modules\geo\models\SRL\GeoProvincesSRL;
use app\modules\geo\models\SRL\GeoCitiesSRL;
use app\modules\users\models\DAL\Users;
class UsersVML extends Model {
    public $id;
    public $fname;
    public $lname;
    public $email;
    public $cardmelli;
    public $avatar;
    public $codemelli;
    public $mobile;
    public $password_hash;
    public $province_id;
    public $city_id;
    public $codeposti;
    public $address;
    //public $group_id;
    //public $status_id;
    //public $username;
    //public $password_reset_token;
    //public $auth_key;
    //public $cardmelli_confirmed;
    //public $avatar_confirmed;
    //public $groups    = [];
    //public $statuses  = [];
    public $provinces = [];
    public $cities    = [];
    /**
     * @var Users
     */
    public $model;
    public function __construct($model = null, $config = array()) {
        if ($model == null) {
            $this->model    = new Users();
            $this->scenario = 'create';
        }
        else {
            $this->model       = $model;
            $this->id          = $model->id;
            $this->fname       = $model->fname;
            $this->lname       = $model->lname;
            $this->email       = $model->email;
            $this->cardmelli   = $model->cardmelli;
            $this->avatar      = $model->avatar;
            $this->codemelli   = $model->codemelli;
            $this->mobile      = $model->mobile;
            $this->province_id = $model->province_id;
            $this->city_id     = $model->city_id;
            $this->codeposti   = $model->codeposti;
            $this->address     = $model->address;
        }
        parent::__construct($config);
    }
    public function rules() {
        return [
                [['codemelli', 'mobile'], 'required'],
                [['password_hash'], 'required', 'on' => 'create'],
                [['province_id', 'city_id'], 'integer'],
                [['codemelli', 'codeposti'], 'string', 'max' => 10],
                [['email'], 'trim'],
                [['email'], 'email'],
                [['mobile'], 'string', 'max' => 11],
                [['mobile'], 'match', 'pattern' => '/^[0]{1}[9]{1}(0|1|2|3)\d{8}$/'],
                [['password_hash', 'fname', 'lname', 'address'], 'string', 'max' => 255],
                [['avatar', 'cardmelli'], 'file', 'extensions' => 'png, jpg, jpeg, gif']
        ];
    }
    public function attributeLabels() {
        return [
            'fname'         => Yii::t('users', 'Fname'),
            'lname'         => Yii::t('users', 'Lname'),
            'email'         => Yii::t('users', 'Email'),
            'cardmelli'     => Yii::t('users', 'Cardmelli'),
            'avatar'        => Yii::t('users', 'Avatar'),
            'codemelli'     => Yii::t('users', 'Codemelli'),
            'mobile'        => Yii::t('users', 'Mobile'),
            'password_hash' => Yii::t('users', 'Password Hash'),
            'province_id'   => Yii::t('users', 'Province ID'),
            'city_id'       => Yii::t('users', 'City ID'),
            'codeposti'     => Yii::t('users', 'Codeposti'),
            'address'       => Yii::t('users', 'Address'),
        ];
    }
    public function loadItems() {
        $this->provinces = GeoProvincesSRL::getItems();
        $this->cities    = GeoCitiesSRL::getItems(['province_id' => $this->province_id]);
    }
    /**
     * @param array $postData
     * @return bool
     */
    public function save($postData = []) {

        if (!$this->load($postData)) {
            return false;
        }

        $this->avatar    = UploadedFile::getInstance($this, 'avatar');
        $this->cardmelli = UploadedFile::getInstance($this, 'cardmelli');
        if (!$this->validate()) {
            return false;
        }

        $model = $this->model;

        $queryCodemelli = Users::find()->where(['codemelli' => $this->codemelli]);
        if (!$model->isNewRecord) {
            $queryCodemelli->andWhere(['<>', 'id', $model->id]);
        }
        $userCodemelli = $queryCodemelli->one();
        if ($userCodemelli !== null) {
            $this->addError('codemelli', 'کد ملی با مقدار "' . $this->codemelli . '" قبلا در سیستم ثبت شده.');
            return false;
        }

        $queryMobile = Users::find()->where(['mobile' => $this->mobile]);
        if (!$model->isNewRecord) {
            $queryMobile->andWhere(['<>', 'id', $model->id]);
        }
        $userMobile = $queryMobile->one();
        if ($userMobile !== null) {
            $this->addError('mobile', 'شماره تلفن همراه با مقدار "' . $this->mobile . '" قبلا در سیستم ثبت شده.');
            return false;
        }

        if ($model->isNewRecord) {
            $model->group_id             = 2;
            $model->status_id            = 1;
            $model->password_hash        = Yii::$app->security->generatePasswordHash($this->password_hash);
            $model->password_reset_token = null;
            $model->auth_key             = Yii::$app->security->generateRandomString();
            $model->cardmelli_confirmed  = false;
            $model->avatar_confirmed     = false;
        }
        else if ($this->password_hash) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
        }

        $model->username    = $this->mobile;
        $model->fname       = $this->fname;
        $model->lname       = $this->lname;
        $model->email       = $this->email;
        $model->codemelli   = $this->codemelli;
        $model->mobile      = $this->mobile;
        $model->province_id = $this->province_id;
        $model->city_id     = $this->city_id;
        $model->codeposti   = $this->codeposti;
        $model->address     = $this->address;

        if ($this->avatar) {
            $filename                = uniqid(time(), true) . '.' . $this->avatar->extension;
            $this->avatar->saveAs("uploads/users/avatar/$filename");
            $model->avatar           = $filename;
            $model->avatar_confirmed = true;
        }

        if ($this->cardmelli) {
            $filename                   = uniqid(time(), true) . '.' . $this->cardmelli->extension;
            $this->cardmelli->saveAs("uploads/users/cardmelli/$filename");
            $model->cardmelli           = $filename;
            $model->cardmelli_confirmed = true;
        }

        if (!$model->save()) {
            return false;
        }

        $this->id = $model->id;
        return true;
    }
}