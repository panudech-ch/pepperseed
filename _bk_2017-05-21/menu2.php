<? 
	include('connect.php');
	include('constant.php');
?>
<?
	
	$strProductID = $_POST["tProductID"];
	$strQty = $_POST["tQty"];
	$strChoice = $_POST["tChoice"];
	$strChoice2 = $_POST["tChoice2"];
	$strArea = $_POST["tArea"];
	if($strArea!=''){$_SESSION['area']=$strArea;} else { $strArea = $_SESSION['area']; }

	 /* ---- Area Price ---*/
	  $sql = "select * from deliveryarea WHERE id = '$strArea' ";
	  $rsl = mysql_query($sql);
	  $data = mysql_fetch_array($rsl);
	  		$area = $data['area'];
	  		$charge_price = $data['charge_price'];

	/* ---- Delete ----*/	
	$strMode = $_POST["tMode"];
	$strID = $_POST["tID"];
	if($strMode == "DELETE"){
		$strSQL = "DELETE FROM ordermenu  WHERE id='$strID' ";
		$objQuery = mysql_query($strSQL);
	}
	/* ---- End Delete ----*/
	
	/* ---- Update QTY ----*/	
	$strMode = $_POST["tMode"];
	$cartID = $_POST["cartID"];
	if($strMode == "UPDATEQTY"){
		$strSQL="UPDATE ordermenu SET p_qty='$strQty' WHERE id='$cartID'";
		$objQuery = mysql_query($strSQL);
	}
	/* ---- End Update QTY ----*/

	// ----- Add Product to Cart ----- //
	if($strProductID != "" and $strQty  != "")
	{	
			$sqlChk = "SELECT * FROM ordermenu  WHERE ses_num='$sesID' && p_id='$strProductID' && choice='$strChoice' && choice2='$strChoice2' ";
			$rslChk = mysql_query($sqlChk);
			$dataChk = mysql_fetch_array($rslChk);
			$id = $dataChk['id'];
				if($id==''){		
					$strSQL = "INSERT INTO ordermenu ";
					$strSQL .="(ses_num,p_id,p_qty,choice,choice2) ";
					$strSQL .="VALUES ";
					$strSQL .="('".$sesID."','".$strProductID."','".$strQty."','".$strChoice."','".$strChoice2."') ";
					$objQuery = mysql_query($strSQL);
				} else {
					$tmpQty = $dataChk['p_qty']+1;
					$strSQL="UPDATE ordermenu SET 
							p_qty='$tmpQty'
							WHERE id='$id'";
					$objQuery=mysql_query($strSQL);
				}
   }
	
