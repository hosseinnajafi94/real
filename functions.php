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
function sms_parsgreen($text, $mobile) {
    $client                   = new nusoap_client("http://login.Parsgreen.com/Api/SendSMS.asmx?wsdl", true);
    $client->soap_defencoding = 'UTF-8';
    $parameters['signature'] = "3254688C-F84D-498C-BDD2-4B8FF43D4C85";
    $parameters['toMobile']  = $mobile;
    $parameters['smsBody']   = $text;
    $parameters['retStr']    = "";
    return $client->call('Send', $parameters);
}
function sms_saba($text, $mobile) {
    $data = [
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
