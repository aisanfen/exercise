<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/7
 * Time: 10:33
 */
$i=true;
$j=true;
$k=false;
if($i or $j and $k)
{
    echo "true";
}else
{
    echo "false";
}
echo  "<br>";
if($i || $j and $k)
{
    echo "true";
}else
{
    echo "false";
}
?>