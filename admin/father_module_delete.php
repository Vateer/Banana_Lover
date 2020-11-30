<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
    include_once 'inc/is_manage_login.inc.php';
if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
    skip('father_module.php','error','id参数错误!');
}
//从子版块中查询是否有相同的id，如果有的话就不能直接删除
$query="select * from son_module where father_module_id={$_GET['id']}";
$result=execute($link,$query);
if(mysqli_num_rows($result)){
    skip('father_module_add.php','error','板块下有子板块，无法直接删除');
}
$query="delete from father_module where id={$_GET['id']}";
execute($link,$query);
//mysqli_affected_rows() 函数返回前一次 MySQL 操作（SELECT、INSERT、UPDATE、REPLACE、DELETE）所影响的记录行数
if(mysqli_affected_rows($link)==1){
    skip('father_module.php','ok','删除成功');
}else{
    skip('father_module.php','error','对不起删除失败，请重试！');
}
?>