?>

 
<style type="text/css">
body {
	margin-left: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>

<div style="width:260px;">
<img src="images/orderBoxT-R.png" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td background="images/orderBoxL.png" width="10"><img src="images/spacer.gif" width="100%" height="1" /></td>
    <td background="images/orderBoxC.png" class="txtWhite">    
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50" valign="middle"><img src="images/icoBasket.png" ></td>
    <td valign="middle"><h5 style="color:#000; font-size:24px;">YOUR ORDER</h5>
    <? if($show!='yes'){?><div style="color:#000;"><strong>Pick Up <? if($_SESSION['ordertime']=='lunch') { echo "Only";} else { echo "or Delivery"; }?></strong>  <br>
<select name="area" id="area" onChange="javascript:DeliveryChoice(this.value);" style="width:100%; font-size:14px;">
        <option value="">------ Please Select ------</option>
        <?       	
			$sql = "select * from deliveryarea WHERE id<=2 ORDER BY id ASC ";
			$rsl = mysql_query($sql);
			while($item = mysql_fetch_array($rsl)){
		?>        
        	<? if($_SESSION['ordertime']=='lunch') {?>
            	<? if($item['area']!='Home Delivery'){?>
        		<option value="<? echo $item['id'];?>" <? if($_SESSION['area']==$item['id']){echo "selected='selected'";}?>><? echo $item['area'];?></option>
                <? } ?>
            <? } else { ?>
        		<option value="<? echo $item['id'];?>" <? if($_SESSION['area']==$item['id']){echo "selected='selected'";}?>><? echo $item['area'];?></option>
            <? } ?>
        <? } ?>
      </select>
</div><? }?></td>
  </tr>
</table>



<hr />
<?
$subTotal = 0;
$intRows = 0;
$strSQL = "SELECT * FROM ordermenu  WHERE ses_num = '".session_id()."' ORDER BY id DESC ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($data = mysql_fetch_array($objQuery))
{
	
	$pid = $data['p_id'];
	$chkChoice = $data['extra'];
	$chkChoiceSelect = $data['choice'];
	$chkChoiceSelect2 = $data['choice2'];
	
	$intRows ++;
	//*** Product ***//
	$strSQL = "SELECT * FROM products  WHERE id = '".$data["p_id"]."' ";
	$objQueryPro = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$dataPro = mysql_fetch_array($objQueryPro);
		$productPrice = $dataPro["p_price"];
?>
<?    
				$choicename ="";
				$choicename2="";
				$pp=$pp1=$pp2 =0;
				$choicename ="";
				if($chkChoiceSelect != ''){
						$sql4 = "select * from  choice where id='$chkChoiceSelect' ";
						$rsl4 = mysql_query($sql4);
						$item4 = mysql_fetch_array($rsl4);
						$productPrice=$item4['choice_price'];
						$choicename = $item4['choice_name'];
				}
				$subTotal = $subTotal + $pp;	
				
				if($chkChoiceSelect2 != ''){
						$sql4 = "select * from  choice2 where id='$chkChoiceSelect2' ";
						$rsl4 = mysql_query($sql4);
						$item4 = mysql_fetch_array($rsl4);
						$productPrice2=$item4['choice_price'];
						$choicename2 = $item4['choice_name'];
						$pp2 = $data["p_qty"] * $productPrice2;
				}				
				$pp = $data["p_qty"] * $productPrice;
				$showpp = $pp + $pp1 + $pp2;
				$subTotal = $subTotal + $showpp;  
}
				
  	if($chkdiscount=='yes') {
		$sumdiscount = ($subTotal*$discount)/100;
		$subTotal = $subTotal-$sumdiscount;
	} 	
  	if(($canOrderUnderMinPrice == "yes") && ($subTotal<=$minimumPrice) && ($subTotal!=0) && ($area!="Pick Up at Shop")) {
	$subTotal = $subTotal+$OrderUnderMinPrice;
	 } 
	 
	  if($area!=''){ $subTotal+=$charge_price;} 
	  
 ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10"><img src="images/onlineTotalL.png" ></td>
    <td background="images/onlineTotalC.png" align="right" style="padding-right:15px;"><span class="txtYellow" style="font-size:20px;">Total $<?=number_format($subTotal,2);?></span></td>
    <td width="10"><img src="images/onlineTotalR.png" ></td>
  </tr>
</table>
<? if(($subTotal > 0) && ($show!='yes')) { ?>
<div align="center" style="margin:10px 0;"><input name="btnCheckOut" type="image" src="images/onlineBTCheckout.png" id="btnCheckOut" value="Check Out" onClick="Javascript:chkform(document.getElementById('area').value, <? echo $minimumPrice?>, <? echo $subTotal; ?>, '<? echo $canOrderUnderMinPrice; ?>' );"></div>
<? } ?>
<? if($show=='yes') { ?>
<div align="center" style="margin:10px 0;"><a href="menu.php?branch_id=<? echo $branch_id;?>&ordertime=<? echo $_SESSION['ordertime']; ?>"><img src="images/onlineBTBacktoCart.png" border="0" ></a></div>
<? } ?>

<hr /><br>
      
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; color:#000; font-size:16px;">
<?
$subTotal = 0;
$intRows = 0;
$strSQL = "SELECT * FROM ordermenu  WHERE ses_num = '".session_id()."' ORDER BY id DESC ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($data = mysql_fetch_array($objQuery))
{
	
	$pid = $data['p_id'];
	$chkChoice = $data['extra'];
	$chkChoiceSelect = $data['choice'];
	$chkChoiceSelect2 = $data['choice2'];
	
	$intRows ++;
	//*** Product ***//
	$strSQL = "SELECT * FROM products  WHERE id = '".$data["p_id"]."' ";
	$objQueryPro = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$dataPro = mysql_fetch_array($objQueryPro);
		$productPrice = $dataPro["p_price"];
?>
  <tr>
    <td valign="top" class="lineList" width="20" align="center" style="line-height:14px;"><b class="txtRed" title="Change your quantity"><span class="ShowInputbox<?=$intRows;?>" onClick="Javascript:fncShowQTY('<?=$intRows;?>','<?=$data["id"];?>','<?=$data["p_qty"];?>');") style="cursor: pointer;"><?=$data["p_qty"];?></span></b></td>
    <td valign="top" class="lineList" style="padding:5px 5px 0 5px;line-height:14px;" width="8">x</td>
    <td valign="top" class="lineList" style="line-height:14px;"><?=$dataPro["p_name"];?>
    <?    
				$choicename ="";
				$choicename2="";
				$pp=$pp1=$pp2 =0;
				if($chkChoiceSelect != ''){
						$sql4 = "select * from  choice where id='$chkChoiceSelect' ";
						$rsl4 = mysql_query($sql4);
						$item4 = mysql_fetch_array($rsl4);
						echo "(".$item4['choice_name'].")";
						$productPrice=$item4['choice_price'];
						$choicename = $item4['choice_name'];
				}
				$subTotal = $subTotal + $pp;
				
				if($chkChoiceSelect2 != ''){
						$sql4 = "select * from  choice2 where id='$chkChoiceSelect2' ";
						$rsl4 = mysql_query($sql4);
						$item4 = mysql_fetch_array($rsl4);
						echo "(".$item4['choice_name'].")";
						$productPrice2=$item4['choice_price'];
						$choicename2 = $item4['choice_name'];
						$pp2 = $data["p_qty"] * $productPrice2;
				}				
				$pp = $data["p_qty"] * $productPrice;
				$showpp = $pp + $pp1 + $pp2;
				$subTotal = $subTotal + $showpp;
	?>
    </td>
    <td width="60px;" align="right" valign="top" class="lineList">$<?=number_format($pp,2);?></td>
    <? if($show!='yes'){?>
    <td align="right" valign="top" class="lineList" style="width:25px;">
    <a href="javascript:deleteConfirm('DELETE','<?=$data["id"];?>','<?=$dataPro["p_name"];?> <? if($choicename!=''){ echo "(".$choicename.")";}?> <? if($choicename2!=''){ echo "(".$choicename2.")";}?>');"><img src="images/onlineBTDel.png" border="0"></a>
    </td>
	<? }?>
  </tr>
<? }  ?>

  <tr>
    <td colspan="3" align="right" style="padding:15px 0 0 0;">Sub Total</td>
    <td align="right" style="padding:15px 0 0 0;"><b>$<?=number_format($subTotal,2);?></b></td>
    <td>&nbsp;</td>
  </tr>
  
  <? 
  	if($chkdiscount=='yes') {
	$sumdiscount = ($subTotal*$discount)/100;
	$subTotal = $subTotal-$sumdiscount;
  ?>
  <tr>
    <td colspan="3" align="right" style="padding:5px 0 0 0;">Discount <? echo $discount; ?>% </td>
    <td align="right" style="padding:5px 0 0 0;">- $<? echo number_format($sumdiscount,2);?></td>
    <td>&nbsp;</td>
  </tr>
  <? } ?>
  
  <? 
  	if(($canOrderUnderMinPrice == "yes") && ($subTotal<=$minimumPrice) && ($subTotal!=0) && ($area!="Pick Up at Shop")) {
	$subTotal = $subTotal+$OrderUnderMinPrice;
  ?>
  <tr>
    <td colspan="3" align="right" style="padding:5px 0 0 0;">Delivery Fee</td>
    <td align="right" style="padding:5px 0 0 0;"> $<? echo number_format($OrderUnderMinPrice,2);?></td>
    <td>&nbsp;</td>
  </tr>
  <? } ?>
  
  <? if($area!=''){ ?>
  <tr>
    <td colspan="4" align="right" style="padding:5px 0 0 0;">Delivery Area ( <i class="txtRed"><? echo $area; ?> <? if($charge_price>0){ echo "($".number_format($charge_price,2).")";  $subTotal+=$charge_price;  } ?></i> ) </td>
    <td style="padding:5px 0 0 0;">&nbsp;</td>
  </tr>
  <? } ?>
</table>
<br>

    </td>
    <td background="images/orderBoxR.png" width="10"><img src="images/spacer.gif" width="100%" height="1" /></td>
  </tr>
</table>
<img src="images/orderBoxB-R.png" />
</div>
