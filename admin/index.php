<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';

$query="select * from manage where id={$_SESSION['manage']['id']}";
$result_manage=execute($link, $query);
$data_manage=mysqli_fetch_assoc($result_manage);
if($data_manage['level']=='0'){
	$data_manage['level']='超级管理员';
}else{
	$data_manage['level']='普通管理员';
}

$query="select count(*) from father_module";
$count_father_module=num($link,$query);

$query="select count(*) from son_module";
$count_son_module=num($link,$query);

$query="select count(*) from content";
$count_content=num($link,$query);

$query="select count(*) from reply";
$count_reply=num($link,$query);
                            
$query="select count(*) from member";
$count_member=num($link,$query);

$query="select count(*) from manage";
$count_manage=num($link,$query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Reflect Template" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
        <title>后台首页</title>
        <link rel="stylesheet" href="css/style_all.css" type="text/css" media="screen" />
  
        
        
        <!-- to choose another color scheme uncomment one of the foloowing stylesheets and wrap styl1.css into a comment -->
        <link rel="stylesheet" href="css/style8.css" type="text/css" media="screen" />
        
        <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="screen" />
        
        <link rel="stylesheet" href="ueditor1_2_2_0-utf8-php/themes/default/ueditor.css" type="text/css" media="screen" />
        
        <!--Internet Explorer Trancparency fix-->
        <!--[if IE 6]>
        <script src="js/ie6pngfix.js"></script>
        <script>
          DD_belatedPNG.fix('#head, a, a span, img, .message p, .click_to_close, .ie6fix');
        </script>
        <![endif]--> 
        
        <script type='text/javascript' src='js/all-ck.js'></script>
        <script type='text/javascript' src='ueditor1_2_2_0-utf8-php/editor_config.js'></script>
        <script type='text/javascript' src='js/custom.js'></script>
    </head>
    
    <body>
        <div id="top">
            <div id="head">
                <h1 class="logo">
                    <a href="index.php"></a>
                </h1>
                <div class="head_memberinfo">
                    <div class="head_memberinfo_logo">
                        <span>1</span>
                        <img src="images/unreadmail.png" alt=""/>
                    </div>
                    
                    <span class='memberinfo_span'>
                       欢迎 <a href="index.php">且听风吟</a>
                   </span>
                <span>
                    <a href="logout.php">登出</a>
                </span>

                <span class='memberinfo_span2'>
                    <a href="index.php">1 条私信</a>
                </span>
            </div>
            <!--end head_memberinfo-->
            
        </div>
            <!--end head-->
           	
            	<div id="bg_wrapper">
                
                    <div id="main">
                        <div id="content">

                                    <h2 class="jquery_tab_title">快速入口</h2>
                                    
                                    <a class="dashboard_button button1" href="index.php">
                                        <span class="dashboard_button_heading">系统信息</span>
                                        <span>查看系统信息</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button2" href="manage.php">
                                        <span class="dashboard_button_heading">管理员</span>
                                        <span>查看当前管理员</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button3" href="manage_add.php">
                                        <span class="dashboard_button_heading">添加管理员</span>
                                        <span>添加一个新的用户</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button4" href="father_module_add.php">
                                        <span class="dashboard_button_heading">添加父板块</span>
                                        <span>添加父板块</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button5" href="father_module.php">
                                        <span class="dashboard_button_heading">父板块列表</span>
                                        <span>搜索已经存在的父板块列表</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button7" href="son_module.php">
                                        <span class="dashboard_button_heading two_lines">子版块列表</span>
                                        <span>查看子版块列表</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button8" href="son_module_add.php">
                                        <span class="dashboard_button_heading">添加子版块</span>
                                        <span>添加子版块</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button9" href="../index.php">
                                        <span class="dashboard_button_heading two_lines">帖子管理</span>
                                        <span>对帖子进行管理</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button10" href="member.php">
                                        <span class="dashboard_button_heading two_lines">用户列表</span>
                                        <span>查看用户</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button11" href="#">
                                        <span class="dashboard_button_heading">画廊</span>
                                        <span>管理您的图片库</span>
                                    </a><!--end dashboard_button-->
                                    
                                    <a class="dashboard_button button12" href="#">
                                        <span class="dashboard_button_heading">帮助</span>
                                        <span>如有问题，请点击</span>
                                    </a><!--end dashboard_button-->
                                    
                            <h2>当前管理员</h2>
                            <div>
                                <p>
                                    你好 管理员:<?php echo $_SESSION['manage']['name']?>
                                </p>
                                <p>
                                    你的管理等级为:<?php echo $data_manage['level']?>
                                </p>
                                <p>
                                    创建时间为:<?php echo $data_manage['create_time']?>
                                </p>
                            </div>
                            <h2>统计信息</h2>
                            <div>
                                <table>
                                    <tr>
                                        <th class="specalt">父版块 </th>
                                        <td><?php echo $count_father_module?></td>
                                        <th class="specalt">子版块</th>
                                        <td><?php echo $count_son_module?></td>
                                        <th class="specalt">帖子</th>
                                        <td><?php echo $count_content?></td>
                                        <th class="specalt">回复</th>
                                        <td><?php echo $count_reply?></td>
                                        <th class="specalt">会员</th>
                                        <td><?php echo $count_member?></td>
                                        <th class="specalt">管理员</th>
                                        <td><?php echo $count_manage?></td>
                                    </tr>
                                </table>
                            </div>

                            <h2>系统信息</h2>
                            <div>
                                <table>
                                    <tr>
                                        <th class="specalt">服务器操作系统： </th>
                                        <td><?php echo PHP_OS?></td>
                                        <th class="specalt">服务器软件：</th>
                                        <td><?php echo $_SERVER['SERVER_SOFTWARE']?></td>
                                        <th class="specalt">MySQL 版本： </th>
                                        <td><?php echo  mysqli_get_server_info($link)?></</td>
                                        <th class="specalt">最大上传文件：</th>
                                        <td><?php echo ini_get('upload_max_filesize')?></td>
                                        <th class="specalt">内存限制：</th>
                                        <td><?php echo ini_get('memory_limit')?></td>
                                    </tr>
                                </table>
                            </div>
                            <h2>程序信息</h2>
                            <div>
                               <table>
                                   <tr>
                                       <th class="specalt">程序安装位置(绝对路径)</th>
                                       <td><?php echo SA_PATH?></td>
                                       <th class="specalt">程序在web根目录下的位置(首页的url地址)：</th>
                                       <td><?php echo SUB_URL?></td>
                                   </tr>
                                   <tr>
                                       <th class="specalt">程序作者：且听风吟</th>
                                       <td>作者喜欢旅游，是个吃货</td>
                                   </tr>
                               </table>
                            </div>
                            <h2>安全信息</h2>
                            <div>
                                <table>
                                    <tr>
                                        <th class="specalt">SQL注入</th>
                                        <td>无</td>
                                        <th class="specalt">XSS攻击</th>
                                        <td>无</td>
                                    </tr>
                                    <tr>
                                        <th class="specalt">最近检查日期:</th>
                                        <td>2019-05-06</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--end content-->
                        
                    </div><!--end main-->
                    
                    <div id="sidebar">
                        <ul class="nav">
                            <li><a class="headitem item1" href="#">系统</a>
                                <ul><!-- ul items without this class get hiddden by jquery-->
                                    <li><a href="index.php">系统信息</a></li>
                                    <li><a href="manage.php">管理员</a></li>
                                    <li><a href="manage_add.php">添加管理员</a></li>
                                    <li><a href="web_set.php">站点设置</a></li>
                                </ul>
                            </li>
                            <li><a class="headitem item4" href="#">内容管理</a>
                                <ul>
                                    <li><a href="father_module.php">父板块列表</a></li>
                                    <li><a href="father_module_add.php">添加父板块</a></li>
                                    <li><a href="son_module.php">子版块列表</a></li>
                                    <li><a href="son_module_add.php">添加子版块</a></li>
                                    <li><a href="../index.php">帖子管理</a></li>
                                </ul>
                            </li>
                            <li><a class="headitem item5" href="#">用户搜索</a>
                                <ul>
                                    <li><a href="member.php">用户列表</a></li>
                                </ul>
                            </li>
                            <!--end subnav-->

                        <div class="flexy_datepicker"></div>

                        <ul>
                            <li><a class="headitem item7" href="#">博客浏览</a>
                                <ul>
                                    <li><a href="https://bealright.github.io/">博客</a></li>
                                </ul>
                            </li>
                        </ul>     

                </div>
                    <!--end sidebar-->
                        
                     </div><!--end bg_wrapper-->
                     
                <div id="footer" style="color: #fff;text-align: center">
                TRY YOUR BEST!!!<a href="https://bealright.github.io/" target="_blank" title="且听风吟">且听风吟</a>
                </div><!--end footer-->
                
        </div><!-- end top -->
        
    </body>
    
</html>