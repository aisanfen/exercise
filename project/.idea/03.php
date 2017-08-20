<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/21
 * Time: 11:13
 */
function printdir($path)
{
    $dh=opendir($path);
    while(($row=readdir($dh))!==false)
    {
        echo $row,'<br/>';
    }
    closedir($dh);
}
?>