<?php
if(empty($_POST['name'])){
    skip('login.php','error','用户名不得为空');
}

if(mb_strlen($_POST['name'])>32){
    skip('login.php','error','用户名不能超过32个字符');
}

if(empty($_POST['pw'])){
    skip('login.php','error','密码不得为空');
}
if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
	skip('login.php', 'error','验证码输入错误！');
}
if(empty($_POST['time'])||is_numeric($_POST['time'])||$_POST['time']>2592000){
    $_POST['time']=2592000;
}
escape($link,$_POST);
	$query="select * from member where name='{$_POST['name']}' and pw=md5('{$_POST['pw']}')";
	$result=execute($link, $query);
?>