<?php
namespace app\modules\users\models\VML;
use Yii;
use yii\base\Model;
use app\modules\users\models\DAL\Users;
class ChangePasswordVML extends Model {
    /**
     * @var string Old Password
     */
    public $old_password;
    /**
     * @var string New Password
     */
    public $new_password;
    /**
     * @var string New Password Repeat
     */
    public $new_password_repeat;
    /**
     * @var Users Users Model
     */
    public $model;
    /**
     * @return array
     */
    public function rules() {
        return [
            [['old_password', 'new_password', 'new_password_repeat'], 'required'],
            [['old_password', 'new_password', 'new_password_repeat'], 'string', 'min' => 8, 'max' => 255],
            [['new_password_repeat'], 'compare', 'compareAttribute' => 'new_password', 'operator' => '=='],
        ];
    }
    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'old_password'        => Yii::t('users', 'Old Password'),
            'new_password'        => Yii::t('users', 'New Password'),
            'new_password_repeat' => Yii::t('users', 'New Password Repeat'),
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
        $data        = new static;
        $data->model = $model;
        return $data;
    }
    /**
     * @param array $postData Post Data
     * @return bool
     */
    public function save($postData = []) {
        if (!$this->load($postData) || !$this->validate()) {
            return false;
        }
        $model = $this->model;
        if (!Yii::$app->security->validatePassword($this->old_password, $model->password_hash)) {
            $this->addError('old_password', Yii::t('users', 'The old password is wrong!'));
            return false;
        }
        $model->password_hash = Yii::$app->security->generatePasswordHash($this->new_password);
        return $model->save();
    }
}