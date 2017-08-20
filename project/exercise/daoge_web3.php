<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/9
 * Time: 11:46
 */
$target = $_REQUEST['ip'];

$target = trim($target);

var_dump($target);
$substitutions = array(
    '-' => '', '|' => '', ';' => '', '&' => '', '||' => '', '`' => '', ')' => '', '(' => '', '$' => '',);
$target = str_replace(array_keys($substitutions), $substitutions, $target);//将$target的内容进行过滤
//stristr搜索字符串在某地字符串中第一次出现
if (stristr(php_uname('s'), 'Windows NT'))//返回运行php的操作系统的相关描述
{
    $cmd = shell_exec('ping  -c 1 ' . $target);//linux命令行，获取全部信息
} else {
    $cmd = shell_exec('ping  ' . $target);
}
echo "<pre>{$cmd}</pre>";
?>