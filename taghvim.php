<?php
define('YII_DEBUG', true);
define('YII_ENV', 'dev');
require 'nusoap.php';
require 'functions.php';
require 'Yii2Framework/vendor/autoload.php';
require 'Yii2Framework/vendor/yiisoft/yii2/Yii.php';
$config = require 'Yii2Framework/config/web.php';
use yii\web\Application;
use app\modules\calendars\models\DAL\CalendarsEvents;
use app\config\components\jdf;
$app    = new Application($config);
$text = "یاداور جلسه در تاریخ date ساعت time لطفا تشریف بیاورید";
$now  = date('Y-m-d H:i:s');
$one  = date('Y-m-d H:i:s', strtotime('-1 min'));
$calendars = CalendarsEvents::find()->where("done = 0 AND datetime BETWEEN '$one' AND '$now'")->all();
CalendarsEvents::updateAll(['done' => 1], "done = 0 AND datetime < '$now'");
foreach ($calendars as $model) {
    $calendar = $model->calendar;
    $date = jdf::jdate('Y/m/d', strtotime($model->datetime));
    $time = jdf::jdate('H:i', strtotime($model->datetime));
    $message  = str_replace(['date', 'time'], [$date, $time], $text);
    foreach ($calendar->calendarsUsers as $user) {
        switch ($calendar->alarm_type_id) {
            case 1:
                elan($message, $user->user_id);
                break;
            case 2:
                sms($message, $user->user->mobile);
                break;
            case 3:
                elan($message, $user->user_id);
                sms($message, $user->user->mobile);
                break;
        }
    }
}
function elan($message, $user_id) {
    
}