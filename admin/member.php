<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';
$template['title']='用户列表';
?>
<?php include 'inc/header.inc.php'?>
            	<div id="bg_wrapper">
                
                    <div id="main">
                        <div id="content">
                            <div class="jquery_tab">
                                <div class="content_block">
                                    <h2 class="jquery_tab_title">用户列表</h2>
                    
                <form method="POST">
        <table class="list">
        <?php 
                $query="select * from member";
                $result_member=execute($link,$query);
                while($data_member=mysqli_fetch_assoc($result_member)){
        ?>
            <tr>
                <th>会员名称</th>   
                <td>
                <?php echo $data_member['name']?>
                </td>      
                <th>注册时间</th>
                <td>
                <?php echo $data_member['register_time']?>
                </td>
            </tr>
                <?php }?>
        </table>
        </form>
                                </div><!--end content_block-->
                                
                            </div><!-- end jquery_tab -->
                            
                            
                            
                            
                            
                            
                            
                        
                        </div>
                        <!--end content-->
                        
                    </div><!--end main-->
<?php include 'inc/left.inc.php'?>
<?php include 'inc/footer.inc.php'?>