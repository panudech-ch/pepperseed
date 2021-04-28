<?php
	include('constant.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    date_default_timezone_set('Australia/Sydney');

$id = $intOrderID;   // Lastest ID 		
 
$sql = "select * from orderno where id='$id'";
$rsl = mysql_query($sql);
$data = mysql_fetch_array($rsl);
	$choicedelivery=$data['ord_choicedelivery'];
	$ord_payment = $data['ord_payment'];
	$branch_id =  $data['branch_id'];
	$addr=$data['ord_addr'];
	$promotion_code = $data['promotion_code'];
	$total_discount = $data['total_discount'];
	$total_charge = $data['total_charge'];
	
	$emailCustomer=$data['ord_mail'];
	$cname=$data['ord_cname'];
	
	/* ---- Area Price ---*/
	  $sqlArea = "select * from deliveryarea WHERE id = '$choicedelivery' ";
	  $rslArea = mysql_query($sqlArea);
	  $dataArea = mysql_fetch_array($rslArea);
	  		$area = $dataArea['area'];
	  		$charge_price = $dataArea['charge_price'];
	
?>
<?php  // Content Email

$message="<table width='600' border='0' cellpadding='0' cellspacing='0' style='font-size:12px; font-family:Arial, Helvetica, sans-serif;'>
      <tr>
        <td colspan='4'>
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td><img src='".$urlLink."images/logo_mail.png'  /></td>
    <td align='right' style='font-size:30px;'>".$shopName." (".$shopBranch[$branch_id].")"." </td>
  </tr>
</table>
<br><hr /><br>
        </td>
  </tr>
  <tr>
    <td><table width='600' border='0' cellpadding='0' cellspacing='0' style='font-size:12px;'>
      <tr>
        <td width='110' align='right'>Customer Name : </td>
        <td><b style='font-size:14px;'>".$data['ord_cname']."</b></td>
        <td width='70' align='right'>Order ID : </td>
        <td width='100'><b>";

$tmp= $titleOrderID.str_pad($data['id'],6,'0',STR_PAD_LEFT);
$message.=$tmp;
$message.="</b></td>
      </tr>
      <tr>
        <td align='right'>&nbsp;</td>
        <td>&nbsp;</td>
        <td align='right'></td>
        <td></td>
        </tr>
      <tr>
        <td align='right'>Delivery Address : </td>
        <td><b>";

if($data['ord_choicedelivery']!=1) { $message.= $data['ord_addr'].' ('.$area.')';} else { $message.= $area;}

if (($data['ord_payment'] != "Cash") && ($data['ord_payment'] != "")) {
	$arrPay = split('No.', $data['ord_payment']);
	$pay = substr(trim($arrPay[0]), 0, -1); //payment type
	$arrNo = split('Expiry Date', preg_replace('/(\[.*?\])/', '', $arrPay[1]));
	$dummy = "XXXX XXXX XXXX ";
	$no = substr(trim($arrNo[0]), -4); // pay no.
	$ord_payment = '<span class="text-font-bold">'.$pay . '</span><br>No. <span style="font-size:9px;" class="text-font-bold">' . $dummy . $no . '</span> <br>Expiry Date <span style="font-size:9px;" class="text-font-bold">XX/XX</span><br>CVV <span style="font-size:9px;" class="text-font-bold">XXX</span>';
	?>
<?php } else {
	$ord_payment = $dataOrd['ord_payment'];
}

$message.="</b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td align='right'>Email : </td>
        <td><b>".$data['ord_mail']."</b></td>
        <td align='right'>Date Order : </td>
        <td><b>".$data['ord_date']."</b></td>
        </tr>
      <tr>
        <td align='right'>Phone Number : </td>
        <td><b>".$data['ord_phone']."</b></td>
        <td align='right'>Time :</td>
        <td><b>".$data['ord_time']."</b></td>
        </tr>
      <tr>
        <td align='right'>Comment : </td>
        <td>".$data['ord_cmmt']."</td>
        <td align='right'>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td align='right'>Payment : </td>
        <td>".$ord_payment."</td>
        <td align='right'>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td align='right'>&nbsp;</td>
        <td>&nbsp;</td>
        <td align='right'>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td colspan='4' align='right'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
      <tr>
                    <td width='14' s>&nbsp;</td>
                    <td><strong style='font-size:16px;'>Order Detail</strong></td>
                    <td width='14'>&nbsp;</td>
  </tr>
                  <tr>
                    <td></td>
                    <td valign='top'>
<table width='100%' border='1' cellspacing='0' cellpadding='0' style='font-size:12px;'>";

$sql = "select * from ordermenu where OrderID='$id' ";
$rsl = mysql_query($sql);
while($data = mysql_fetch_array($rsl)){
	$pid = $data['p_id'];
	$rid = $data['id'];
	$chkChoice = $data['extra'];
	$chkChoiceSelect = $data['choice'];
	$chkChoiceSelect2 = $data['choice2'];
	
	$sql2 = "select * from products where id='$pid' "; //get data product for show
	$rsl2 = mysql_query($sql2);
	$data2 = mysql_fetch_array($rsl2);
		$catID = $data2['cat_id'];

	$sql3 = "SELECT * FROM catname WHERE id='$catID' ";
	$rsl3 = mysql_query($sql3);
	$data3 = mysql_fetch_array($rsl3);
		$catname = $data3['cat_name'];
		
		
	$message.="<tr>
                        <td align='left' valign='top' id='boxYourOrder' style='padding:3px;'>".$data['p_qty']." x <b>".$data2['p_name'];
	if($data2['p_subname']!=''){ $message.= ' - '.$data2['p_subname'];}
	
	$message.="</b>
		<span style='font-size:11px; font-style:italic;'>(".$catname.")"."</span>
		<div style='padding:3px 0 0 20px;'>";
		
	$extraprice = 0;
	$choiceprice = 0;
					if($chkChoiceSelect != ''){
							$message.='<b>Choice :</b> ';						
							$sql4 = "select * from  choice where id='$chkChoiceSelect' ";
							$rsl4 = mysql_query($sql4);
							$item4 = mysql_fetch_array($rsl4);
							$message.="<span style='font-size:11px; font-style:italic;'> ".$item4['choice_name']." ($".number_format($item4['choice_price'],2).")</span><br />";
							$choiceprice += $data['total_price'];
					}
				
					if($chkChoiceSelect2 != ''){
							$message.='<b>Choice :</b> ';						
							$sql4 = "select * from  choice2 where id='$chkChoiceSelect2' ";
							$rsl4 = mysql_query($sql4);
							$item4 = mysql_fetch_array($rsl4);
							$message.="<span style='font-size:11px; font-style:italic;'> ".$item4['choice_name']."</span><br />";
							$choiceprice += $data['total_price'];
					}
			
					if($chkChoice != ''){   // Show Choice Extra						
					$choice=explode(',',$chkChoice);
					$num = count($choice);
					$message.='<b>Extra :</b> <br />';
			
					for($i=0;$i<$num;$i++){	
						$selectChoice = $choice[$i];
						$sql_extra_total = "select * from ordermenu_extra where ordermenu_id = '$rid' and extra_id = '$selectChoice'";
						$rsl_extra_total = mysql_query($sql_extra_total);
						$extra_item = mysql_fetch_array($rsl_extra_total);

						$sql4 = "select * from  extra where id='$selectChoice' ";
						$rsl4 = mysql_query($sql4);
						$item4 = mysql_fetch_array($rsl4);
						$message.="<span style='font-size:11px; font-style:italic;'>- ".$item4['ex_name']." ($".number_format($item4['ex_price'],2).")</span><br />";
						$extraprice += $extra_item['total_price'];
					}
				}
				if($data['note'] != ''){
					$message.="<div style='padding:3px 0 0 0;'><b>Note :</b> <br /><span style='font-size:11px; font-style:italic;'>".$data['note']."</span></div>";
				}
		$message.="</td>
                        <td align='right' valign='top' width='100' style='padding:3px;'>$";
		$message.=number_format($pp = ($choiceprice > 0 ? $choiceprice + $extraprice : $data['total_price'] + $extraprice), 2);
		$subTotal += $pp;
		$message.="</td>
                   </tr>";
}


$message.="</table>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td height='2'></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align='right'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td align='right'>Sub&nbsp;total :</td>
    <td width='70' align='right' style='padding-right:5px;'><b>$".number_format($subTotal,2)."</b></td>
  </tr>";
  
    
//  	if($chkdiscount=='yes') {
//	$sumdiscount = ($subTotal*$discount)/100;
//	$subTotal = $subTotal-$sumdiscount;
//			$message.="<tr>
//				<td align='right' style='padding:5px 0 0 0;'>Discount ".$discount."% </td>
//				<td align='right' style='padding:5px 5px 0 0;'>- ".number_format($sumdiscount,2)."</td>
//			  </tr>";
//   }

	if($total_discount > 0) {
		$subTotal = ($subTotal - $total_discount);
		$message .= "<tr>
			<td align='right' style='padding:5px 0 0 0;' >Discount(promocode:" . $promotion_code . ")</td>
			<td align='right' style='padding:5px 5px 0 0;' >$" . number_format($total_discount, 2) . "</td>
		</tr>";
	}

	if($total_charge > 0){
		$message.="<tr>
							<td align='right' style='padding:5px 0 0 0;'>Charge (Order total < $35) :</td>";
		$message.="<td align='right' style='padding:5px 5px 0 0;'><b> $".$total_charge." </b> </td></tr>";
		$subTotal += $total_charge;
	}

     if(($canOrderUnderMinPrice == 'yes') && ($subTotal<=$minimumPrice) && ($subTotal!=0) && ($area!='Pick Up at Shop')) {
			$subTotal = $subTotal+$OrderUnderMinPrice;		
			  $message.="<tr>
				<td align='right' style='padding:5px 0 0 0;'>Delivery Fee : </td>
				<td align='right' style='padding:5px 5px 0 0;'> $".number_format($OrderUnderMinPrice,2)."</td>
			  </tr>";
				}

				
		if($area!=''){ 
			  $message.="<tr>
				<td colspan='2' align='right' style='padding:5px 5px 0 0;'>Delivery Area ( <i>".$area."</i> ";
				$message .= "($" . number_format($charge_price, 2) . ")";
				$subTotal += $charge_price;
				$message.= " )  </td>
				</tr>";
		}
  
		  if(($ord_payment!="Cash") && ($ord_payment!="") && ($surchargePercent!=0)) {
		  $message.="<tr>
			<td align='right' style='padding:5px 0 0 0;'>Credit Card Surcharge (".$surchargePercent."%) : </td>
			<td align='right' style='padding:5px 5px 0 0;'> $";
			$surcharge = $subTotal*($surchargePercent/100);
			$subTotal+=$surcharge;
			$message.=number_format($surcharge,2)."</td>
		  </tr>";
		  }
  

$message.="
  <tr>
    <td align='right' id='lineMenuList'><img src='images/spacer.gif' width='5' height='5' /></td>
    <td align='right' id='lineMenuList'><img src='images/spacer.gif' width='5' height='5' /></td>
  </tr>
  <tr>
    <td align='right' style='padding-top:5px;'><b style='font-size:14px;'>Total :</b></td>
    <td align='right' style='padding:5px 5px 0 0;'><b style='font-size:14px;'>$".number_format($subTotal,2)."</b></td>
  </tr>
  <tr>
  	<td colspan='2' align='right' style='padding:5px 5px 0 0;'>";
    	/*if($subTotal>=$overcon2) { $message.='<b>FREE</b> '.$overcon2Free; } 
		else if($subTotal>=$overcon1) { $message.='<b>FREE</b> '.$overcon1Free; }*/
$message.="</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<br />
</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>&nbsp;</td>
                  </tr>
</table></td>
        </tr>
    </table></td>
  </tr>
</table>";

?>

<?php // Send Mail

$to = $emailCustomer; // to Customer
		
	$subject = "Order Detail (".$cname.") ".$titleOrderID.str_pad($id,6,"0",STR_PAD_LEFT)." :: ".$shopName." (".$shopBranch[$branch_id].") ::";

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
        $phpMail->addBCC($toInfo, 'Owner Email');

        //Content
        $phpMail->isHTML(true);                                  // Set email format to HTML
        $phpMail->Subject = $subject;
        $phpMail->Body    = $message;

        $phpMail->send();
    } catch (Exception $e) {
        error_log('Message could not be sent. Mailer Error: '.$phpMail->ErrorInfo,0);
    }

?>

