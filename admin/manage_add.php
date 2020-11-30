<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$template['title']='管理员添加页';
$link=connect();
include_once 'inc/is_manage_login.inc.php';
if(isset($_POST['submit'])){
    $check_flag='add';
    include 'inc/check_manage.inc.php';
    $query="insert into manage(name,pw,create_time,level) values('{$_POST['name']}',md5({$_POST['pw']}),now(),{$_POST['level']})";
    execute($link,$query);
if(mysqli_affected_rows($link)==1){
    skip('manage.php','ok','恭喜你，添加成功！');
}else{
    skip('manage.php','error','对不起，添加失败，请重试！');
}
}
?>
<?php include 'inc/header.inc.php'?>
<div id="bg_wrapper">     
                <div id="main">
                    <div id="content">
                        <div class="jquery_tab">
                            <div class="content_block">
                                <h2 class="jquery_tab_title">添加管理员</h2>

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
                            <td>管理员名称</td>
                            <td><input name="name" type="text" /></td>
                            <td>
                                名称不得为空
                            </td>
                        </tr>
                        <tr>
                            <td>密码</td>
                            <td><input name="pw"  type="text" /></td>
                            <td>
                                密码不得低于六位
                            </td>
                        </tr>
                        <tr>
                            <td>等级</td>
                            <td>
                                <select name="level">
                                <option value="1">普通管理员</option>
                                <option value="0">超级管理员</option>
                                </select>
                            </td>
                            <td>
                                请选择一个等级
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
