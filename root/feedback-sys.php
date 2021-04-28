<?php include('connect.php');?>
<?php include('constant.php');?>
<?php
	$to = $toInfo;
	$to = "pepperseeds@hotmail.com"; // This is test "Can Delete"
	
	$f_name = $_POST["f_name"];
	$f_email = $_POST['f_email'];
	$f_cmmt = $_POST['f_cmmt'];
	
		$f_name = str_replace("'", "&#39;", $f_name);
		$f_name = str_replace("\"", "&quot;", $f_name);
		$f_email = str_replace("'", "&#39;", $f_email);
		$f_email = str_replace("\"", "&quot;", $f_email);
		$f_cmmt = str_replace("'", "&#39;", $f_cmmt);
		$f_cmmt = str_replace("\"", "&quot;", $f_cmmt);
	

	date_default_timezone_set('Australia/Sydney');
	$dateOrd= date("Y-m-d");
	$timeOrd= date("H:i:s");
	$DateTime=$dateOrd." ".$timeOrd;
	
	
	$message = "<b><i>FEEDBACK</i> ::</b><br />
		<b>Name</b> : ".$f_name."<br /> 
		<b>Email</b> : ".$f_email."<br /> 
		<b>Comment</b> : ".$f_cmmt."<br /> 
		<b>Date</b> : ".$dateOrd;
	
			$sql="INSERT INTO feedback(
					f_name, 
					f_email, 
					f_cmmt,
					f_date
				)VALUES(
					'$f_name', 
					'$f_email', 
					'$f_cmmt',
					'$dateOrd'
				)";
			$result = mysql_query($sql);
		
	$subject = ":: FEEDBACK Form Customer :: ".$f_name."[ ".$shopName." ]" ;
	$headers  = "MIME-Version: 1.0 \r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	//$headers .= 'To:'.$to."\r\n";
	$headers .= 'From: '.$f_name.' <'.$f_email.">\r\n";
	
	if($f_name!=''){
		if(mail($to,$subject,$message,$headers))
		{
			header("Location:feedback.php?chkUpdate=1");
		}else{
			header("Location:feedback.php?chkUpdate=0");
		}
	}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />