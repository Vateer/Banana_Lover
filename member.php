<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
include_once 'inc/page.inc.php';
$template['title']='用户中心';
$link=connect();
$member_id=is_login($link);
$is_manage_login=is_manage_login($link);
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('index.php', 'error', '用户id参数不合法!');
}

$query="select * from member where id={$_GET['id']}";
$result_member=execute($link,$query);
if(mysqli_num_rows($result_member)!=1){
    skip('index.php', 'error', '不存在该用户');
}
$data_member=mysqli_fetch_assoc($result_member);

$query="select count(*) from content where member_id={$_GET['id']}";
$count_all=num($link,$query);

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo $template['title'] ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="style/public.css" />
<link rel="stylesheet" type="text/css" href="style/list.css" />
<style type="text/css">
#main #right .member_big {
	margin:20px auto 0 auto;
	width:180px;
}
#main #right .member_big dl dd {
	line-height:150%;
}
#main #right .member_big dl dd a {
	color:#333;
}
#main #right .member_big dl dd.name {
	font-size: 22px;
    font-weight: 400;
    line-height:140%;
    padding:5px 0 10px 0px;
}
</style>
</head>
<body>
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">且听风吟</div>
			<div class="nav">
				<a href="index.php"class="hover">首页</a>
			</div>
			<div class="serarch">
				<form>
					<input class="keyword" type="text" name="keyword" placeholder="搜索其实很简单" />
					<input class="submit" type="submit" name="submit" value="" />
				</form>
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
	<div id="position" class="auto">
		<a href="index.php">首页</a> &gt; <?php echo $data_member['name']?>
	</div>
	<div id="main" class="auto">
		<div id="left">
			<ul class="postsList">
            <?php
            $page=page($count_all,20);
			$query="select
			content.title,content.id,content.time,content.member_id,content.times,member.name,member.photo
			from content,member where
			content.member_id={$_GET['id']} and
			content.member_id=member.id order by id desc {$page['limit']}";
			$result_content=execute($link, $query);
			while($data_content=mysqli_fetch_assoc($result_content)){
				$data_content['title']=htmlspecialchars($data_content['title']);
				$query="select time from reply where content_id={$data_content['id']} order by id desc limit 1";
				$result_last_reply=execute($link, $query);
				if(mysqli_num_rows($result_last_reply)==0){
					$last_time='暂无';
				}else{
					$data_last_reply=mysqli_fetch_assoc($result_last_reply);
					$last_time=$data_last_reply['time'];
				}
				$query="select count(*) from reply where content_id={$data_content['id']}";
			?>
				<li>
					<div class="smallPic">
							<img width="45" height="45" src="<?php if($data_member['photo']!=''){echo $data_member['photo'];}else{echo 'style/photo.jpg';}?>" />
					</div>
					<div class="subject">
                    <div class="titleWrap"><h2><a target="_blank" href="show.php?id=<?php echo $data_content['id']?>"><?php echo $data_content['title']?></a></h2></div>
					<p>
                    <?php
                     if(check_user($member_id,$data_content['member_id'],$is_manage_login)){
                        $url=urlencode("content_delete.php?id={$data_content['id']}");
                        $return_url=urlencode($_SERVER['REQUEST_URI']);
                        $message="要删除帖子 {$data_content['title']} 吗？";
                        $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
                        echo "<a href='content_update.php?id={$data_content['id']}'>编辑  <a href='{$delete_url}'>删除</a>";
                    }
                    ?>
						发帖日期：&nbsp;<?php echo $data_content['time']?>&nbsp;&nbsp;&nbsp;&nbsp;最后回复：<?php echo $last_time?>
					</p>
						</p>
					</div>
					<div class="count">
					<p>
						回复<br /><span><?php echo num($link,$query)?></span>
					</p>
					<p>
						浏览<br /><span><?php echo $data_content['times']?></span>
					</p>
					</div>
					<div style="clear:both;"></div>
				</li>
                <?php
                }
                ?>
			</ul>
			<div class="pages">
            <?php 
					echo $page['html'];
			?>
            </div>
		</div>
		<div id="right">
			<div class="member_big">
				<dl>
					<dt>
						<img width="180" height="180" src="<?php if($data_member['photo']!=''){echo $data_member['photo'];}else{echo 'style/photo.jpg';}?>" />
					</dt>
					<dd class="name"><?php echo $data_member['name']?></dd>
					<dd>帖子总计：<?php echo $count_all?></dd>
					<?php
					if($member_id==$data_member['id']){
					?>
					<dd>操作：<a  href="member_photo_update.php" target="_blank">修改头像</a></dd>
					<dd>操作：<a  href="sign.php" target="_blank">个性签名</a></dd>
					<?php }?>
				</dl>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
</body>
</html>