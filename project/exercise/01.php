<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/26
 * Time: 22:09
 */
class Site
{
    var $url;
    var $tutle;

    function setUrl($par)
    {
        $this->url = $par;
    }

    function getUrl()
    {
        echo $this->url . '<br>';
    }

    function setTitle($par)
    {
        $this->title = $par;
    }

    function getTitle()
    {
        echo $this->title,'<br>';
    }
}
//实例化对象
$taobao=new Site;
$goole=new Site;
//调用成员函数，设置标题和URL
$taobao->setTitle("淘宝");
$goole->setTitle("GOOLE搜索");

$taobao->setUrl('www.taobao.com');
$goole->setUrl('www.goole.com');

$taobao->getTitle();
$goole->getTitle();

$taobao->getUrl();
$goole->getUrl();
?>