<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 20:43
 */
define("URL_RULE", "/");//路由规则
class CookiesInjection {
    public $IS_LOG_HTML = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Crack ME Guys</title>
</head>
<body>
欢迎%s登录<br>
<a href="CookiesInjection.php?logout">注销</a>
<a href="CookiesInjection.php?artical">文章</a>
</body>
</html>
HTML;
    private $LOG_HTML = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Crack ME Guys</title>
</head>
<body>
<form action="CookiesInjection.php?login" method="post">
用户名:<input type="text" name="username"><br>
密码:<input type="password" name="password"><br>
验证码:<input type="text" name="code"><img src="CookiesInjection.php?code"><br>
<input type="submit" value="登录!"><br>
</form>
<a href="CookiesInjection.php?regist">注册</a>
</body>
</html>
HTML;
    private $REGIST = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Crack ME Guys</title>
</head>
<body>
<form action="CookiesInjection.php?regist" method="post">
用户名:<input type="text" name="username"><br>
密码:<input type="password" name="password"><br>
验证码:<input type="text" name="code"><img src="CookiesInjection.php?code"><br>
<input type="submit" value="注册!">
</form>
</body>
</html>
HTML;
//???
    public function __construct() {
        session_start();//凡是与session有关的,之前必须调用函数session_start();
        header("Content-type: text/html; charset=utf-8");
    }//构造函数

    public function __destruct() {
    }//析构函数

    private function Action() {

        $action = $this->URL();
        if ($action) {
            switch ($action[0]) {
                case "login"://登陆+验证
                    if (isset($_SESSION['username'])) {
                        echo sprintf($this->IS_LOG_HTML, $_SESSION['username']);
                        //将百分号替换成一个作为参数进行传递的变量(替换前面的欢迎%s登陆)
                    } else {
                        //_SESSION用于存储用户会话信息或者更爱用户的会话信息
                        if(isset($_POST['code'])&&$_SESSION['code']==$_POST['code']){
                            if (isset($_POST['username']) && isset($_POST['password'])) {
                                $db = $this->create_database();//连接到数据库
                                $passwd = md5($_POST['password']);
                                $sql = "select username from `user` where username='{$_POST['username']}' and password='{$passwd}'";
                                $u = $db->query($sql);
                                if ($u) {
                                    $res = $u->fetchAll();//?
                                    $username = $res[0]['username'];
                                    $_SESSION['username'] = $username;
                                    echo "登录成功";
                                }
                            }
                        }else{
                            echo "验证码错误";
                        }
                    }
                    break;
                case "regist"://注册
                    if (isset($_SESSION['username'])) {
                        echo sprintf($this->IS_LOG_HTML, $_SESSION['username']);
                    } else {
                        if (isset($_POST['username']) && isset($_POST['password'])) {
                            if(isset($_POST['code'])&&$_SESSION['code']==$_POST['code']){
                                $passwd = md5($_POST['password']);
                                $db = $this->create_database();
                                $sql = "select username from `user` where username='{$_POST['username']}'";
                                $u = $db->query($sql);
                                $data=$u->fetchAll();//?
                                if (empty($data)) {
                                    //在sql里面添加内容
                                    $sql = "insert into `user` (username,password) VALUES ('{$_POST['username']}' ,'{$passwd}') ";
                                    $db->query($sql);
                                    echo "注册成功";
                                } else {
                                    echo "用户名重复";
                                }
                            }else{
                                echo "验证码错误";
                            }
                        } else {
                            echo $this->REGIST;
                        }
                    }
                    break;
                case "logout"://注销
                    setcookie("artical", "", time() + 30);//向用户发送一个http cookie
                    session_destroy();//释放当前用户的session文件
                    echo "logout";
                    break;
                case "artical":
                    if (isset($_SESSION['username'])) {
                        echo sprintf($this->IS_LOG_HTML, $_SESSION['username']);
                        if (isset($_COOKIE['artical'])) {
                            $pdo=$this->create_database();
                            $sql="select title,content from artical WHERE uid='{$_COOKIE['artical']}'";
                            $res=$pdo->query($sql);
                            if($res){
                                $list=$res->fetchAll();
                                $table="<br><table><tr><td>标题</td><td>内容</td></tr>";
                                foreach ($list as $x){
                                    $table.="<tr><td>".$x['title']."</td><td>".$x['content']."</td></tr>";
                                }
                                echo $table."</table>";
                            }else{
                                echo "<br>并没有那篇文章";
                            }
                        } else {
                            echo "<br>It seem you need set an artical number";
                        }
                    }
                    break;
                case "code"://验证码
                    $image = imagecreatetruecolor(100, 30);//新建一个真彩色图像
                    $bgcolor = imagecolorallocate($image,255,255,255);//为一幅图形分配颜色
                    imagefill($image, 0, 0, $bgcolor);//为图像着色
                    $captcha_code = "";
                    for($i=0;$i<4;$i++){
                        $fontsize = 6;
                        $fontcolor = imagecolorallocate($image, rand(0,120),rand(0,120), rand(0,120));      //0-120深颜色
                        $fontcontent = rand(0,9);//随机数
                        $captcha_code .= $fontcontent;
                        $x = ($i*100/4)+rand(5,10);
                        $y = rand(5,10);
                        imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);//绘制横式字符串
                    }
                    $_SESSION['code'] = $captcha_code;
                    for($i=0;$i<200;$i++){
                        $pointcolor = imagecolorallocate($image,rand(50,200), rand(50,200), rand(50,200));
                        imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);//绘点
                    }
                    for($i=0;$i<4;$i++){
                        $linecolor = imagecolorallocate($image,rand(80,220), rand(80,220),rand(80,220));
                        imageline($image,rand(1,99), rand(1,29),rand(1,99), rand(1,29),$linecolor);//绘制直线
                    }
                    header('Content-Type: image/png');//发向客户端送http报头
                    imagepng($image);//建立一张png图像
                    imagedestroy($image);//销毁图像
                    break;
                default:
                    if (isset($_SESSION['username'])) {
                        echo sprintf($this->IS_LOG_HTML, $_SESSION['username']);
                    } else {
                        echo $this->LOG_HTML;
                    }
                    break;
            }
        }else{
            if (isset($_SESSION['username'])) {
                echo sprintf($this->IS_LOG_HTML, $_SESSION['username']);
            } else {
                echo $this->LOG_HTML;
            }
        }
    }
//路由器规则
    private function URL() {
        if (!empty($_GET)) {
            $url = array_keys($_GET)[0];//返回包含数组中所有键名的一个新数组：
            $partem = "/" . URL_RULE . "+/";
            $spacial = ['/', '\\', '+', '.', '*', '(', ')', '\'', '\"'];
            foreach ($spacial as $x) {
                if (URL_RULE == $x) $partem = "/\\" . URL_RULE . "+/";
            }
            $url = preg_split($partem, $url);
            return $url;
        } else return null;
    }

    public function run_server() {
        $this->Action();
    }

    private function create_database() {
        try {
            $dbms = 'mysql';
            $host = 'localhost';
            $dbName = 'sqltester';
            $user = 'root';
            $pass = 'wangling';
            $dsn = "$dbms:host=$host;dbname=$dbName";
            $pdo = new PDO($dsn, $user, $pass,$dbName);//sqltester
            $pdo->query('set names utf8;');
            return $pdo;
        } catch (Exception $e) {
            return NULL;
        }
    }
}
$c = new CookiesInjection();
$c->run_server();