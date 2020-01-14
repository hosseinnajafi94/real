<?php
$data = [
    'username' => 'sale2404',
    'password' => '12345',
    'from' => '30008561102404',
    'To' => '09357405114',
    'text' => 'test payamak',
    //'flash' => '',
    //'udh' => '',
];

$url = 'http://sabapayamak.com/post/sendsms.ashx?' . http_build_query($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

var_dump($output);