<? include('connect.php');?>
<? include('constant.php');?>
<? 
	$uslogin = $_POST['boxUser'];
	$pwlogin = $_POST['boxPw'];
	
	
	$sqlChk = "SELECT * FROM branch WHERE branch_name='$uslogin'";
	$rslChk  = mysql_query($sqlChk);
	$dataChk = mysql_fetch_array($rslChk);
		$passwordAdmin = $dataChk['pw'];
		if($dataChk['id']!=''){
			
			if($pwlogin==$passwordAdmin){
				$_SESSION['sessionLogin']="admin";
				$_SESSION['adminBranchID']=$dataChk['id'];
			?>				
            	<SCRIPT LANGUAGE="JavaScript">window.location="index.php";</script>
			<? } else { ?>
				<SCRIPT LANGUAGE="JavaScript">window.location="login.php?chklogin=false";</script>
			<? }
			
		} else { ?>
			<SCRIPT LANGUAGE="JavaScript">window.location="login.php?chklogin=false";</script>
		<? }
?>