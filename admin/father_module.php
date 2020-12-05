<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';
if(isset($_POST['submit'])){
    foreach($_POST['sort'] as $key=>$val){
        if(!is_numeric($val) || !is_numeric($key)){
			skip('father_module.php','error','排序错误！');
		}
        $query[]="update father_module set sort={$val} where id={$key}";
    }
if(execute_multi($link,$query,$error)){
    skip('father_module.php','ok','排序修改成功');
}else{
    skip('father_module.php','error',$error);
}
    }
    $template['title']='父板块列表页';
?>
<?php include 'inc/header.inc.php'?>
            	<div id="bg_wrapper">
                
                    <div id="main">
                        <div id="content">
                            <div class="jquery_tab">
                                <div class="content_block">
                                    <h2 class="jquery_tab_title">父板块列表</h2>
                    <div class="explain">
                        <ul>
                            <li>添加你所喜欢的φ(*￣0￣)</li>
                            <li>(o゜▽゜)o☆"(￣y▽,￣)╭ "</li>
                        </ul>
                    </div>
                <form method="POST">
        <table class="list">
            <tr>
                <th>排序</th>         
                <th>版块名称</th>
                <th>版主</th>
                <th>操作</th>
            </tr>
            <?php
            $query="select * from father_module";
            $result=execute($link,$query);
            while ($data=mysqli_fetch_assoc($result)){
            $url=urlencode("father_module_delete.php?id={$data['id']}");
            $return_url=urlencode($_SERVER['REQUEST_URI']);
            $message="要删除父版块 {$data['module_name']} 吗？";
            $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
$html=<<<A
              <tr>
                <td><input class="sort" type="text" name="sort[{$data['id']}]" value="{$data['sort']}" /></td>
                <td>{$data['module_name']}[id:{$data['id']}]</td>
                <td>暨南大学</td>
                <td><a href="#">[访问]</a>&nbsp;&nbsp;<a href="father_module_update.php?id={$data['id']}">[编辑]</a>&nbsp;&nbsp;<a href="$delete_url">[删除]</a></td>
             </tr>
A;
echo $html;
                        }
?>
        </table>
        <input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="排序" />
        </form>
                                </div><!--end content_block-->
                                
                            </div><!-- end jquery_tab -->
                            
                            
                            
                            
                            
                            
                            
                        
                        </div>
                        <!--end content-->
                        
                    </div><!--end main-->
<?php include 'inc/left.inc.php'?>
<?php include 'inc/footer.inc.php'?>