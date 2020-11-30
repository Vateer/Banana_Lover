<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
if(is_manage_login($link)){
    skip('index.php','ok','请不用重复登陆');
}
if(isset($_POST['submit'])){
    include_once 'inc/check_login.inc.php';
    $query="select * from manage where name='{$_POST['name']}' and pw=md5('{$_POST['pw']}')";
    $result=execute($link,$query);
    if(mysqli_num_rows($result)==1){
        $data=mysqli_fetch_assoc($result);
        $_SESSION['manage']['name']=$data['name'];
        $_SESSION['manage']['pw']=sha1($data['pw']);
        $_SESSION['manage']['id']=$data['id'];
        $_SESSION['manage']['level']=$data['level'];
        skip('index.php','ok','登陆成功');
    }else{
        skip('login.php','error','用户名或密码错误');
    }
}
?>
<html>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>后台登录</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>登录(Login)</h1>
            <form action="" method="post">
                <input type="text" name="name" class="text" placeholder="请输入您的用户名！">
                <input type="password" name="pw" class="text" placeholder="请输入您的用户密码！">
                <button type="submit" class="submit" name="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>快捷</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>
		
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js" ></script>
        <script src="assets/js/supersized.3.2.7.min.js" ></script>
        <script src="assets/js/supersized-init.js" ></script>
        <script src="assets/js/scripts.js" ></script>

    </body>
</html>

