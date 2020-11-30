<?php
//子板块添加页面
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';
$template['title']='站点设置';
$query="select * from info where id=1";
$result_info=execute($link,$query);
$data_info=mysqli_fetch_assoc($result_info);
if(isset($_POST['submit'])){
    $_POST=escape($link,$_POST);
	$query="update info set title='{$_POST['title']}',keywords='{$_POST['keywords']}',description='{$_POST['description']}' where id=1";
	execute($link, $query);
	if(mysqli_affected_rows($link)==1){
		skip('web_set.php','ok','修改成功！');
	}else{
		skip('web_set.php','error','修改失败,请重试！');
	}
}
?>
<?php include 'inc/header.inc.php'?>
<div id="bg_wrapper">     
                <div id="main">
                    <div id="content">
                        <div class="jquery_tab">
                            <div class="content_block">
                                <h2 class="jquery_tab_title">网站设置</h2>
                <div class="explain">
                    <ul>
                        <li>添加你所喜欢的（*＾-＾*）</li>
                        <li>"*★,°*:.☆(￣▽￣)/$:*.°★* 。"</li>
                    </ul>
                </div>
        <div id="main">
        <form method="post">
                    <table class="au">
                        <tr>
                            <td>网站标题</td>
                            <td><input name="title" type="text" value="<?php echo $data_info['title']?>"/></td>
                            <td>
                                前台页面里网站标题
                            </td>
                        </tr>
                        <tr>
                            <td>关键字</td>
                            <td><input name="keywords" type="text" value="<?php echo $data_info['keywords']?>" /></td>
                            <td>
                                关键字
                            </td>
                        </tr>
                        <tr>
                            <td>描述</td>
                            <td>
                                <textarea name="description"><?php echo $data_info['description']?></textarea>
                            </td>
                            <td>
                            不得多于255个字符
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