<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
    include_once 'inc/is_manage_login.inc.php';
if(isset($_POST['submit'])){
    $check_flag='add';
    include 'inc/check_father_module.inc.php';
    $query="insert into father_module(module_name,sort) values('{$_POST['module_name']}',{$_POST['sort']})";
    execute($link,$query);
if(mysqli_affected_rows($link)==1){
    skip('father_module.php','ok','恭喜你，添加成功！');
}else{
    skip('faher_module_add.php','error','对不起，添加失败，请重试！');
}
}
$template['title']='父板块添加页';
?>
<?php include 'inc/header.inc.php'?>
<div id="bg_wrapper">     
                <div id="main">
                    <div id="content">
                        <div class="jquery_tab">
                            <div class="content_block">
                                <h2 class="jquery_tab_title">添加父板块</h2>

                <div class="explain">
                    <ul>
                        <li>（*＾-＾*）</li>
                        <li>(o゜▽゜)o☆</li>
                        <li>(●'◡'●)</li>
                    </ul>
                </div>
        <div id="main">
        <form method="post">
                    <table class="au">
                        <tr>
                            <td>版块名称</td>
                            <td><input name="module_name" type="text" /></td>
                            <td>
                                版块名称不得为空，最大不得超过66个字符
                            </td>
                        </tr>
                        <tr>
                            <td>排序</td>
                            <td><input name="sort" value="0" type="text" /></td>
                            <td>
                                填写一个数字即可
                            </td>
                        </tr>
                    </table>
    <input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="添加" />
                </form>
            </div>
                                </div><!--end content_block-->
                                
                            </div><!-- end jquery_tab -->
                           
                        </div>
                        <!--end content-->
                        
                    </div><!--end main-->

<?php include 'inc/left.inc.php'?>
<?php include 'inc/footer.inc.php'?>
