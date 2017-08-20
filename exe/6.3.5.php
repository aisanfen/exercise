<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16
 * Time: 18:59
 */
function c_back($str){
    $str="<font color='$str[1]'>$str[2]</font>";
    return $str;
}
$string='[color=blue]蓝色[/color]';
echo preg_replace_callback('/\[color=(.*)\](.*)\[\/color\]/U',"c_back",$string);
?>