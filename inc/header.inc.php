<?php
$query="select * from info where id=1";
$result_info=execute($link, $query);
$data_info=mysqli_fetch_assoc($result_info);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo $template['title']?> - <?php echo $data_info['title']?></title>
<meta name="keywords" content="<?php echo $data_info['keywords']?>" />
<meta name="description" content="<?php echo $data_info['description']?>" />
<link rel="stylesheet" type="text/css" href="style/public.css" />
<link rel="stylesheet" type="text/css" href="style/register.css" />
<link rel="stylesheet" type="text/css" href="style/publish.css" />
<link rel="stylesheet" type="text/css" href="style/index.css" />
<link rel="stylesheet" type="text/css" href="style/list.css" />
<link rel="stylesheet" type="text/css" href="style/show.css" />
</head>
<body>
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">且听风吟</div>
			<div class="nav">
				<a href="index.php" class="hover">首页</a>
			</div>
			<div class="serarch">
				<form action="search.php" method="get" target="_blank">
					<input class="keyword" type="text" name="keyword" placeholder="搜索其实很简单" />
					<input class="submit" type="submit"  value="" />
				</form>
			</div>
			<div class="nav">
				<a href="music.php" class="hover">音乐</a>
			</div>
			<div class="login">
			<?php 
			$link=connect();
				if(is_login($link)){
$str=<<<A
<a href="member.php?id={$member_id}" target="_blank">您好！{$_COOKIE['bbs']['name']}</a><span style="color:#fff;"> |</span> <a href="logout.php">退出</a>
A;
					echo $str;		
				}else{
$str=<<<A
					<a href="login.php">登录</a>&nbsp;
					<a href="register.php">注册</a>
A;
					echo $str;
				}
				?>
			</div>
		</div>
	</div>
	<div style="margin-top:55px;"></div>