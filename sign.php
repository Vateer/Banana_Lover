<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$template['title']='发布帖子';
$link=connect();
if(!$member_id=is_login($link)){
	skip('login.php', 'error', '请登录之后再发帖!');
}
if(isset($_POST['submit'])){

	$_POST=escape($link,$_POST);
	$query="insert into content(sign) values('{$_POST['sign']}')";
	execute($link, $query);
	if(mysqli_affected_rows($link)==1){
		skip('index.php', 'ok', '发布成功！');
	}else{
		skip('publish.php', 'error', '发布失败，请重试！');
	}
}
?>
<?php include 'inc/header.inc.php'?>

	<div id="position" class="auto">
		 <a>写一段属于自己的个型签名吧</a>
	</div>
	<div id="publish">
		<form method="post">
			<textarea name="sign" class="content"></textarea>
			<input class="publish" type="submit" name="submit" value="" />
			<div style="clear:both;"></div>
		</form>
	</div>
<?php include 'inc/footer.inc.php'?>