<?php
define('YII_DEBUG', true);
define('YII_ENV', 'dev');
require 'nusoap.php';
require 'functions.php';
require 'Yii2Framework/vendor/autoload.php';
require 'Yii2Framework/vendor/yiisoft/yii2/Yii.php';
$config = require 'Yii2Framework/config/web.php';
use yii\web\Application;
use app\config\components\jdf;
use app\modules\calendars\models\DAL\CalendarsEvents;
use app\modules\notifications\models\SRL\NotificationsSRL;
$app    = new Application($config);
$text = "یادآور جلسه در تاریخ date ساعت time لطفا تشریف بیاورید.";
$now  = date('Y-m-d H:i:s');
$one  = date('Y-m-d H:i:s', strtotime('-1 min'));
$calendars = CalendarsEvents::find()->where("done = 0 AND datetime BETWEEN '$one' AND '$now'")->all();
CalendarsEvents::updateAll(['done' => 1], "done = 0 AND datetime < '$now'");
foreach ($calendars as $model) {
    /* @var $model CalendarsEvents */
    $calendar = $model->calendar;
    $alarm = $model->alarm;
    $date = jdf::jdate('Y/m/d', strtotime($model->datetime));
    $time = jdf::jdate('H:i', strtotime($model->datetime));
    $message  = str_replace(['date', 'time'], [$date, $time], $alarm->message);
    foreach ($calendar->calendarsUsers as $user) {
        switch ($alarm->alarm_type_id) {
            case 1:
                NotificationsSRL::newNote('تقویم', $message, 'calendar', 1, $user->user_id);
                break;
            case 2:
                //sms_parsgreen($message, $user->user->mobile);
                sms_saba($message, $user->user->mobile);
                break;
            case 3:
                NotificationsSRL::newNote('تقویم', $message, 'calendar', 1, $user->user_id);
                //sms_parsgreen($message, $user->user->mobile);
                sms_saba($message, $user->user->mobile);
                break;
        }
    }
}