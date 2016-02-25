<?php

function writelog($msg) {
    $log = __DIR__ . '/callback.log';
    file_put_contents($log, $msg, FILE_APPEND);
}

$signature = $_GET["signature"];
$timestamp = $_GET["timestamp"];
$nonce = $_GET["nonce"];    
$echostr = $_GET['echostr'];

writelog("signature: {$signature} timestamp: {$timestamp} nonce: {$nonce} echostr: {$echostr}");
$token = '8o17welkj5s544f63l227w1';
$tmpArr = array($token, $timestamp, $nonce);
sort($tmpArr, SORT_STRING);

writelog('sorted: ' . var_export($tmpArr, true));
$tmpStr = implode( $tmpArr );
$tmpStr = sha1( $tmpStr );

writelog('sha1: ' . $tmpStr);
if( $tmpStr == $signature ){
    //return true;
    echo $echostr;
}else{
    //return false;
}
