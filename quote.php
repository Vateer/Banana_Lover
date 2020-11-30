<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$template['title']='帖子回复';
$link=connect();
$member_id=is_login($link);
if(!$member_id=is_login($link)){
	skip('login.php', 'error', '请登录之后再回复!');
}
if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
    skip('index.php', 'error', '不存在该帖子');
}
$query="select sc.id,sc.title,sm.name from content sc,member sm where sc.id={$_GET['id']} and sc.member_id=sm.id";
$result_content=execute($link,$query);
if(mysqli_num_rows($result_content)!=1){
    skip('index.php', 'error', '您要回复的帖子不存在!');
}
$query="select reply.content,member.name from reply,member where reply.id={$_GET['reply_id']} and reply.content_id={$_GET['id']} and reply.member_id=member.id";
$result_reply=execute($link, $query);
if(mysqli_num_rows($result_reply)!=1){
	skip('index.php', 'error', '您要引用的回复不存在!');
}
if(isset($_POST['submit'])){
    include 'inc/check_reply.inc.php';
    $_POST=escape($link,$_POST);
    $query="insert into reply(content_id,quote_id,content,time,member_id)
            values({$_GET['id']},{$_GET['reply_id']},'{$_POST['content']}',now(),{$member_id}
            )";
            execute($link, $query);
            if(mysqli_affected_rows($link)==1){
                skip("show.php?id={$_GET['id']}",'ok', '回复成功');
            }else{
                skip($_SERVER['REQUEST_URI'], 'error', '回复失败,请重试!');
            }
}
$data_reply=mysqli_fetch_assoc($result_reply);
$data_reply['content']=nl2br(htmlspecialchars($data_reply['content']));
$data_content=mysqli_fetch_assoc($result_content);
$data_content['title']=htmlspecialchars($data_content['title']);

$query="select count(*) from reply where content_id={$_GET['id']} and id<={$_GET['reply_id']}";
$floor=num($link,$query);

if(!isset($_GET['reply_id'])||!is_numeric($_GET['reply_id'])){
    skip('index.php', 'error', '不存在该帖子');
}
?>
<?php include 'inc/header.inc.php'?>
	<div id="publish">
		<div><?php echo $data_content['name']?>: <?php echo $data_content['title']?></div>
		<div class="quote">
        <p class="title">引用<?php echo $floor?>楼 <?php echo $data_reply['name']?> 发表的: </p>
		<?php echo $data_reply['content']?>
		</div>
		<form method="post">
			<textarea name="content" class="content"></textarea>
			<input class="reply" type="submit" name="submit" value="" />
			<div style="clear:both;"></div>
		</form>
	</div>
<?php include 'inc/footer.inc.php'?>