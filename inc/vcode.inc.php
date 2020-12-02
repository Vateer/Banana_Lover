<?php 
//实现验证码功能
function vcode($width=120,$height=40,$fontSize=30,$countElement=5,$countPixel=100,$countLine=4){
	//找到字体的绝对路径
	$fontpath=dirname(__FILE__).'\..\font\ManyGifts.ttf';
	$fontpath=realpath($fontpath);

	header('Content-type:image/jpeg');
	$element=array('a','b','c','d','e','f','g','h','i','j','k','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$string='';
	for ($i=0;$i<$countElement;$i++){
		$string.=$element[rand(0,count($element)-1)];
	}
	$img=imagecreatetruecolor($width, $height);
	$colorBg=imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255));
	$colorBorder=imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255));
	$colorString=imagecolorallocate($img,rand(10,100),rand(10,100),rand(10,100));
	imagefill($img,0,0,$colorBg);
	for($i=0;$i<$countPixel;$i++){
		imagesetpixel($img,rand(0,$width-1),rand(0,$height-1),imagecolorallocate($img,rand(100,200),rand(100,200),rand(100,200)));
	}
	for($i=0;$i<$countLine;$i++){
		imageline($img,rand(0,$width/2),rand(0,$height),rand($width/2,$width),rand(0,$height),imagecolorallocate($img,rand(100,200),rand(100,200),rand(100,200)));
	}
	//imagestring($img,5,0,0,'abcd',$colorString);
	imagettftext($img,$fontSize,rand(-5,5),rand(5,15),rand(30,35),$colorString,
	$fontpath,$string);	//使用相对路径打不开
	imagejpeg($img);
	imagedestroy($img);
	return $string;
}

// echo getcwd();
// echo "<br />";

// //获取某目录下所有文件、目录名（不包括子目录下文件、目录名）
// if ($handle = opendir('./font')) {
//     while (false !== ($entry = readdir($handle))) {
//         if ($entry != "." && $entry != "..") {
//             echo "$entry\n";
//         }
//     }
//     closedir($handle);
// }
vcode(100,40,30,4);
?>