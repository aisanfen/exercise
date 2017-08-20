<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 0:36
 */
$q=isset($_GET['q'])?htmlspecialchars($_GET['q']):'';
if($q)
{
    if($q=='taobao')
    {
        echo "http://www.taobao.com";
    }
    elseif ($q='goole')
    {
        echo "http://www.goole.com";
    }
}
else{
?>//相当于有两个html
<html>
<head>
    <title>下拉菜单单选</title>
</head>
<body>
<form action="" method="get">//action是将内容提交到当前页面
    选择一个站点：
    <select name="q">
        <option value="taobao">淘宝</option>
        <option value="goole">谷歌</option>
    </select>
    <input type="submit" value="提交">
</form>
</body>
</html>
<?php
}
?>