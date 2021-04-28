<? include("connect.php"); ?>
<? include('constant.php');?>
<? if($_SESSION['sessionLogin']!="admin" ){ header("location:index.php"); }?>
<?
$id = $_GET['id'];
$sql="UPDATE orderno SET 
		ord_chk='yes' 
	WHERE id='$id' ";
mysql_query($sql);

$sql = "select * from orderno where id='$id'";
$rsl = mysql_query($sql);
$data = mysql_fetch_array($rsl);
	$choicedelivery=$data['ord_choicedelivery'];
	$ord_payment = $data['ord_payment'];
	$branch_id =  $data['branch_id'];
	
	/* ---- Area Price ---*/
	  $sqlArea = "select * from deliveryarea WHERE id = '$choicedelivery' ";
	  $rslArea = mysql_query($sqlArea);
	  $dataArea = mysql_fetch_array($rslArea);
	  		$area = $dataArea['area'];
	  		$charge_price = $dataArea['charge_price'];
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="600" border="0" cellpadding="0" cellspacing="0" style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">
      <tr>
        <td colspan="4">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<? echo $urlLink;?>images/logo_mail.png"  /></td>
    <td align="right" style="font-size:30px;"><? echo $shopName." (".$shopBranch[$branch_id].")"; ?><br />
      <!--<span style="font-size:14px;">(<? if($data['ord_ordertime']==''){ echo "DINNER";} else { echo strtoupper($data['ord_ordertime']);} ?>)</span>--></td>
  </tr>
</table>
<br><hr /><br>
        </td>
  </tr>
  <tr>
    <td><table width="600" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
      <tr>
        <td width="110" align="right">Customer Name : </td>
        <td><b style="font-size:14px;"><?=$data['ord_cname'];?></b></td>
        <td width="70" align="right">Order ID : </td>
        <td width="100"><b><? echo $titleOrderID.str_pad($data['id'],6,"0",STR_PAD_LEFT);?></b></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"></td>
        <td></td>
        </tr>
      <tr>
        <td align="right">Delivery Address : </td>
        <td><b><? if($data['ord_choicedelivery']!=1) { echo $data['ord_addr']." (".$area.")";} else {echo $area;}?></b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td align="right">Email : </td>
        <td><b><?=$data['ord_mail']; ?></b></td>
        <td align="right">Date Order : </td>
        <td><b><?=$data['ord_date'];?></b></td>
        </tr>
      <tr>
        <td align="right">Phone Number : </td>
        <td><b><?=$data['ord_phone'];?></b></td>
        <td align="right">Time :</td>
        <td><b><?=$data['ord_time'];?></b></td>
        </tr>
      <tr>
        <td align="right">Comment : </td>
        <td><?=$data['ord_cmmt'];?></td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td align="right">Payment : </td>
        <td><?=$data['ord_payment'];?></td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td colspan="4" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
                    <td width="14" s>&nbsp;</td>
                    <td><strong style="font-size:16px;">Order Detail</strong></td>
                    <td width="14">&nbsp;</td>
  </tr>
                  <tr>
                    <td class="bgBoxWelcome"></td>
                    <td valign="top" class="bgBoxWelcome">
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:12px;">

<?

