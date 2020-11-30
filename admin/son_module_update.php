<?php
//子板块编辑页面
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';
$template['title']='子版块编辑页面';
if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
    skip('father_module.php','error','id参数错误！');
}
$query="select * from son_module where id={$_GET['id']}";
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
    skip('son_module.php','error','这条板块信息不存在');
}

//修改加验证
//字符串类型的用在外面加上''，例如：module_name='{$_POST['module_name']}'
if(isset($_POST['submit'])){
    $check_flag='update';
    include 'inc/check_son_module.inc.php';
    $query="update son_module set father_module_id={$_POST['father_module_id']},module_name='{$_POST['module_name']}',info='{$_POST['info']}',member_id={$_POST['member_id']},sort={$_POST['sort']} where id={$_GET['id']}";
    execute($link,$query);
    if(mysqli_affected_rows($link)==1){
        skip('son_module.php','ok','恭喜你，修改成功！');
    }else{
        skip('son_module.php','error','对不起，修改失败，请重试！');
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
                                <h2 class="jquery_tab_title">修改子板块——<?php echo $data['module_name']?></h2>
                <div class="explain">
                    <ul>
                        <li>（*＾-＾*）</li>
                        <li>"*★,°*:.☆(￣▽￣)/$:*.°★* 。"</li>
                    </ul>
                </div>
        <div id="main">
        <form method="post">
                    <table class="au">
                    <tr>
                            <td>父板块</td>
                            <td>
                            <select name="father_module_id">
                                <option value="0">---选择一个父板块---</option>
                                <?php
                                $query="select * from father_module";
                                $result_father=execute($link,$query);
                                while($data_father=mysqli_fetch_assoc($result_father)){
                                    if($data['father_module_id']==$data_father['id']){
                                        echo "<option selected='selected' value='{$data_father['id']}'>{$data_father['module_name']}</option>";
                                    }else{
                                    echo "<option value='{$data_father['id']}'>{$data_father['module_name']}</option>";
                                }
                            }
                                ?>
</select>
</td>
                            <td>
                                选择要修改的父板块
                            </td>
                        </tr>
                        <tr>
                            <td>版块名称</td>
                            <td><input name="module_name" value="<?php echo $data['module_name']?>" type="text" /></td>
                            <td>
                                修改板块名称，最大不得超过66个字符
                            </td>
                        </tr>
                        <tr>
                            <td>板块简介</td>
                            <td>
                                <textarea name="info"><?php echo $data['info']?></textarea>
                            </td>
                            <td>
                                修改简介，不得多于255个字符
                            </td>
                        </tr>
                        <tr>
                            <td>版主</td>
                            <td>
                            <select name="member_id">
                                <option value="0">---选择一个版主---</option>
</select>
</td>
                            <td>
                                修改版主
                            </td>
                        </tr>
                        <tr>
                            <td>排序</td>
                            <td><input name="sort" value="<?php echo $data['sort']?>" type="text" /></td>
                            <td>
                                修改排序
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