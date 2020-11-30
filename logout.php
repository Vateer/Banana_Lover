<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
setcookie('bbs[name]','',time()-3600);
setcookie('bbs[pw]','',time()-3600);
skip('index.php','ok','退出成功！');
?>