$sql = "select * from ordermenu where OrderID='$id' ";
$rsl = mysql_query($sql);
while($data = mysql_fetch_array($rsl)){
	$pid = $data['p_id'];
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
?>
					<tr>
                        <td align="left" valign="top" id="boxYourOrder" style="padding:3px;">                        
                        <? echo $data['p_qty'];?> x <b><? echo $data2['p_name'];?><? if($data2['p_subname']!=''){ echo " - ".$data2['p_subname'];}?></b>
		<span style="font-size:11px; font-style:italic;"><? echo "(".$catname.")";?></span>
		<div style="padding:3px 0 0 20px;">
        	<?		$extraprice = 0;
				
					if($chkChoiceSelect != ''){
							echo "<b>Choice :</b> ";						
							$sql4 = "select * from choice where id='$chkChoiceSelect' ";
							$rsl4 = mysql_query($sql4);
							$item4 = mysql_fetch_array($rsl4);
							echo "<span style='font-size:11px; font-style:italic;'> ".$item4['choice_name']." ($".number_format($item4['choice_price'],2).")</span><br />";
							$extraprice += $item4['choice_price'];
					}
				
					if($chkChoiceSelect2 != ''){
							echo "<b>Choice :</b> ";						
							$sql4 = "select * from choice2 where id='$chkChoiceSelect2' ";
							$rsl4 = mysql_query($sql4);
							$item4 = mysql_fetch_array($rsl4);
							echo "<span style='font-size:11px; font-style:italic;'> ".$item4['choice_name']."</span><br />";
							$extraprice += $item4['choice_price'];
					}
			
					if($chkChoice != ''){   // Show Choice Extra						
					$choice=explode(",",$chkChoice);
					$num = count($choice);
					echo "<b>Extra :</b> ";
			
					for($i=0;$i<$num;$i++){	
						$selectChoice = $choice[$i];					
						$sql4 = "select * from  extra where id='$selectChoice' ";
						$rsl4 = mysql_query($sql4);
						$item4 = mysql_fetch_array($rsl4);
						echo "<span style='font-size:11px; font-style:italic;'> ".$item4['ex_name']." ($".number_format($item4['ex_price'],2).")</span><br />";
						$extraprice += $item4['ex_price'];
					}
				}
			?>
            <?
            	if($data['p_cmmt'] != ''){
					echo "<div style='padding:3px 0 0 0;'><b>Comment :</b> <br /><span style='font-size:11px; font-style:italic;'>".$data['p_cmmt']."</span></div>";
				}
			?></td>
                        <td align="right" valign="top" width="100" style="padding:3px;">$<? echo number_format($pp=(($data2['p_price']+$extraprice)*$data['p_qty']),2); $subTotal += $pp ?></td>
                   </tr>

<? } ?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="2"></td>
  </tr>
  <tr>
    <td id="boxResult">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" id="boxResult"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px;">
  <tr>
    <td align="right">Sub&nbsp;total :</td>
    <td width="70" align="right" style="padding-right:5px;"><b>$<? echo number_format($subTotal,2);?></b></td>
  </tr>
  
    
  <? 
  	if($chkdiscount=='yes') {
	$sumdiscount = ($subTotal*$discount)/100;
	$subTotal = $subTotal-$sumdiscount;
  ?>
  <tr>
    <td align="right" style="padding:5px 0 0 0;">Discount <? echo $discount; ?>% </td>
    <td align="right" style="padding:5px 5px 0 0;">- $<? echo number_format($sumdiscount,2);?></td>
  </tr>
  <? } ?>
  
  
  
  
  
  <? 
  	if(($canOrderUnderMinPrice == "yes") && ($subTotal<=$minimumPrice) && ($subTotal!=0) && ($area!="Pick Up at Shop")) {
	$subTotal = $subTotal+$OrderUnderMinPrice;
  ?>
  <tr>
    <td align="right" style="padding:5px 0 0 0;">Delivery Fee : </td>
    <td align="right" style="padding:5px 5px 0 0;"> $<? echo number_format($OrderUnderMinPrice,2);?></td>
  </tr>
  <? } ?>  
  
  <? if($area!=''){ ?>
  <tr>
    <td colspan="2" align="right" style="padding:5px 5px 0 0;">Delivery Area ( <i><? echo $area; ?><? echo "($".number_format($charge_price,2).")";  $subTotal+=$charge_price; ?></i> ) </td>
    
    </tr>
  <? } ?>
  
  <? if(($ord_payment!="Cash") && ($ord_payment!="") && ($surchargePercent!=0) && ($subTotal<=20)) {?>
  <tr>
    <td align="right" style="padding:5px 0 0 0;">Credit Card Surcharge (<? echo $surchargePercent; ?>%) : </td>
    <td align="right" style="padding:5px 5px 0 0;"> $<? $surcharge = $subTotal*($surchargePercent/100);   $subTotal+=$surcharge;  echo number_format($surcharge,2); ?></td>
  </tr>
  <? } ?>
  
  
  <tr>
    <td align="right" id="lineMenuList"><img src="images/spacer.gif" width="5" height="5" /></td>
    <td align="right" id="lineMenuList"><img src="images/spacer.gif" width="5" height="5" /></td>
  </tr>
  <tr>
    <td align="right" style="padding-top:5px;"><b style="font-size:16px;">TOTAL :</b></td>
    <td align="right" style="padding:5px 5px 0 0;"><b style="font-size:16px;">$<? echo number_format($subTotal,2);?></b></td>
  </tr>
  <tr>
  	<td colspan="2" align="right" style="padding:5px 5px 0 0;">
    	<? /* if($subTotal>=$overcon2) { echo '<b>FREE</b> '.$overcon2Free; } 
			else if($subTotal>=$overcon1) { echo '<b>FREE</b> '.$overcon1Free; }*/ ?>
    </td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td id="boxResult"></td>
  </tr>
</table>
<br />
</td>
                    <td class="bgBoxWelcome"></td>
                  </tr>
                  <tr>
                    <td class="bgBoxWelcome"></td>
                    <td class="bgBoxWelcome"></td>
                    <td class="bgBoxWelcome">&nbsp;</td>
                  </tr>
</table></td>
        </tr>
    </table></td>
  </tr>
</table>

<a href="javascript:window.print();" class="fmenu">** Print  ** </a><br />
<a href="_print3copy.php?id=<? echo $id; ?>" class="fmenu">** Print 3 Copy <span style="font-size:10px;">(Short Detail)</span> ** </a>



