
<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';
$template['title']='子版块列表';
if(isset($_POST['submit'])){
    //循环语句
    //$key代表id,$val代表sort
    //用var_dump()输出一下就了解了
    foreach($_POST['sort'] as $key=>$val){
        if(!is_numeric($val) || !is_numeric($key)){
			skip('son_module.php','error','排序错误！');
		}
        $query[]="update son_module set sort={$val} where id={$key}";
    }
if(execute_multi($link,$query,$error)){
    skip('son_module.php','ok','排序修改成功');
}else{
    skip('son_module.php','error',$error);
}
    }
?>
<?php include 'inc/header.inc.php'?>
            	<div id="bg_wrapper">
                
                    <div id="main">
                        <div id="content">
                            <div class="jquery_tab">
                                <div class="content_block">
                                    <h2 class="jquery_tab_title">子板块列表</h2>
                    
                                    <form method="POST">
        <table class="list">
            <tr>
                <th>排序</th>         
                <th>版块名称</th>
                <th>所属父板块</th>
                <th>版主</th>
                <th>操作</th>
            </tr>
            <?php
            //起一个别名，ssm代表son_module
            //sfm代表father_module
            $query="select ssm.id,ssm.sort,ssm.module_name,sfm.module_name father_module_name,ssm.member_id from son_module ssm,father_module sfm where ssm.father_module_id=sfm.id order by sfm.id";
            $result=execute($link,$query);
            while ($data=mysqli_fetch_assoc($result)){
            $url=urlencode("son_module_delete.php?id={$data['id']}");
            $return_url=urlencode($_SERVER['REQUEST_URI']);
            $message="要删除子版块 {$data['module_name']} 吗？";
            $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
$html=<<<A
              <tr>
                <td><input class="sort" type="text" name="sort[{$data['id']}]" value="{$data['sort']}" /></td>
                <td>{$data['module_name']}[id:{$data['id']}]</td>
                <td>{$data['father_module_name']}</td>
                <td>{$data['member_id']}</td>
                <td><a href="#">[访问]</a>&nbsp;&nbsp;<a href="son_module_update.php?id={$data['id']}">[编辑]</a>&nbsp;&nbsp;<a href="$delete_url">[删除]</a></td>
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