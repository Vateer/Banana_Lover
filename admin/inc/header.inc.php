<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Reflect Template" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
       
        <title><?php echo $template['title'] ?></title>
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
                       欢迎 <a href=""><?php echo $_SESSION['manage']['name']?></a>
                   </span>
                   
                   <span class='memberinfo_span'>
                    <a href="index.php">设置</a>
                </span>
                
                <span>
                    <a href="logout.php">登出</a>
                </span>
                
                <span class='memberinfo_span2'>
                    <a href="">1 条私信</a>
                </span>
            </div>
            <!--end head_memberinfo-->
            </div>