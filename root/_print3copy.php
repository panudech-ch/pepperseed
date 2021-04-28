<?php include("connect.php"); ?>
<?php include('constant.php');?>
<?php if($_SESSION['sessionLogin']!="admin" ){ header("location:index.php"); }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
@media print {
  	@page { margin: 0; }
	/*body {
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
	}*/
  /**/body { margin: 0.5cm; }
}
</style>

</head>

<body>

<?php
$id = $_GET['id'];

$sqlOrd = "select * from orderno where id='$id'";
$rslOrd = mysql_query($sqlOrd);
$dataOrd = mysql_fetch_array($rslOrd);
	$choicedelivery=$dataOrd['ord_choicedelivery'];
	$ord_payment = $dataOrd['ord_payment'];
	$branch_id =  $dataOrd['branch_id'];
	
	/* ---- Area Price ---*/
	  $sqlArea = "select * from deliveryarea WHERE id = '$choicedelivery' ";
	  $rslArea = mysql_query($sqlArea);
	  $dataArea = mysql_fetch_array($rslArea);
	  		$area = $dataArea['area'];
	  		$charge_price = $dataArea['charge_price'];
			
			
	
?>
<!-- 595 full A4 -->
<table width="198" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<?php for($i=1;$i<=1;$i++){
		$sumdiscount = 0;
		$subTotal = 0;
		?>
    <td style="padding:10px;" valign="top" width="33%">
    <img src="images/logo.jpg" width="100%" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; line-height:13px;">
  <tr>
    <td width="55" align="right" valign="top"> ID :</td>
    <td valign="top"><b><?php echo $titleOrderID.str_pad($dataOrd['id'],6,"0",STR_PAD_LEFT);?></b></td>
  </tr>
  <tr>
    <td align="right" valign="top">Date :</td>
    <td valign="top"><b><?php echo $dataOrd['ord_date'];?> (<?php echo $dataOrd['ord_time'];?>)</b></td>
  </tr>
  <tr>
    <td align="right" valign="top">Name :</td>
    <td valign="top"><b><?php echo $dataOrd['ord_cname'];?></b></td>
  </tr>
  <tr>
    <td align="right" valign="top">Addr :</td>
    <td valign="top"><b><?php if($dataOrd['ord_choicedelivery']!=1) { echo $dataOrd['ord_addr']." (".$area.")";} else {echo $area;}?></b></td>
  </tr>
  <tr>
    <td align="right" valign="top">Email :</td>
    <td valign="top"><b><?php echo $dataOrd['ord_mail']; ?></b></td>
  </tr>
  <tr>
    <td align="right" valign="top">Phone :</td>
    <td valign="top"><b><?php echo $dataOrd['ord_phone'];?></b></td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding-right:5px;">Comment</td>
    <td valign="top"><?php echo $dataOrd['ord_cmmt'];?></td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding-right:5px;">Payment</td>
    <td valign="top"><?php echo $dataOrd['ord_payment'];?></td>
  </tr>
</table>
<hr />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top" class="bgBoxWelcome">
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:13px;">

<?php

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
                      <td align="left" valign="top" style="padding:3px; font-size:12px; line-height:10px; font-family:Arial, Helvetica, sans-serif;">                        
                        <?php echo $data['p_qty'];?> x <b><?php echo $data2['p_name'];?><?php if($data2['p_subname']!=''){ echo " - ".$data2['p_subname'];}?></b>
		<div style="padding:3px 0 0 20px;">
        	<?php		$extraprice = 0;
				
					if($chkChoiceSelect != ''){
							echo "<b>Choice :</b> ";						
							$sql4 = "select * from choice where id='$chkChoiceSelect' ";
							$rsl4 = mysql_query($sql4);
							$item4 = mysql_fetch_array($rsl4);
							echo "<span style='font-size:12px; font-style:italic;'> ".$item4['choice_name']."</span><br />";
							$extraprice += $item4['choice_price'];
					}
				
					if($chkChoiceSelect2 != ''){
							echo "<b>Choice :</b> ";						
							$sql4 = "select * from choice2 where id='$chkChoiceSelect2' ";
							$rsl4 = mysql_query($sql4);
							$item4 = mysql_fetch_array($rsl4);
							echo "<span style='font-size:12px; font-style:italic;'> ".$item4['choice_name']."</span><br />";
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
						echo "<span style='font-size:12px; font-style:italic;'> ".$item4['ex_name']." ($".number_format($item4['ex_price'],2).")</span><br />";
						$extraprice += $item4['ex_price'];
					}
				}
			?>
            <?php
            	if($data['p_cmmt'] != ''){
					echo "<div style='padding:3px 0 0 0;'><b>Comment :</b> <br /><span style='font-size:12px; font-style:italic;'>".$data['p_cmmt']."</span></div>";
				}
			?>
