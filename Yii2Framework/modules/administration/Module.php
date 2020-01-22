<?php
namespace app\modules\administration;
use Yii;
class Module extends \yii\base\Module {
    public $controllerNamespace = 'app\modules\administration\controllers';
    public function init() {
        parent::init();
        Yii::configure($this, require 'config.php');
    }
}