<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 17:33
 */
if(strlen($_POST['car'])==18)
{
    echo "<script>alert('身份证位数正确');history.back();</script>";
}
else{
    echo "<script>alert('输入错误');history.back();</script>";
}
?>
<HTML>
<head>
    <title>
        验证身份证长度
    </title>
</head>
<body>
<form method="post">
    <h2>请输入身份证号码</h2>
    <input type="text" name="car">
</form>
</body>
</HTML>