($<?php echo number_format($pp=(($data2['p_price']+$extraprice)*$data['p_qty']),2); $subTotal += $pp ?>)</td>
                   </tr>

<?php } ?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="2"></td>
  </tr>
  <tr>
    <td id="boxResult">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" id="boxResult"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;">
  <tr>
    <td align="right">Sub&nbsp;total :</td>
    <td width="70" align="right" style="padding-right:5px;"><b>$<?php echo number_format($subTotal,2);?></b></td>
  </tr>
  
    
  <?php
  	if($chkdiscount=='yes') {
	$sumdiscount = ($subTotal*$discount)/100;
	$subTotal = $subTotal-$sumdiscount;
  ?>
  <tr>
    <td align="right" style="padding:5px 0 0 0;">Discount <?php echo $discount; ?>% </td>
    <td align="right" style="padding:5px 5px 0 0;">- $<?php echo number_format($sumdiscount,2);?></td>
  </tr>
  <?php } ?>
  
  
  
  
  
  <?php
  	if(($canOrderUnderMinPrice == "yes") && ($subTotal<=$minimumPrice) && ($subTotal!=0) && ($area!="Pick Up at Shop")) {
	$subTotal = $subTotal+$OrderUnderMinPrice;
  ?>
  <tr>
    <td align="right" style="padding:5px 0 0 0;">Delivery Fee : </td>
    <td align="right" style="padding:5px 5px 0 0;"> $<?php echo number_format($OrderUnderMinPrice,2);?></td>
  </tr>
  <?php } ?>
  
  <?php if(($area!='') && ($charge_price!=0)){ ?>
  <tr>
    <td align="right" style="padding:5px 0 0 0;">Delivery Area :</td>
    <td align="right" style="padding:5px 5px 0 0;"><?php echo "<b>$".number_format($charge_price,2)."</b>";  $subTotal+=$charge_price; ?></td>
    
    </tr>
  <?php } ?>
  
  <?php if(($ord_payment!="Cash") && ($ord_payment!="") && ($surchargePercent!=0) && ($subTotal<=20)) {?>
  <tr>
    <td align="right" style="padding:5px 0 0 0;">Credit Card Surcharge (<?php echo $surchargePercent; ?>%) : </td>
    <td align="right" style="padding:5px 5px 0 0;"> $<?php $surcharge = $subTotal*($surchargePercent/100);   $subTotal+=$surcharge;  echo number_format($surcharge,2); ?></td>
  </tr>
  <?php } ?>
  
  
  <tr>
    <td align="right" id="lineMenuList"><img src="images/spacer.gif" width="5" height="5" /></td>
    <td align="right" id="lineMenuList"><img src="images/spacer.gif" width="5" height="5" /></td>
  </tr>
  <tr>
    <td align="right" style="padding-top:5px;"><b style="font-size:18px;">TOTAL :</b></td>
    <td align="right" style="padding:5px 5px 0 0;"><b style="font-size:18px;">$<?php echo number_format($subTotal,2);?></b></td>
  </tr>
  <tr>
  	<td colspan="2" align="right" style="padding:5px 5px 0 0;">
    	<?php /* if($subTotal>=$overcon2) { echo '<b>FREE</b> '.$overcon2Free; }
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
                  </tr>
</table>
    </td>
    <?php } ?>
  </tr>
</table>

<script type="text/javascript">
window.print() ;
</script>
</body>
</html>