<?php
// comment out the following two lines when deployed to production
define('YII_DEBUG', true);
define('YII_ENV', 'dev');

require 'functions.php';
require 'Yii2Framework/vendor/autoload.php';
require 'Yii2Framework/vendor/yiisoft/yii2/Yii.php';

$config = require 'Yii2Framework/config/web.php';

(new yii\web\Application($config))->run();
