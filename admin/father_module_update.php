<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$link=connect();
$template['title']='管理员编辑页';
    include_once 'inc/is_manage_login.inc.php';
if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
    skip('father_module.php','error','id参数错误！');
}
$query="select * from father_module where id={$_GET['id']}";
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
	skip('father_module.php','error','这条版块信息不存在！');
}
if(isset($_POST['submit'])){
    $check_flag='update';
	include 'inc/check_father_module.inc.php';
    $query="update father_module set module_name='{$_POST['module_name']}',sort={$_POST['sort']} where id={$_GET['id']}";
    execute($link,$query);
    if(mysqli_affected_rows($link)==1){
        skip('father_module.php','ok','恭喜你，修改成功！');
    }else{
        skip('father_module.php','error','对不起，修改失败，请重试！');
    }
}
$data=mysqli_fetch_assoc($result);
?>
<?php include 'inc/header.inc.php'?>
<div id="bg_wrapper">     
                <div id="main">
                    <div id="content">
                        <div class="jquery_tab">
                            <div class="content_block">
                                <h2 class="jquery_tab_title">修改父板块-<?php echo $data['module_name']?></h2>
                <div class="title">功能说明</div>
                <div class="explain">
                    <ul>
                        <li>"*★,°*:.☆(￣▽￣)/$:*.°★* 。"(＾Ｕ＾)ノ~ＹＯ</li>
                    </ul>
                </div>
        <div id="main">
        <form method="post">
                    <table class="au">
                        <tr>
                            <td>版块名称</td>
                            <td><input name="module_name" value="<?php echo $data['module_name']?>" type="text" /></td>
                            <td>
                                版块名称不得为空，最大不得超过66个字符
                            </td>
                        </tr>
                        <tr>
                            <td>排序</td>
                            <td><input name="sort" value="<?php echo $data['sort']?>" type="text" /></td>
                            <td>
                                填写一个数字即可
                            </td>
                        </tr>
                    </table>
    <input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="修改" />
                </form>
            </div>
                                </div><!--end content_block-->
                                
                            </div><!-- end jquery_tab -->
                           
                        </div>
                        <!--end content-->
                        
                    </div><!--end main-->

<?php include 'inc/left.inc.php'?>
<?php include 'inc/footer.inc.php'?>