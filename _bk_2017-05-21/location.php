<? include('connect.php'); ?>
<? include('constant.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<? $tmp="Location"; ?>
<title><? echo $tmp; ?>, <? echo $shopName;?></title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<meta name="keywords" content="<? echo $tmp; ?>, <? echo $shopName;?>" />
<meta name="description" content="<? echo $tmp; ?>, <? echo $shopName;?>" />
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

<? $chkPage='location'; ?>

<body>
<? include('header.php'); ?>

<div id="content">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="147" valign="top" style="padding-right:15px;"><? include('navL.php'); ?>
        </td>
        <td valign="top" width="570" style="background-color:#FFF;">
        <?
	$id = 9;
	$sql = "SELECT * FROM firstpage WHERE id=$id ";
	$rsl = mysql_query($sql);
	$data = mysql_fetch_array($rsl);
?>
<? if($_SESSION['sessionLogin']=="admin"){?>
<div align="right" style="padding:5px 0 5px 0;">
<a href="admin/edit_firstpage.php?id=<? echo $id;?>" class='example6'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
</div>
<?	} echo $tmp = str_replace("<p>
	&nbsp;</p>", "", $data['firstpage']); ?>
    <!--<div style="background-color:#FFF; padding:0 15px 15px 15px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" style="line-height:20px;">
        <h2 style="font-size:22px; font-weight:700; color:#ffcc00; margin:15px 0; padding:0;">LOCATION OF PEPPER SEEDS "BOUTIQUE THAI BITES"</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6626.640621830328!2d151.17492286504637!3d-33.85563506460518!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7e4462e205a49ec!2sPepper+Seeds+%22Boutique+Thai+Bites%22!5e0!3m2!1sth!2sau!4v1433654019776" width="100%" height="500" frameborder="0" style="border:1px #AAA solid;"></iframe>
        </td>
      </tr>
    </table>
    </div>-->
        </td>
        <td valign="top" style="background-color:#FFF; padding:0 15px;">
        
        <?
	$id = 10;
	$sql = "SELECT * FROM firstpage WHERE id=$id ";
	$rsl = mysql_query($sql);
	$data = mysql_fetch_array($rsl);
?>
<? if($_SESSION['sessionLogin']=="admin"){?>
<div align="right" style="padding:5px 0 5px 0;">
<a href="admin/edit_firstpage.php?id=<? echo $id;?>" class='example6'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
</div>
<?	} echo $tmp = str_replace("<p>
	&nbsp;</p>", "", $data['firstpage']); ?>
        <!--<h2 style="font-size:23px; font-weight:700; color:#ffcc00; margin:15px 0; padding:0;">CONTACT</h2>
        Tel. 9555-5248
        <h2 style="font-size:23px; font-weight:700; color:#ffcc00; margin:15px 0; padding:0;">ADDRESS</h2>
        10/418 Darling Street, Balmain, NSW
        
        
        <h2 style="font-size:23px; font-weight:700; color:#ffcc00; margin:15px 0; padding:0;">OPENING HOURS</h2>
        <strong>Monday – Sunday</strong><br />
Dinner 17:00 – 22:00<br />
<br />
<strong>Dine In |<br />
Take away |<br />
Home Delivery |</strong><br />
Free home delivery with-
in designated areas and minimum order $25
<br /><br />
BYO Wine Only, Corkage Charge $3 per person-->
        </td>
      </tr>
    </table>
<br />
<? include('3column.php'); ?>
    
</div> <!-- enc content -->
 
<? include('footer.php'); ?>

</body>
</html>