<?php
function pre($dest) {
    echo '<pre>';
    call_user_func_array('var_dump', func_get_args());
    exit;
}
function getDiffDays($start, $end) {
    $s = new \DateTime($start);
    $e = new \DateTime($end);
    $d = $e->diff($s);
    return $d->days;
}
function sms_parsgreen($text, $mobile) {
    $client                   = new nusoap_client("http://login.Parsgreen.com/Api/SendSMS.asmx?wsdl", true);
    $client->soap_defencoding = 'UTF-8';
    $parameters['signature']  = "3254688C-F84D-498C-BDD2-4B8FF43D4C85";
    $parameters['toMobile']   = $mobile;
    $parameters['smsBody']    = $text;
    $parameters['retStr']     = "";
    return $client->call('Send', $parameters);
}
function sms_saba($text, $mobile) {
    $data   = [
        'username' => 'sale2404',
        'password' => '12345',
        'from'     => '30008561102404',
        'To'       => $mobile,
        'text'     => $text
    ];
    $ch     = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://sabapayamak.com/post/sendsms.ashx?' . http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $retval = intval($output);
    return $retval > 11;
}
function sec_to_time($seconds) {
    $hours = floor($seconds / 3600);
    $mins  = floor($seconds / 60 % 60);
    $secs  = floor($seconds % 60);
    return sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
}
function size_format($bytes, $type = 1) {
    $base      = 1024;
    $si_prefix = array('B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB');
    $class     = min((int) log($bytes, $base), count($si_prefix) - 1);
    return $type == 1 ? sprintf('%1.2f', $bytes / pow($base, $class)) . ' ' . $si_prefix[$class] : sprintf('%1.2f', $bytes / pow($base, $class));
}
function getsystemboottime($type = 2) {
    $info     = exec('systeminfo | find /i "Boot Time"');
    $datetime = trim(str_replace("System Boot Time:", "", $info));
    return $type == 1 ? date('Y-m-d H:i:s', strtotime($datetime)) : app\config\components\jdf::jdate('Y/m/d H:i:s', strtotime($datetime));
}
function getfoldersize($path) {
    $f   = realpath(Yii::getAlias($path));
    $obj = new \COM('scripting.filesystemobject');
    $ref = $obj->getfolder($f);
    return $ref->size;
}
