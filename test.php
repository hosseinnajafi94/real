<?php
function size_format($bytes, $type = 1) {
    $base      = 1024;
    $si_prefix = array('B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB');
    $class     = min((int) log($bytes, $base), count($si_prefix) - 1);
    return $type == 1 ? sprintf('%1.2f', $bytes / pow($base, $class)) . ' ' . $si_prefix[$class] : sprintf('%1.2f', $bytes / pow($base, $class));
}
function getsystemboottime($type = 1) {
    $info     = exec('systeminfo | find /i "Boot Time"');
    $datetime = trim(str_replace("System Boot Time:", "", $info));
    return $type == 1 ? date('Y-m-d H:i:s', strtotime($datetime)) : strtotime($datetime);
}
echo getsystemboottime() . '<br/>';
echo date('Y-m-d H:i:s') . '<br/>';
echo gethostbyname($_SERVER['SERVER_NAME']) . '<br/>';
echo $_SERVER['SERVER_NAME'] . '<br/>';
echo size_format(disk_total_space(".")) . '<br />';
echo size_format(disk_free_space(".")) . '<br />';
echo size_format(disk_total_space(".") - disk_free_space(".")) . '<br />';