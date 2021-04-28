<? include('connect.php'); ?>
<? include('constant.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="css/master.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
<style type="text/css">
body {
	background-image:none;
}
</style>
<?

	
	$monthshow[1] = "JAN"; 
	$monthshow[2] = "FEB"; 
	$monthshow[3] = "MAR"; 
	$monthshow[4] = "APR"; 
	$monthshow[5] = "MAY"; 
	$monthshow[6] = "JUN"; 
	$monthshow[7] = "JUL"; 
	$monthshow[8] = "AUG"; 
	$monthshow[9] = "SEP"; 
	$monthshow[10] = "OCT"; 
	$monthshow[11] = "NOV"; 
	$monthshow[12] = "DEC"; 
	
	$monthshowFull[1] = "January"; 
	$monthshowFull[2] = "February"; 
	$monthshowFull[3] = "March"; 
	$monthshowFull[4] = "April"; 
	$monthshowFull[5] = "May"; 
	$monthshowFull[6] = "June"; 
	$monthshowFull[7] = "July"; 
	$monthshowFull[8] = "August"; 
	$monthshowFull[9] = "September"; 
	$monthshowFull[10] = "October"; 
	$monthshowFull[11] = "November"; 
	$monthshowFull[12] = "December"; 
?>
</head>

<body>
<ul style="list-style-image:url(images/icoList.gif); margin:0; padding:0 0 0 17px;">
<? 
	$sqlFB = "SELECT * FROM feedback ORDER BY id DESC ";
	$rslFB = mysql_query($sqlFB);
	while($dataFB = mysql_fetch_array($rslFB)){
		if(($_SESSION['sessionLogin']=="admin") or ($dataFB['f_show']==1)){ 
?>
	<li>
    <? if($_SESSION['sessionLogin']=="admin"){
			if($dataFB['f_show']=='0'){ ?>
			<a href="admin/showfeedback.php?value=1&id=<? echo $dataFB['id']; ?>"><img src="images/f_hidden.png" align="absmiddle" /></a>
	<?	} else { ?>
			<a href="admin/showfeedback.php?value=0&id=<? echo $dataFB['id']; ?>"><img src="images/f_show.png" align="absmiddle" /></a>
			
	<?	}	?>    	
    <? } ?>
    <b><? echo $dataFB['f_name']; ?></b><br />
    <? echo $dataFB['f_cmmt']; ?><br />
    <?  $date=explode("-",$dataFB['f_date']); echo $date[2]." ".$monthshow[intval($date[1])]." ".$date[0];?>
<? } } ?>

</ul>
</body>
</html>