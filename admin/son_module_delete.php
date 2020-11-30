<?php
//子版块删除页面
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';
$template['title']='子板块删除页';
if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
    skip('son_module.php','error','id参数错误!');
}
$template['title']='子版块删除页面';
$query="delete from son_module where id={$_GET['id']}";
execute($link,$query);
//mysqli_affected_rows() 函数返回前一次 MySQL 操作（SELECT、INSERT、UPDATE、REPLACE、DELETE）所影响的记录行数
if(mysqli_affected_rows($link)==1){
    skip('son_module.php','ok','删除成功');
}else{
    skip('son_module.php','error','对不起删除失败，请重试！');
}
?>
