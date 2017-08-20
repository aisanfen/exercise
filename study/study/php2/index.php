<!DOCTYPE html>
<form action="Test.php" method="get">
    密码文件:<input type="text" name="pass"><br>
    用户名:<input type="text" name="user"><br>
    <input style="display: none"  type="text" value="class.php" name="file"><br>
    <input type="submit">
    <!--
if(isset($user)&&file_get_contents($user,"r")==="the user is admin"){
    echo "Hello Admin";
    -->
</form>
