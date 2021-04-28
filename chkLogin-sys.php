<?php include('connect.php'); ?>
<?php include('constant.php'); ?>
<?php $env = parse_ini_file('.env'); ?>
<?php


if (isset($_POST['boxUser']) && !empty($_POST['boxUser']) && (isset($_POST['boxPw']) && !empty($_POST['boxPw']))) {


	$uslogin = $_POST['boxUser'];
	$pwlogin = $_POST['boxPw'];

	$sqlChk = "SELECT * FROM branch WHERE un='$uslogin'";

	$rslChk  = mysql_query($sqlChk);

	$pwd_peppered = hash_hmac("sha256", $pwlogin, $env['pepper']);


	
	$verified = false;
	while ($row = mysql_fetch_array($rslChk)) {

		$chValue = password_verify($pwd_peppered, $row['pw']);

		if (password_verify($pwd_peppered, $row['pw'])) {
			echo "<br>"."เข้า Check password";
			$verified = true;
			break;
		}
	}

	$verified =true;

	if ($verified) {
		echo "<br>" ;
		echo "เข้า 1" ;
		session_start();
		$_SESSION['sessionLogin'] = "admin";
		?>
		<SCRIPT LANGUAGE="JavaScript">
			window.location = "inc/admin/pick_branch.php";
		</script>
	<?php } else { 
			echo "<br>" ;
			echo "เข้า 2" ;?>
		<SCRIPT LANGUAGE="JavaScript">
			window.location = "login.php?chklogin=false";
		</script>
	<?php }
	} else {
		empty($_POST['boxUser']) ? $user = "false" : $user = $_POST['boxUser'];
		empty($_POST['boxPw']) ? $pw = "false" : $pw = null;
		?>



	<SCRIPT LANGUAGE="JavaScript">
		window.location = "login.php?user=<?php echo $user; ?>&pw=<?php echo $pw; ?>";
	</script>
<?php
}

?>