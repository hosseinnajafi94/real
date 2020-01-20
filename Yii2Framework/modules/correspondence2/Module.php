<?php
namespace app\modules\correspondence;
use Yii;
class Module extends \yii\base\Module {
    public $controllerNamespace = 'app\modules\correspondence\controllers';
    public function init() {
        parent::init();
        Yii::configure($this, require 'config.php');
    }
}