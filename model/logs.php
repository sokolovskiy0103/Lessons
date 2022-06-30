<?php


function addLog()
{
    $time = date("H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = $_SERVER['REQUEST_URI'];
    $refUrl = $_SERVER['HTTP_REFERER'] ?? "direct";
    $logName = "logs/" . date("Y-m-d") . ".txt";
    $str = "$time | $ip |  $url | $refUrl\n";
    file_put_contents($logName, $str, FILE_APPEND);
}

function getLogList(): array
{
    $list = scandir("logs");
    return array_filter($list, callback: fn($file) => is_file("logs/$file"));
}