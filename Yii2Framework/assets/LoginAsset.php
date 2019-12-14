<?php
namespace app\assets;
use yii\web\AssetBundle;
class LoginAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl  = '@web';
    public $css      = [
        'themes/admin/css/app.css'
    ];
    public $js       = [
    ];
    public $depends  = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}