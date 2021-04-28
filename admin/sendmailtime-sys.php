<?php include("../connect.php"); ?>
<?php include('../constant.php');?>
<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../PHPMailer/src/Exception.php';
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';

$id = $_GET['id'];
$condition = $_GET['condition'];
$timesend = $_POST['time'];
$branch_id = $_GET['branch_id'];

$id = $_GET['id'];


$sql = "select * from orderno where id='$id'";
$rsl = mysql_query($sql);
$data = mysql_fetch_array($rsl);
	$cses=$data['ses_num'];
	$cchkSes=$data['chk_ses'];
	$choicedelivery=$data['ord_choicedelivery'];
	$addr=$data['ord_addr'];
	
	$emailCustomer=$data['ord_mail'];
	$cname=$data['ord_cname'];
?>
<?php  // Content Email

// $message=" TEST ";
$message="
<table width='600' border='0' cellpadding='0' cellspacing='0' style='font-size:12px; font-family:Arial, Helvetica, sans-serif;'>
  <tr>
    <!--<td width='180'><img src='".$urlLink."images/logo_mail.png' /></td>-->
    <td align='left' style='font-size:12px;'>
	
	<b style='font-size:16px;'>".$shopName." (@".$shopBranch[$branch_id].")</b><br />	
	Your order (".$titleOrderID.str_pad($data['id'],6,"0",STR_PAD_LEFT).") will take ";
	
	if(($data['ord_choicedelivery']!=1) && ($data['ord_choicedelivery']!=15)){
		$message.="<b><span style='font-size:16px;'>".$timesend."</span> for Delivery</b> <br />";
	} else {
		$message.="<b><span style='font-size:16px;'>".$timesend."</span> for Pick up</b> <br />";	
	}
	
	$message.="	
	For more query please contact wait staff.

    </td>
  </tr>
</table>";/**/

?>

<?php // Send Mail

$to = $emailCustomer; // to Customer
		
		$subject = "Your Order (".$titleOrderID.str_pad($data['id'],6,"0",STR_PAD_LEFT).") will take ".$timesend;

			if(($data['ord_choicedelivery']!=1) && ($data['ord_choicedelivery']!=15)){	
				$subject .=" for Delivery";
			} else {
				$subject .=" for Pick up";	
			}
		$subject .= " :: ".$shopName." (@".$shopBranch[$branch_id].") ::"; 
		
		
		$headers  = "MIME-Version: 1.0 \r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= 'From: '.$shopName.' Order Online <'.$mailforsend.'>' . "\r\n";		
		
		
		
	if($timesend!='') {
//		$sendmail = mail($to, $subject, $message, $headers);

		$sql = "UPDATE orderno SET 
					ord_chk='yes' 
				  WHERE id='$id' ";
		mysql_query($sql);

		$sql2 = "UPDATE orderno SET 
				timepickup='$timesend'
			WHERE id='$id'";
		$result = mysql_query($sql2);

		if($result){
			$phpMail = new PHPMailer(true);
			try{
				//Server settings
				$phpMail->SMTPDebug = 0;
				$phpMail->isSMTP();
				$phpMail->Host = 'webcloud43.au.syrahost.com';
				$phpMail->SMTPAuth = true;
				$phpMail->Username = 'eat@pepperseeds.com.au';
				$phpMail->Password = 'RRsport#0905';
				$phpMail->SMTPSecure = 'ssl';
				$phpMail->Port = 465;
				// $phpMail->SMTPSecure = 'tls';
                // $phpMail->Port = 587;


				//Recipients
				$phpMail->setFrom($mailforsend, $shopName." (".$shopBranch[$branch_id].') Order Online');
				$phpMail->addAddress($to, $cname);
//			$phpMail->addBCC($toInfo, 'Owner Email');

				//Content
				$phpMail->isHTML(true);                                  // Set email format to HTML
				$phpMail->Subject = $subject;
				$phpMail->Body    = $message;

				$phpMail->send();

				echo "success";

			} catch (Exception $e) {
				error_log('Message [mail time order] could not be sent. Mailer Error: '.$phpMail->ErrorInfo,0);
				echo "mailfail";
			}
		}else{
			echo "fail";
		}

	}

