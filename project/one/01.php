<?php
if($_POST)
{
    $link=mysqli_connect("localhost","root",'wangling','exe');
    //核对数据库是否连接成功
    if(mysqli_connect_error($link))
    {
        echo "连接失败".mysqli_connect_error();
    }
    //选择用于数据库查询的默认数据库
    mysqli_select_db($link,'sql');
    $username=empty($_POST["username"])?'':$_POST["username"];
    $password=empty($_POST["password"])?'':$_POST["password"];
    //对输入的密码进行MD5加密
    $md5password=md5($password);
    //从数据库中选取数据
    $sql="SELECT * FROM user WHERE username='{$username}'AND password='{$password}'";
    //echo $sql;
    //对书库进行一次查询
    $qure=mysqli_query($link,$sql);
    //从结果集中取得一行作为数值数据或关联数据
    $userinfo=mysqli_fetch_array($qure,MYSQLI_ASSOC);
    if(!empty($userinfo))
    {
        echo '<pre>',print_r($userinfo,1),'</pre>';
    }
    else{
        echo "用户名不存在或密码错误！";
    }
}

?>
