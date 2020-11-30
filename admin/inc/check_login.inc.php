<?php
    if(empty($_POST['name'])){
      skip('login.php','error','用户名不得为空');
    }
    if(mb_strlen($_POST['name'])>32){
        skip('login.php','error','用户名不得多于32个字符');
    }
    if(mb_strlen($_POST['name'])<6){
        skip('login.php','error','密码不得少于6位');
    }

?>