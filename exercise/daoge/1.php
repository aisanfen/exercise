<?php
ini_set("display_errors", 0);
include_once flag.php;
$str = strstr($_SERVER['REQUEST_URI'], '?');
$str = substr($str,1);
$str = str_replace('key','',$str);
parse_str($str);
if(md5($key1) == md5($key2) && $key1 !== $key2){
    echo $flag;
}
?>