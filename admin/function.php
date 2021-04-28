<?php
function uploadpic($nm,$tmp,$dir_l,$dir_s,$re_width,$re_height,$ext){
$uploadfile = $dir_l.basename($nm);
$thumbfile = $dir_s.$nm;
move_uploaded_file($tmp,$uploadfile);
list($w1,$h1) = getimagesize($uploadfile);
$w2 = $re_width;
$h2 = $re_height;
if($ext=="jpg" || $ext=="jpeg" || $ext=="JPG"){
$im = imageCreateTrueColor($w2,$h2);
$im1 = imageCreateFromJpeg($uploadfile);
imageCopyResampled($im,$im1,0,0,0,0,$w2,$h2,$w1,$h1);
imagejpeg($im,$thumbfile);
}else if($ext=="gif"){
$im = imageCreateTrueColor($w2,$h2);
$im1 = imageCreateFromGif($uploadfile);
imageCopyResampled($im,$im1,0,0,0,0,$w2,$h2,$w1,$h1);
imagegif($im,$thumbfile);
}else if($ext=="png"){
$im = imageCreateTrueColor($w2,$h2);
$im1 = imageCreateFromPng($uploadfile);
imageCopyResampled($im,$im1,0,0,0,0,$w2,$h2,$w1,$h1);
imagepng($im,$thumbfile);
}
	chmod($dir_s.$nm, 0644);
	
imagedestroy($im);
imagedestroy($im1);
}

function dateformat($data){
$exd = explode("-",$data);
$newdate = $exd[2]."/".$exd[1]."/".$exd[0];
return $newdate;
}

function dateformat_th($data){
$exd = explode("-",$data);
$year = $exd[0]+543;
$newdate = $exd[2]."/".$exd[1]."/".$year;
return $newdate;
}

#Function Cut Word 
function cutStr($str, $maxChars='', $holder=''){

    if (strlen($str) > $maxChars ){
			$str = iconv_substr($str, 0, $maxChars,"UTF-8") . $holder;
	} 
	return $str;
} 
?>