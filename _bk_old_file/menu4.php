<?php include('connect.php'); ?>
<?php include('constant.php'); ?>
<?php 	$show=$_GET['show'];
	$id=$_GET['OrderID'];
	$branch_id = '1'; //$_GET['branch_id'];
	$ordertime=$_GET['ordertime'];
?>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="147" valign="top" style="padding-right:15px;"><?php include('navL.php'); ?>
        </td>
        <td valign="top" style="background-color:#FFF; padding:15px 15px 15px 15px;">
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10"><img src="images/onlineBarCatL.png"/></td>
    <td background="images/onlineBarCatC.png"><h1 style="margin:0; padding:0; color:#000; font-size:28px;">Thank you for your order!</h1></td>
    <td width="10"><img src="images/onlineBarCatR.png"/></td>
  </tr>
</table>
            <div align="center" style=" padding:30px 0 30px 0;">
              <p><strong style="font-size:18px; line-height:30px;">            
              <span style="font-size:24px">"Your order would be completed after you received <br />
              our confirmation by <!--<u>Phone</u> or--> <u>Email</u>."</span></strong></p>
              <p><strong style="font-size:18px; line-height:30px;">Thank you for your business and please enjoy your meal</strong>
              <br /><br />
              <img src="images/imgThank.jpg" /></p>
</div>
<br />
       
        </td>
      </tr>
    </table>
<br />
    <!-- *********** End Content *************-->

    </div>
 
<?php include('footer.php'); ?>

</body>
</html>