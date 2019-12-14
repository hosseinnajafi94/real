<?php
namespace app\modules\users\models\VML;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\modules\users\models\DAL\Users;
use app\modules\geo\models\SRL\GeoProvincesSRL;
use app\modules\geo\models\SRL\GeoCitiesSRL;
class ProfileVML extends Model {
    public $fname;
    public $lname;
    public $email;
    public $province_id;
    public $city_id;
    public $codeposti;
    public $address;
    public $cardmelli;
    public $avatar;
    public $provinces = [];
    public $cities    = [];
    /**
     * @var Users Users Model
     */
    public $model;
    /**
     * @return array
     */
    public function rules() {
        return [
                [['province_id', 'city_id'], 'integer'],
                [['codeposti'], 'string', 'max' => 10],
                [['email'], 'trim'],
                [['email'], 'email'],
                [['fname', 'lname', 'address'], 'string', 'max' => 255],
                [['avatar', 'cardmelli'], 'file', 'extensions' => 'png, jpg, jpeg, gif']
        ];
    }
    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'fname'       => Yii::t('users', 'Fname'),
            'lname'       => Yii::t('users', 'Lname'),
            'email'       => Yii::t('users', 'Email'),
            'province_id' => Yii::t('users', 'Province ID'),
            'city_id'     => Yii::t('users', 'City ID'),
            'codeposti'   => Yii::t('users', 'Codeposti'),
            'address'     => Yii::t('users', 'Address'),
            'cardmelli'   => Yii::t('users', 'Cardmelli'),
            'avatar'      => Yii::t('users', 'Avatar'),
        ];
    }
    /**
     * @param int $id User ID
     * @return self
     */
    public static function find($id) {
        $module = Yii::$app->getModule('users');
        $model  = Users::findOne(['id' => $id, 'status_id' => $module->params['status.Active']]);
        if ($model === null) {
            return null;
        }
        $data              = new static;
        $data->model       = $model;
        $data->fname       = $model->fname;
        $data->lname       = $model->lname;
        $data->email       = $model->email;
        $data->province_id = $model->province_id;
        $data->city_id     = $model->city_id;
        $data->codeposti   = $model->codeposti;
        $data->address     = $model->address;
        $data->cardmelli   = $model->cardmelli;
        $data->avatar      = $model->avatar;
        return $data;
    }
    /**
     * 
     */
    public function loadItems() {
        $this->provinces = GeoProvincesSRL::getItems();
        $this->cities = GeoCitiesSRL::getItems(['province_id' => $this->province_id]);
    }
    /**
     * @param array $postData Post Data
     * @return bool
     */
    public function save($postData = []) {
        if (!$this->load($postData)) {
            return false;
        }
        $this->cardmelli = UploadedFile::getInstance($this, 'cardmelli');
        $this->avatar    = UploadedFile::getInstance($this, 'avatar');
        if (!$this->validate()) {
            return false;
        }
        $model             = $this->model;
        $model->fname       = $this->fname;
        $model->lname       = $this->lname;
        $model->email       = $this->email;
        $model->province_id = $this->province_id;
        $model->city_id     = $this->city_id;
        $model->codeposti   = $this->codeposti;
        $model->address     = $this->address;
        if ($this->cardmelli) {
            $filename = uniqid(time(), true) . '.' . $this->cardmelli->extension;
            $this->cardmelli->saveAs("uploads/users/cardmelli/$filename");
            $model->cardmelli           = $filename;
            $model->cardmelli_confirmed = false;
        }
        if ($this->avatar) {
            $filename = uniqid(time(), true) . '.' . $this->avatar->extension;
            $this->avatar->saveAs("uploads/users/avatar/$filename");
            $model->avatar           = $filename;
            $model->avatar_confirmed = false;
        }
        $saved = $model->save();
        if (!$saved) {
            return false;
        }
        return true;
    }
}