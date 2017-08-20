<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 17:55
 */
$str="I love you,my dear";
$search='love';
$replace="<font style='color: aqua;'>love</font>";
$strrelpace=str_ireplace($search,$replace,$str);
echo $strrelpace;
?>