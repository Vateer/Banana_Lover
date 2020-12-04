<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
include_once 'inc/page.inc.php';
$template['title']='子板块列表';
$link=connect();
$is_manage_login=is_manage_login($link);
$member_id=is_login($link);
if(!$member_id && !$is_manage_login){
	skip('login.php', 'error', '未登陆!');
}
$query="select * from son_module where id={$_GET['id']}";
$result_son=execute($link,$query);
if(mysqli_num_rows($result_son)!=1){
    skip('index.php','error','子板块不存在');
}
$data_son=mysqli_fetch_assoc($result_son);
$query="select * from father_module where id={$data_son['father_module_id']}";
$result_father=execute($link,$query);
$data_father=mysqli_fetch_assoc($result_father);

$query="select count(*) from content where module_id={$_GET['id']}";
$count_all=num($link,$query);
$query="select count(*) from content where module_id={$_GET['id']} and time>CURDATE()";
$count_today=num($link,$query);

$query="select * from member where id={$data_son['member_id']}";
$result_member=execute($link,$query);

$query="select * from info where id=1";
$result_info=execute($link, $query);
$data_info=mysqli_fetch_assoc($result_info);
?>
<?php //头部?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo $data_son['module_name']?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="style/public.css" />
<link rel="stylesheet" type="text/css" href="style/list.css" />
</head>
<body>
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">暨南大学</div>
			<div class="nav">
				<a href="index.php" class="hover">首页</a>
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
					<a>您好！{$_COOKIE['bbs']['name']}</a><span style="color:#fff;"> |</span> <a href="logout.php">退出</a>
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
	<?php //头部?>
<div id="position" class="auto">
		 <a href="index.php">首页</a> &gt;<a href="list_father.php?id=<?php echo SUB_URL.$data_father['id']?>"><?php echo $data_father['module_name']?></a>&gt; <a><?php echo $data_son['module_name']?></a>
	</div>
	<div id="main" class="auto">
		<div id="left">
			<div class="box_wrap">
				<h3><?php echo $data_son['module_name']?></h3>
				<div class="num">
				    今日：<span><?php echo $count_today?></span>&nbsp;&nbsp;&nbsp;
				    总帖：<span><?php echo $count_all?></span>
				</div>
				<div class="moderator">版主：<span>
                    <?php
                    if(mysqli_num_rows($result_member)==0){
                        echo '暂无版主';
                    }else{
                        $data_member=mysqli_fetch_assoc($result_member);
                        echo $data_member['name'];
                    }
                    ?>

                </span></div>
				<div class="notice"><?php echo $data_son['info']?></div>
				<div class="pages_wrap">
					<a class="btn publish" href="publish.php?son_module_id=<?php echo $_GET['id']?>"" target="_blank"></a>
					<div class="pages">
                    <?php 
					$page=page($count_all,20);
					echo $page['html'];
					?>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
			<div style="clear:both;"></div>
			<ul class="postsList">
            <?php 
		$query="select 
		content.title,content.id,content.time,content.times,content.member_id,member.name,member.photo,son_module.module_name 
		from content,member,son_module where 
		content.module_id={$data_son['id']} and 
		content.member_id=member.id and  
		content.module_id=son_module.id {$page['limit']} ";
        $result_content=execute($link,$query);
        while($data_content=mysqli_fetch_assoc($result_content)){
			$data_content['title']=htmlspecialchars($data_content['title']);
			$query="select time from reply where content_id={$data_content['id']} order by id desc limit 1";
			$result_last_reply=execute($link,$query);
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
				<a target="_blank" href="member.php?id=<?php echo $data_content['member_id']?>">
						<img width="45" height="45"src="<?php if($data_content['photo']!=''){echo SUB_URL.$data_content['photo'];}else{echo 'style/photo.jpg';}?>">
					</a>
				</div>
				<div class="subject">
					<div class="titleWrap"><h2><a target="_blank" href="show.php?id=<?php echo $data_content['id']?>"><?php echo $data_content['title']?></a></h2></div>
					<p>
						楼主：<?php echo $data_content['name']?>&nbsp;<?php echo $data_content['time']?>&nbsp;&nbsp;&nbsp;&nbsp;最后回复：<?php echo $last_time?>
						<?php 
						if(check_user($member_id,$data_content['member_id'],$is_manage_login)){
							$return_url=urlencode($_SERVER['REQUEST_URI']);
							$url=urlencode("content_delete.php?id={$data_content['id']}&return_url={$return_url}");
							$message="你真的要删除帖子 {$data_content['title']} 吗？";
							$delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
							echo "<a href='content_update.php?id={$data_content['id']}&return_url={$return_url}'>编辑</a> <a href='{$delete_url}'>删除</a>";
						}
						?>
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
			<div class="pages_wrap">
				<a class="btn publish" href="publish.php?son_module_id=<?php echo $_GET['id']?>" target="_blank"></a>
				<div class="pages">
                <?php 
					$page=page($count_all,1);
					echo $page['html'];
					?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
			<div id="right">
		<div class="classList">
			<div class="title">版块列表</div>
			<ul class="listWrap">
			<?php
				$query="select * from father_module";
				$result_father=execute($link,$query);
				while($data_father=mysqli_fetch_assoc($result_father)){
			?>
				<li>
					<h2><a href="list_father.php?id=<?php echo $data_father['id']?>"><?php echo $data_father['module_name']?></a></h2>
					<ul>
					<?php
					$query="select * from son_module where father_module_id={$data_father['id']}";
					$result_son=execute($link,$query);
					while($data_son=mysqli_fetch_assoc($result_son)){
					?>
						<li><h3><a href="list_son.php?id=<?php echo $data_son['id']?>"><?php echo $data_son['module_name']?></a></h3></li>
						<?php
					}
						?>
					</ul>
				</li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
	<div style="clear:both;"></div>
</div>
<?php include 'inc/footer.inc.php'?>