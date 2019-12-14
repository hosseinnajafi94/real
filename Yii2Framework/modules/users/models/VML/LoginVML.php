<?php
namespace app\modules\users\models\VML;
use Yii;
use yii\base\Model;
use app\modules\users\models\DAL\User;
class LoginVML extends Model {
    /**
     * @var string Mobile
     */
    public $mobile;
    /**
     * @var string Password
     */
    public $password;
    /**
     * @var captcha Captcha
     */
    public $captcha;
    /**
     * @var bool Remember Me
     */
    public $rememberMe = true;
    /**
     * @return array
     */
    public function rules() {
        return [
            [['mobile']    , 'required'],
            [['mobile']    , 'match', 'pattern' => '/^[0]{1}[9]{1}(0|1|2|3)\d{8}$/'],
            [['password']  , 'required'],
            [['password']  , 'string', 'min' => 8, 'max' => 255],
            [['captcha']   , 'captcha', 'captchaAction' => '/users/auth/captcha'],
            [['rememberMe'], 'boolean'],
        ];
    }
    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'mobile'     => Yii::t('users', 'Mobile'),
            'password'   => Yii::t('users', 'Password'),
            'captcha'    => Yii::t('users', 'Captcha'),
            'rememberMe' => Yii::t('users', 'Remember Me'),
        ];
    }
    /**
     * @return bool
     */
    public function login() {
        if (!$this->validate()) {
            return false;
        }
        $module = Yii::$app->getModule('users');
        $model  = User::findOne([
            'username' => $this->mobile,
            'status_id' => $module->params['status.Active']
        ]);
        if (!$model) {
            $this->addError('mobile', Yii::t('users', 'Incorrect Mobile.'));
            return false;
        }
        if (!Yii::$app->security->validatePassword($this->password, $model->password_hash)) {
            $this->addError('password', Yii::t('users', 'Incorrect Password.'));
            return false;
        }
        return Yii::$app->user->login($model, $this->rememberMe ? $module->params['rememberMeExpire'] : 0);
    }
}