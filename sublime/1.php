 <?php
if($_POST){
    $link = mysqli_connect("localhost", "root", "wangling");//此处虚构
   //核对数据库是否连接成功
    if(mysqli_connect_errno($link))
    {
        echo "连接mysql失败".mysqli_connect_error();
    }
    //选择用于数据库查询的默认数据库
    mysqli_select_db($link, 'sql');
    //判断是否为空
    $username = empty($_POST['username']) ? '' : $_POST['username'];
    $password = empty($_POST['password']) ? '' : $_POST['password'];

    //对输入的密码进行md5加密
    $md5password = md5($password);
    //从数据库中选取数据
    $sql = "SELECT uid,username FROM user WHERE username='{$username}'AND password='{$md5password}'";
    //对数据库进行一次查询
    $query = mysqli_query($link,$sql);
    //从结果集中取得一行作为数字数组或关联数组：
    $userinfo = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if(!empty($userinfo)){
        //登录成功,打印用户信息
        echo '<pre>',print_r($userinfo, 1),'</pre>';
    } else{
        echo "用户名不存在或密码错误！";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" Content="text/html;charset=utf8"/>
    <meta charset="utf-8">
    <title>你的sql注入</title>

    <style>
        #w{
            display:table;width:300px;height:300px;
            margin-left: 650px;
            margin-top: 300px;
        }
        #c{
            display:table-cell; vertical-align:middle;
        }

        body{
            background: url(http://p1.bpimg.com/4851/077469b2b7c97f2b.jpg) no-repeat 50% 0%;
            background-size: 1200px 700px;
        }
    </style>
</head>
<body>


<center>
    <div id = w>
        <div id="c">
            <form name="LOGIN_FORM" method="post" action="">
                你的名字:
                <input type="text" name="username" value="" size=30 /><br /><br />
                你的密钥:
                <input type="text" name="password" value="" size=30 /><br /><br />
                <input type="submit" value="登录" />
            </form>
        </div>
    </div>
</center>
</body>
</html>> 