<?php
namespace app\modules\calendars;
use Yii;
class Module extends \yii\base\Module {
    public $controllerNamespace = 'app\modules\calendars\controllers';
    public function init() {
        parent::init();
        Yii::configure($this, require 'config.php');
    }
}