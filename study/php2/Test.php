<?php
/**
 * Created by PhpStorm.
 * User: Norse
 * Date: 2017/7/24
 * Time: 16:53
 */
$user=$_GET['user'];
$file=$_GET['file'];
$pass=$_GET['pass'];
if(isset($user)&&file_get_contents($user,"r")==="the user is admin"){
    echo "Hello Admin";
    $a=preg_match("/fla9/",$file);
    if($a){
        exit();
    }else{
        include "Test.php"; //class.php
        @$pass = unserialize($pass);
        echo $pass;
    }
}else{
    echo "You are not admin!";
}
?>