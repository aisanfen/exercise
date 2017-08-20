<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/24
 * Time: 13:18
 */
  $a='b';
  $b=2;
  $i=&$b+$$a;
  var_dump($i);//OUTPUT int(2);
?>
