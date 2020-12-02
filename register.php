<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$template['title']='欢迎注册';
$link=connect();
if(is_login($link)){
	skip('index.php','error','你已经登录，请不要重复注册！');
}
if(isset($_POST['submit'])){
	include 'inc/check_register.inc.php';
	$query="insert into member(name,pw,register_time) values('{$_POST['name']}',md5('{$_POST['pw']}'),now())";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		//设置cookie
		setcookie('bbs[name]',$_POST['name']);
		setcookie('bbs[pw]',sha1(md5($_POST['pw'])));
		skip('index.php','ok','注册成功！');
	}else{
		skip('register.php','error','注册失败,请重试！');
	}
}
?>
<?php include 'inc/header.inc.php'?>
	<div id="register" class="auto">
		<h2>欢迎注册成为 私房库会员</h2>
		<form  method="post">
			<label>用户名：<input type="text" name="name" /><span>*用户名含有禁用字符，请选择其他用户名</span></label>
			<label>密码：<input type="password" name="pw"  /><span>*用户名含有禁用字符，请选择其他用户名</span></label>
			<label>确认密码：<input type="password" name="confirm_pw"/><span>*用户名含有禁用字符，请选择其他用户名</span></label>
			<label>验证码：<input name="vcode" type="text"  /><span>*请输入下方验证码</span></label>
			<img class="vcode" src="show_code.php" />
			<div style="clear:both;"></div>
			<input class="btn" name="submit" type="submit" value="确定注册" />
		</form>
	</div>

<?php include 'inc/footer.inc.php'?>