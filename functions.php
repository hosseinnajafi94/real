<?php
function pre($dest) {
    echo '<pre>';
    var_dump($dest);
    exit;
}
function getDiffDays($start, $end) {
    $s = new \DateTime($start);
    $e = new \DateTime($end);
    $d = $e->diff($s);
    return $d->days;
}
function sms($text, $mobile) {
    $client                   = new nusoap_client("http://login.Parsgreen.com/Api/SendSMS.asmx?wsdl", true);
    $client->soap_defencoding = 'UTF-8';
    $err                      = $client->getError();
    if ($err) {
        echo 'Constructor error' . $err;
    }
    $parameters['signature'] = "3254688C-F84D-498C-BDD2-4B8FF43D4C85";
    $parameters['toMobile']  = $mobile;
    $parameters['smsBody']   = $text;
    $parameters['retStr']    = "";
    return $client->call('Send', $parameters);
}
