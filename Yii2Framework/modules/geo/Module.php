<?php
namespace app\modules\geo;
use Yii;
class Module extends \yii\base\Module {
    public $controllerNamespace = 'app\modules\geo\controllers';
    public function init() {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config.php');
    }
}