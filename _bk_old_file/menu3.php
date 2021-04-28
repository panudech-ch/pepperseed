<?php include('connect.php'); ?>
<?php include('constant.php'); ?>
<?php $show=$_GET['show'];?>
<?php $branch_id = '1'; //$_GET['branch_id'];  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $tmp="Menu"; ?>
<title><?php echo $tmp; ?>, <?php echo $shopName;?></title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<meta name="keywords" content="<?php echo $tmp; ?>, <?php echo $shopName;?>" />
<meta name="description" content="<?php echo $tmp; ?>, <?php echo $shopName;?>" />
<META name="robots" content="index,follow">
<meta name='revisit-after' content='4 days' />

<link href="css/master.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>


	<link rel="apple-touch-icon" sizes="72x72" href="images/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="images/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="images/reverie-icon.png" />
    <link rel="icon" href="images/reverie-icon.png" />
    




<script type="text/javascript">
function chkform(){
		<?php if($_SESSION['area']!=1) {  // 1 = Pick Up at Shop ?>
		if(document.regis.address.value==''){ alert('Address - Field required');document.regis.address.focus(); return false;}
		if(document.regis.area.value==''){ alert('Suburb - Field required');document.regis.area.focus(); return false;}
		<?php } ?>
		if(document.regis.cname.value==''){ alert('Customer Name - Field required');document.regis.cname.focus(); return false;}
		if(document.regis.email.value==''){ alert('Email - Field required');document.regis.email.focus(); return false;}
		if(document.regis.phone.value==''){ alert('Phone - Field required');document.regis.phone.focus(); return false;}
		if(document.regis.pay[1].checked){ 
			if(document.regis.master.value==''){ alert('Master Card Number Card - Field required');document.regis.master.focus(); return false;}
			if(document.regis.masterm.value==''){ alert('Expiry Month - Field required');document.regis.masterm.focus(); return false;}
			if(document.regis.mastery.value==''){ alert('Expiry Year - Field required');document.regis.mastery.focus(); return false;}
		}
		if(document.regis.pay[2].checked){ 
			if(document.regis.visa.value==''){ alert('Visa Number Card - Field required');document.regis.visa.focus(); return false;}
			if(document.regis.visam.value==''){ alert('Expiry Month - Field required');document.regis.visam.focus(); return false;}
			if(document.regis.visay.value==''){ alert('Expiry Year - Field required');document.regis.visay.focus(); return false;}
		}			
		if(document.regis.pay[3].checked){ 
			if(document.regis.eftpos.value==''){ alert('Eftpos Number Card - Field required');document.regis.eftpos.focus(); return false;}
			if(document.regis.eftposm.value==''){ alert('Expiry Month - Field required');document.regis.eftposm.focus(); return false;}
			if(document.regis.eftposy.value==''){ alert('Expiry Year - Field required');document.regis.eftposy.focus(); return false;}
		}
		if(document.regis.pay[4].checked){ 
			if(document.regis.amex.value==''){ alert('AMEX Number Card - Field required');document.regis.amex.focus(); return false;}
			if(document.regis.amexm.value==''){ alert('Expiry Month - Field required');document.regis.amexm.focus(); return false;}
			if(document.regis.amexy.value==''){ alert('Expiry Year - Field required');document.regis.amexy.focus(); return false;}
		}	
	
}
</script>



<script language="javascript">
	   function DeliveryChoice(Choice, address, cname, email, phone, comment, branch) {
			window.location='menu_changeSuburb.php?Choice='+Choice+'&address='+address+'&cname='+cname+'&email='+email+'&phone='+phone+'&comment='+comment+'&branch_id='+branch;
		}		
</script>
  
<style type="text/css">
body {
	background-image:url(images/bg_orderonline.jpg);
	background-attachment: fixed;
}
</style>   

</head>

<?php $chkPage="menu"; ?>

<body>
<?php include('header.php'); ?>

<div id="content">
    
    <!-- *********** Content *************-->
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="260" valign="top">
	<?php include('menu2.php'); ?>
    
<br clear="all" />

    
    </td>
    <td width="30">&nbsp;</td>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10"><img src="images/onlineBarCatL.png"/></td>
    <td background="images/onlineBarCatC.png"><h1 style="margin:0; padding:0; color:#000; font-size:28px;">Please enter your details.</h1></td>
    <td width="10"><img src="images/onlineBarCatR.png"/></td>
  </tr>
