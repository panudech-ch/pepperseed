<?php include('connect.php'); ?>
<?php include('constant.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $tmp="Feedback"; ?>
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

</head>
<!-- colorbox -->
<link media="screen" rel="stylesheet" href="colorbox/colorbox.css" />
<!----><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="colorbox/jquery.colorbox-min.js"></script>
<script>
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$(".example6").colorbox({width:"90%", height:"90%", iframe:true,
				onClosed:function(){ /*location.reload(true);*/ }
			}); 
			$(".gallery").colorbox({
				rel:'gallery', 
				slideshow:true, 
				transition:"fade",
				slideshowSpeed:5000
			 });
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
			
			$("#ComboBox").val()
			
		});
</script>
<!-- end colorbox-->

<script type="text/javascript">
function chkform(){
	if(document.regis.f_name.value==''){ alert('Name - Field required');document.regis.f_name.focus(); return false;}
	if(document.regis.f_email.value==''){ alert('E mail - Field required');document.regis.f_email.focus(); return false;}
	if(document.regis.f_cmmt.value==''){ alert('Comment - Field required');document.regis.f_cmmt.focus(); return false;}
}
</script>

<?php $chkPage='feedback'; ?>

<body>
<?php include('header.php'); ?>

<div id="content">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="147" valign="top" style="padding-right:15px;"><?php include('navL.php'); ?>
        </td>
        <td valign="top" style="background-color:#FFF; padding:0 15px 15px 15px;">
        
        
<?php
	$id = 13;
	$sql = "SELECT * FROM firstpage WHERE id=$id ";
	$rsl = mysql_query($sql);
	$data = mysql_fetch_array($rsl);
?>
<?php if($_SESSION['sessionLogin']=="admin"){?>
<div align="right" style="padding:5px 0 5px 0;">
<a href="admin/edit_firstpage.php?id=<?php echo $id;?>" class='example6'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
</div>
<?php	} echo $tmp = str_replace("<p>
	&nbsp;</p>", "", $data['firstpage']); ?>
        <!--<h2 style="font-size:23px; font-weight:700; color:#ffcc00; margin:15px 0; padding:0;">FEEDBACK</h2>
      At Pepper Seeds we work hard to give you a satisfying experience. We also understand that only you can say for sure that we are indeed meeting your expectations.
<br /><br />
If you have any feedback, good or bad, praise or criticism, we'd love to hear it. Please use the form below to let us know what you think.
<br /><br />
Booking please contact us on 9555-5248-->
       


<?php if($_GET['chkUpdate']=="1"){?>
        <div style="width:80%; font-size:16px; background-color:#c7e1a2; text-align:center; margin:10px auto; padding:10px 5%; color:#7e965b; border:1px #7e965b dotted;"><b>Send e-mail complete!</b></div>
<?php } else if($_GET['chkUpdate']=="0"){?>
         <div style="width:80%; font-size:16px; background-color:#9c534b; text-align:center; margin:10px auto; padding:10px 5%; color:#871207; border:1px #871207 dotted;"><b>Can not send e-mail! <br />
          Please try again.</b></div>
<?php } ?>
                        
       
<form class="cmxform" name="regis" id="signupForm" method="post" action="feedback-sys.php" onSubmit="return chkform();">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="170"><span class="txtCmmt">*</span>Name <span class="txtCmmt">(required)</span></td>
    <td><input name="f_name" id="f_name" class="boxRegister" style="width:90%; height:30px; margin:5px 0;" /></td>
  </tr>
  <tr>
    <td><span class="txtCmmt">*</span>Email <span class="txtCmmt">(required)</span></td>
    <td><input name="f_email" id="f_email" class="boxRegister" style="width:90%; height:30px; margin:5px 0;" /></td>
  </tr>
  <tr>
    <td><span class="txtCmmt">*</span>Comment <span class="txtCmmt">(required)</span></td>
    <td><textarea name="f_cmmt" rows="3" class="boxRegister" id="f_cmmt" style="width:90%; margin:5px 0;"></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td><button class="submit" type="submit" style="width:100px; height:30px; margin:5px 0;">Submit</button> </td>
  </tr>
</table>
</form>

       
        </td>
      </tr>
    </table>
<br />
<?php include('3column.php'); ?>
    
</div> <!-- enc content -->
 
<?php include('footer.php'); ?>

</body>
</html>