<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16
 * Time: 19:59
 */
$string='[b]粗体[/b]';
$b_str=preg_replace('/\[b\](.*)\[\/b\]/i','<b>$1</b>',$string);
echo $b_str;
?>