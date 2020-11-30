<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$template['title']='管理员列表页';
$link=connect();
include_once 'inc/is_manage_login.inc.php';
?>
<?php include 'inc/header.inc.php'?>
<div id="bg_wrapper">
                
                    <div id="main">
                        <div id="content">
                            <div class="jquery_tab">
                                <div class="content_block">
                                    <h2 class="jquery_tab_title">管理员列表页</h2>
                    <div class="explain">
                    
                    </div>
          
        <table class="list">
            <tr>      
                <th>管理员名称</th>
                <th>管理等级</th>
                <th>创建日期</th>
                <th>操作</th>
            </tr>
            <?php
            $query="select * from manage";
            $result=execute($link,$query);
            while ($data=mysqli_fetch_assoc($result)){
                if($data['level']==0){
                    $data['level']='超级管理员';
                }else{
                    $data['level']='普通管理员';
                }
            $url=urlencode("manage_delete.php?id={$data['id']}");
            $return_url=urlencode($_SERVER['REQUEST_URI']);
            $message="要删除管理员 {$data['name']} 吗？";
            $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
$html=<<<A
              <tr>
                <td>{$data['name']}[id:{$data['id']}]</td>
                <td>{$data['level']}</td>
                <td>{$data['create_time']}</td>
                <td><a href="{$delete_url}">[删除]</a></td>
             </tr>
A;
echo $html;
                        }
?>
        </table>
                                </div><!--end content_block-->
                                
                            </div><!-- end jquery_tab -->
                            
                            
                            
                            
                            
                            
                            
                        
                        </div>
                        <!--end content-->
                        
                    </div><!--end main-->

<?php include 'inc/left.inc.php'?>
<?php include 'inc/footer.inc.php'?>