</table>
    <br />
<div style="background-color:#FFF; padding:15px;">
<form id="regis" name="regis" method="post" action="menu_addOrderNo.php?branch_id=<?php echo $branch_id; ?>" onsubmit="return chkform();">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php if($_SESSION['area']!=1) {  // 1 = Pick Up at Shop ?>
  <tr>
    <td width="150" align="right" valign="top"><span class="txtCmmt">*</span> Address :</td>
    <td>
      <textarea name="address" id="address" rows="5" style="width:300px; margin-left:3px;"><?php echo $_SESSION['address'];?></textarea>
      </td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="txtCmmt">*</span> Suburb :</td>
    <td><div>
<select name="area" id="area" onChange="javascript:DeliveryChoice(this.value, document.getElementById('address').value, document.getElementById('cname').value, document.getElementById('email').value, document.getElementById('phone').value, document.getElementById('comment').value, <?php echo $branch_id; ?>);" style="width:300px; margin-left:3px; font-size:14px;">
        <option value="">-------------- Please Select --------------</option>
        <?php       	
			$sql = "select * from deliveryarea WHERE branch_id='$branch_id' && id!=1 && id!=2 && id!=16 && id!=15 ORDER BY id ASC ";
			$rsl = mysql_query($sql);
			while($item = mysql_fetch_array($rsl)){
		?>        
        	<option value="<?php echo $item['id'];?>" <?php if($_SESSION['area']==$item['id']){echo "selected='selected'";}?>><?php echo $item['area'];?> 
            <?php if($item['charge_price']>0){ echo "($".number_format($item['charge_price'],2).")"; } ?>
            </option>
        <?php } ?>
      </select>
</div></td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td><i class="txtCmmt">**If your suburb is not listed, please do not hesitate <br />
     &nbsp;&nbsp; to call us during trading hours to confirm that <br />
    &nbsp;&nbsp; we are delivering to your area.</i></td>
  </tr>
  
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
  
  <tr>
    <td align="right" valign="top" width="150"><span class="txtCmmt">*</span> Name :</td>
    <td>
      <input type="text" name="cname" id="cname" class="txtBox" style="width:300px;" value="<?php echo $_SESSION['cname'];?>"/>
    </td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="txtCmmt">*</span> Email :</td>
    <td>
      <input type="text" name="email" id="email"  class="txtBox" style="width:300px;" value="<?php echo $_SESSION['email'];?>"/><br />
<i class="txtCmmt">*Confirmation to this email</i>
    </td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="txtCmmt">*</span> Phone :</td>
    <td>
      <input type="text" name="phone" id="phone"  class="txtBox" style="width:300px;" value="<?php echo $_SESSION['phone'];?>"/>
    </td>
  </tr>
  <tr>
    <td align="right" valign="top"> Special Remark  :</td>
    <td>
      <textarea name="comment" id="comment" rows="5" style="width:300px; margin-left:3px;"><?php echo $_SESSION['comment'];?></textarea>
    </td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td>
    
<?php if($_SESSION['ordertime']=='dinner'){ ?>    
    <i class="txtCmmt">** Any <strong>recommened</strong> or <strong>what time</strong> you like us <br />
     &nbsp;&nbsp;&nbsp; to delivery please let me know in special remark box.</i>
<?php } else if ($_SESSION['ordertime']=='lunch'){ ?>    
    <i class="txtCmmt">** Any <strong>recommened</strong> or <strong>what time</strong> you like to <u>pick up</u><br />
     &nbsp;&nbsp;&nbsp; please let me know in special remark box.</i>
<?php } ?></td>
  </tr>
  
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="txtCmmt">*</span> Payment :</td>
    <td>
		<label><input type="radio" name="pay" value="Cash" <?php if(($_SESSION['payment']=="Cash") or ($_SESSION['payment']=='')){ echo "checked='checked'"; } ?>/>
		  <strong>Cash</strong></label>
		<br />
        
		<label><input type="radio" name="pay" value="Master Card" <?php if($_SESSION['payment']=="Master Card"){ echo "checked='checked'"; } ?>/>
		  <strong>Master Card <?php if($surchargePercent!=0){?>
          <?php if($subTotal<=20){?>
          	<b class="txtCmmt">($<?php  $surcharge = $subTotal*($surchargePercent/100);   $tmpShow=$subTotal+$surcharge; echo number_format($tmpShow,2);?>)</b>
            <i style='color:#e7585d; line-height:10px; font-size:16px;'><br />&nbsp;&nbsp;&nbsp; &nbsp; ( <strong><?php echo $surchargePercent; ?>%</strong> apply for transaction less than <strong>$20</strong> )</i>	
			<?php } ?></strong></label><!----></span>
          <?php } ?>
        <?php if($area!="Pick Up at Shop"){?>
		<br /><span style="color:#999;"><label>
		 &nbsp;&nbsp;&nbsp; &nbsp; number
         <input type="text" name="master" style="width:100px" /></label>
            <label>Expiry date <input type="text" name="masterm" style="width:40px" /></label>
            / <input type="text" name="mastery" style="width:40px" /><br /></span>
        <?php } else { echo " <i style='color:#e7585d; line-height:10px;''><br/>&nbsp;&nbsp;&nbsp; &nbsp; (Please present card at shop)<br /><br /></i>"; } ?>
            
		<label><input type="radio" name="pay" value="Visa" <?php if($_SESSION['payment']=="Visa"){ echo "checked='checked'"; } ?>/>
		  <strong>Visa <?php if($surchargePercent!=0){?>
          <?php if($subTotal<=20){?>
          	<b class="txtCmmt">($<?php  $surcharge = $subTotal*($surchargePercent/100);   $tmpShow=$subTotal+$surcharge; echo number_format($tmpShow,2);?>)</b>
            <i style='color:#e7585d; line-height:10px; font-size:16px;'><br />&nbsp;&nbsp;&nbsp; &nbsp; ( <strong><?php echo $surchargePercent; ?>%</strong> apply for transaction less than <strong>$20</strong> )</i>			
			<?php } ?></strong></label><!----></span>
            
		  <?php } ?>
        <?php if($area!="Pick Up at Shop"){?>
        <br /><span style="color:#999;"><label>&nbsp;&nbsp; &nbsp;&nbsp; number 
          <input type="text" name="visa" style="width:100px" /></label>
            <label>Expiry date <input type="text" name="visam" style="width:40px" /></label>
            / <input type="text" name="visay" style="width:40px" /><br /></span>
        <?php } else { echo " <i style='color:#e7585d; line-height:10px;''><br/>&nbsp;&nbsp;&nbsp; &nbsp; (Please present card at shop)<br /><br /></i>"; } ?>
            
		<!--
        <label><input type="radio" name="pay" value="Eftpos" <?php if($_SESSION['payment']=="Eftpos"){ echo "checked='checked'"; } ?>/>
		  <strong>Eftpos <?php if($surchargePercent!=0){?>( Surcharge <?php echo $surchargePercent; ?>% ) <b class="txtCmmt">($<?php  $surcharge = $subTotal*($surchargePercent/100);   $tmpShow=$subTotal+$surcharge; echo number_format($tmpShow,2);?>)</b><?php } ?></strong></label><br />
		<span style="color:#999;"><label>
		 &nbsp;&nbsp;&nbsp; &nbsp; number
         <input type="text" name="eftpos" style="width:100px" /></label>
            <label>Expiry date <input type="text" name="eftposm" style="width:40px" /></label>
            / <input type="text" name="eftposy" style="width:40px" /><br /></span>
        
        <label><input type="radio" name="pay" value="AMEX" <?php if($_SESSION['payment']=="AMEX"){ echo "checked='checked'"; } ?>/>
		  <strong>AMEX <?php if($surchargePercent!=0){?>( Surcharge <?php echo $surchargePercent; ?>% ) <b class="txtCmmt">($<?php  $surcharge = $subTotal*($surchargePercent/100);   $tmpShow=$subTotal+$surcharge; echo number_format($tmpShow,2);?>)</b><?php } ?></strong></label>
        <br /></span>
        <span style="color:#999;"><label>&nbsp;&nbsp; &nbsp;&nbsp; number 
          <input type="text" name="amex" style="width:100px" /></label>
            <label>Expiry date <input type="text" name="amexm" style="width:40px" /></label>
            / <input type="text" name="amexy" style="width:40px" /></span>-->
		
    </td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td><input type="image" src="images/onlineBTConfirmOrder.png" name="button" id="button" value="Order" style="margin-top:15px;" /></td>
  </tr>
</table>
</form>
</div>
    </td>
  </tr>
</table>
<br />
    <!-- *********** End Content *************-->

    </div>
 
<?php include('footer.php'); ?>

</body>
</html>