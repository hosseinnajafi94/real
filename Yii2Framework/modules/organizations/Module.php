<?php
namespace app\modules\organizations;
use Yii;
class Module extends \yii\base\Module {
    public $controllerNamespace = 'app\modules\organizations\controllers';
    public function init() {
        parent::init();
        Yii::configure($this, require 'config.php');
    }
}