<? include("../connect.php"); ?>
<? include('../constant.php');?>
<?

$id = $_GET['id'];
$condition = $_GET['condition'];
$timesend = $_POST['time'.$id];
$branch_id = $_GET['branch_id'];


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
<?  // Content Email

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

<? // Send Mail

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
		
		
		
	if($timesend!=''){
		mail($to,$subject,$message,$headers);

		$sql2="UPDATE orderno SET 
				timepickup='$timesend'
			WHERE id='$id'";
		$result=mysql_query($sql2);	
	}
	
	
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">  window.location="../menu_showOrderList.php?condition=<? echo $condition;?>&branch_id=<? echo $branch_id; ?>";</script>
<? } else { ?>
	Error Try again <a href="../menu_showOrderList.php?condition=<? echo $condition;?>&branch_id=<? echo $branch_id; ?>">Click Here</a>
<? } ?>

