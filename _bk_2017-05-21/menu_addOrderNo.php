<? include('connect.php'); ?>
<? include('constant.php'); ?>
<?	$branch_id = $_GET['branch_id'];
	$area = $_SESSION['area'];
	$addr = $_POST["address"];
	$cname = $_POST["cname"];
	$mail = $_POST["email"];
	$phone = $_POST["phone"];
	$cmmt = $_POST["comment"];	
    $payment = $_POST['pay'];
	$paymentall = $payment;
	$ordertime=$_SESSION['ordertime'];
				
		/*	*/	
      	if($payment == "Master Card"){
			$carno = $_POST["master"];  $expirm = $_POST["masterm"];   $expiry = $_POST["mastery"];
			$paymentall = $payment." / No.".$carno." [Expiry Date ".$expirm."/".$expiry."]";
		}	
      	if($payment == "Visa"){
			$carno = $_POST["visa"];  $expirm = $_POST["visam"];   $expiry = $_POST["visay"];
			$paymentall = $payment." / No.".$carno." [Expiry Date ".$expirm."/".$expiry."]";
		}		
      	if($payment == "Eftpos"){
			$carno = $_POST["eftpos"];  $expirm = $_POST["eftposm"];   $expiry = $_POST["eftposy"];
			$paymentall = $payment." / No.".$carno." [Expiry Date ".$expirm."/".$expiry."]";
		}	
      	if($payment == "AMEX"){
			$carno = $_POST["amex"];  $expirm = $_POST["amexm"];   $expiry = $_POST["amexy"];
			$paymentall = $payment." / No.".$carno." [Expiry Date ".$expirm."/".$expiry."]";
		}		
	
	date_default_timezone_set('Australia/Sydney');
	$dateOrd= date(" j / n / Y");
	$timeOrd= date(" g:i a");
	
	if(($cname!='') && ($_SESSION['area']!='')){
		
		$sqlAdd="INSERT INTO orderno(
			ord_choicedelivery, 
			ord_addr,  
			ord_cname, 
			ord_mail, 
			ord_phone, 
			ord_cmmt, 
			ord_payment, 
			ord_date, 
			ord_time,
			branch_id,
			ord_ordertime
		)VALUES(
			'$area', 
			'$addr', 
			'$cname', 
			'$mail', 
			'$phone', 
			'$cmmt', 
			'$paymentall',
			'$dateOrd', 
			'$timeOrd', 
			'$branch_id', 
			'$ordertime'
		)";
	$result=mysql_query($sqlAdd);
	
		$intOrderID = mysql_insert_id(); // Get  Lastest ID 		
		$strSQL = "UPDATE ordermenu SET OrderID = '".$intOrderID."' ,ses_num = ''  WHERE ses_num = '".session_id()."'  ";
		$objQuery = mysql_query($strSQL);	
		$sessionLogin = $_SESSION['sessionLogin'];
		session_unset();			
		$_SESSION['sessionLogin']=$sessionLogin;
		
		include("menu_orderMail-sys.php");
		
		?>
        <SCRIPT LANGUAGE="JavaScript">window.location="menu4.php?OrderID=<? echo $intOrderID;?>&branch_id=<? echo $branch_id; ?>&ordertime=<? echo $ordertime;?>";</script>
<?
	} else { ?>
		<SCRIPT LANGUAGE="JavaScript">window.location="menu.php?branch_id=<? echo $branch_id; ?>&ordertime=<? echo $ordertime;?>";</script>
<?	}	
	// End Data	
?>
      