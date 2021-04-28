<? include('connect.php'); ?>
<? include('constant.php'); ?>
<? 	$branch_id = '1'; //$_GET['branch_id']; 
	$ordertime = 'dinner';
	$_SESSION['ordertime'] = $ordertime; // lunch or dinnter	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<? $tmp="Menu"; ?>
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
    


<!--  ************** SCRIPT ONLINE CODE ****************-->    
<!-- ***** Goto Top ***** -->
  <script type='text/javascript' src='http://code.jquery.com/jquery-1.7.1.js'></script>
    <link rel="stylesheet" media="screen,projection" href="css/ui.totop.css" />
	<!-- easing plugin ( optional ) -->
	<script src="js/easing.js" type="text/javascript"></script>
	<!-- UItoTop plugin -->
	<script src="js/jquery.ui.totop.js" type="text/javascript"></script>
	<!-- Starting the plugin -->
	<script type="text/javascript">
		$(document).ready(function() {	
			$().UItoTop({ easingType: 'easeOutQuart' });	
		});
	</script>
<!-- ***** END Goto Top ***** -->


	<script language="JavaScript">
			function fncShowQTY(tpost, tid, tQty)
			{			document.getElementById('QTYBox').style.display = 'none';
						$("#QTYBox").fadeIn(500);
						x = $(".ShowInputbox" + tpost).position();				
						xx = $("#sidebar").position();
					
						if (<? echo $headHight; ?>> window.pageYOffset) {							
							posT = ((<? echo $headHight; ?>)+x.top)+5;
						  } else {
							posT = (window.pageYOffset)+x.top+15;							  
						  }
						posL = xx.left+x.left+13;
						$("#QTYBox").offset({left:posL,top:posT});
												
						loadQTYBox(tid,tQty);
			}
						
			function fncHideQTY()
			{
						$("#QTYBox").fadeOut(500);
			}
			function fncHideQTYFirst()
			{
					document.getElementById('QTYBox').style.display = 'none';
			}		
	</script>
    	
    <script type="text/javascript">
        $(function() {
            var offset = $("#sidebar").offset();
            var offset = $("#sidebarL").offset();
            var topPadding = 15;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $("#sidebar").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                    $("#sidebarL").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $("#sidebar").stop().animate({
                        marginTop: 0
                    });
                    $("#sidebarL").stop().animate({
                        marginTop: 0
                    });
                };
            });			
        });
</script>


<script language="JavaScript">
	   var HttPRequest = false;
		 /*---- Add Cart ---*/
	   function doCallAjax(ProductID,Qty,Choice, Choice2, Mode, cartID) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'menu2.php';
		  var pmeters = "tProductID=" + ProductID + "&tQty=" + Qty + "&tChoice=" + Choice + "&tChoice2=" + Choice2 + "&tMode=" + Mode + "&cartID=" + cartID;
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				 if(HttPRequest.readyState == 3)  // Loading Request
				  {
				   document.getElementById("mySpanLoad").innerHTML = "<img src='images/loadingAnimation.gif' width='65'/>";
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {			  
					  	document.getElementById('mySpan').innerHTML = HttPRequest.responseText;
						document.getElementById('mySpanLoad').style.display = 'none';
				  }				
			}

	   }
	   
	   
		 /*---- DeliveryChoice ---*/
	   function DeliveryChoice(Choice) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
		  var url = 'menu2.php';
		  var pmeters = "tArea=" + Choice;
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				 if(HttPRequest.readyState == 3)  // Loading Request
				  {
				   document.getElementById("mySpanLoad").innerHTML = "<img src='images/loadingAnimation.gif' width='65'/>";
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {			  
					  document.getElementById('mySpan').innerHTML = HttPRequest.responseText;
						document.getElementById('mySpanLoad').style.display = 'none';
				  }				
			}

	   }
	   
	   
		 /*---- QTY Box Load ---*/
	   function loadQTYBox(id,Qty) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'loadQTYBox.php';
		  var pmeters = "id=" + id + "&Qty=" + Qty;
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);			
			
			HttPRequest.onreadystatechange = function()
			{

				 if(HttPRequest.readyState == 3)  // Loading Request
				  {
				   document.getElementById("mySpanLoad").innerHTML = "<img src='images/loadingAnimation.gif' width='65'/>";
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {			  
					  document.getElementById('myQTY').innerHTML = HttPRequest.responseText;
					  document.getElementById('mySpanLoad').style.display = 'none';
				  }				
			}

	   }
	   
	   function updateQTY(cartID, tQty){
			doCallAjax( '', tQty, '', '', 'UPDATEQTY', cartID);
			fncHideQTY(); 
		}
		
	   
	   /*---- Del Item ---*/
	   function doCallAjaxDel(Mode,ID) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'menu2.php';
		  var pmeters = "tMode=" + Mode + "&tID=" + ID;

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				 if(HttPRequest.readyState == 3)  // Loading Request
				  {
				   document.getElementById("mySpanLoad").innerHTML = "<img src='images/loadingAnimation.gif' width='65'/>";
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {
				   document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
				   document.getElementById('mySpanLoad').style.display = 'none';
				  }
				
			}
			
			fncHideQTY(); 

	   }
	   /* ----- End Del Item ----*/
	   
	   
	   function deleteConfirm(DELETE,idConfirm, productName)
			{
				if (confirm('Do you want to delete '+productName+' ?')) {
					doCallAjaxDel( DELETE , idConfirm );
				}
			}
			
			function ConfirmChoice(urlLink, Branch){
				answer = confirm("Are you want delete?")
				if (answer !="0")
				{ location = "admin/del_menu-sys.php?id="+urlLink+"&branch_id="+Branch }
			}
	   

<!--*************  Check Out *************-->	   
	   function CheckOut()
	   {
	   		window.location = 'menu3.php?show=yes&branch_id=<? echo $branch_id;?>';
	   }	   
		function chkform(value, minPrice, curentCart, canOrderUnderMinPrice){
				if(value==''){ 
					<? if($_SESSION['ordertime']=='dinner'){?>
						alert('Pick Up or Delivery required');
					<? } else {?>
						alert('Please select Pick Up');						
					<? } ?>
					return false;
				} 
				if(canOrderUnderMinPrice=="yes"){
					CheckOut();
				} else if(value==2 && curentCart<minPrice){
					alert('Minimum Order ($'+minPrice+') for Home Delivery');
				} else {
					CheckOut();
				}	
		}
	   
		function AnimationAdd(){
					$("#boxAdd").show();
					$('#boxAdd').animate({
						"top": "+=35px"
					}, 700);
					$("#boxAdd").fadeOut(1000);
					$('#boxAdd').animate({
						"top": "-=35px"
					}, 10);
			}
			
	</script>


<!--*************  Catagory Slide *************-->
<script type='text/javascript'>//<![CDATA[ 
		$(window).load(function(){
		function scrollToAnchor(aid) {
			var aTag = $("a[name='" + aid + "']");
				$('html,body').animate({
					scrollTop: aTag.offset().top
				}, 'slow');
			}
			<?		
				$sql = "SELECT * FROM catname WHERE branch_id='$branch_id' && cat_ordertime='$ordertime' ORDER BY id ASC ";
				$rsl = mysql_query($sql);
				while($data = mysql_fetch_array($rsl)){
					$catname = $data['cat_name'];
					$cat_id = $data['id'];
					
					$catnameC = str_replace(" ","-",$catname);
					$catnameC = str_replace("&","-",$catnameC);
					$catnameC = str_replace("(","-",$catnameC);
					$catnameC = str_replace(")","-",$catnameC);
			?>
				$("#<? echo $catnameC;?>").click(function() {
					 scrollToAnchor('cat<? echo $cat_id;?>');
				});
			<? } ?>
		
		});//]]>  
</script>

<!--  ************** END SCRIPT ONLINE CODE ****************-->


<!-- colorbox -->
<link media="screen" rel="stylesheet" href="colorbox/colorbox.css" />
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>-->
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
  
<style type="text/css">
body {
	background-image:url(images/bg_orderonline.jpg);
	background-attachment: fixed;
}
</style>   

</head>

<? $chkPage="menu"; ?>

<body onLoad="JavaScript:doCallAjax('',''); Javascript:fncHideQTYFirst(); ">
<? include('header.php'); ?>

<div id="content">
    
    <!-- *********** Content *************-->
    <div id="page-wrap">
<?
	  // Check Order Online  Avialable / Unavialable	
	$dinner = $_GET['dinner'];
	if($dinner !=''){ $typeMenu = "Dinner Menu"; $chkOpenOnline = 2;} else {$typeMenu = "Take Away Menu"; }
?>
  
<div id="QTYBox" style="width:100px; position:absolute; z-index:99;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10" height="10"><img src="images/orderPop-LT.png"  /></td>
    <td background="images/orderPop-C.png"><img src="images/spacer.gif" width="100%" height="1" /></td>
    <td width="15"><img src="images/orderPop-RT.png"  /></td>
  </tr>
  <tr>
    <td background="images/orderPop-L.png"><img src="images/spacer.gif" width="100%" height="1" /></td>
    <td background="images/orderPop-C.png">
                <span onClick="JavaScript:fncHideQTY();" style="position:absolute; margin:-20px 0 0 70px; cursor: pointer;"><img src="images/btClosePopup.png" width="20" /></span>
    <span id="myQTY"></span></td>
    <td background="images/orderPop-R.png"><img src="images/spacer.gif" width="100%" height="1" /></td>
  </tr>
  <tr>
    <td><img src="images/orderPop-LB.png" /></td>
    <td background="images/orderPop-B.png"><img src="images/spacer.gif" width="100%" height="1" /></td>
    <td><img src="images/orderPop-RB.png" /></td>
  </tr>
</table>
  </div><!--  Delete Box -->
		    
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="170" valign="top">

<?
	if($_SESSION['ordertime']=='dinner'){ $idCondition = 7; /*dinner*/ } else if ($_SESSION['ordertime']=='lunch'){ $idCondition = 8; /*lunch*/ }
	
	 $H = 320;
	$sqlTmp = "SELECT * FROM firstpage WHERE id=$idCondition ";
	$rslTmp = mysql_query($sqlTmp);
	$dataTmp = mysql_fetch_array($rslTmp);
		 if($_SESSION['sessionLogin']=="admin"){
			 	$H+=100;
			}
?>
<div style="position:absolute; z-index:-1; width:170px; margin:<? echo $H; ?>px 0 0 0;">
<div id="lineT"><img src="images/spacer.gif" width="100%" height="1" /></div>
<div id="main"> 
<div style="margin-left:-25px;">

<? echo $dataTmp['firstpage'];?>
				<? if($_SESSION['ordertime']=='dinner'){ ?>
				<ul style="padding:0 0 0 25px; margin:0; font-size:14px; line-height:16px;">
                    <li>
                    <?				
                      $sql = "SELECT * FROM deliveryarea WHERE branch_id='$branch_id' && id!=1 && id!=2 ORDER BY id ASC ";
                      $rsl = mysql_query($sql);
                      while($data = mysql_fetch_array($rsl)){ ?>
                    <? echo $data['area']; if($data['charge_price']>0){ echo "($".$data['charge_price'].")"; } echo ", "; ?>
                    <? } ?>
                    </li>
                </ul>
                <? } ?>
</div>
</div>
</div>

<div id="sidebarL">
<img src="images/orderBoxT-L.png" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td background="images/orderBoxL.png" width="10"><img src="images/spacer.gif" width="100%" height="1" /></td>
    <td background="images/orderBoxC.png">
          
<? /**/if($_SESSION['sessionLogin']=="admin"){?>
<hr />
<div style="font-size:14px;">
<a href="admin/add_cat.php?branch_id=<? echo $branch_id; ?>" class='example6' style="color:#000;"><img src="images/bt-edit.png" border="0" align="absmiddle" width="45" /> Catagories</a>
<br />
<a href="admin/add_choice.php?branch_id=<? echo $branch_id; ?>" class='example6' style="color:#000;"><img src="images/bt-edit.png" border="0" align="absmiddle" width="45" /> Choice Meat</a>
<br />
<!--<a href="admin/add_choice2.php?branch_id=<? echo $branch_id; ?>" class='example6' style="color:#000;"><img src="images/bt-edit.png" border="0" align="absmiddle" width="45" /> Choice Noodle</a>
<br />-->
<a href="admin/edit_firstpage.php?id=<? echo $idCondition;?>" class='example6' style="color:#000;"><img src="images/bt-edit.png" border="0" align="absmiddle" width="45" /> Conditions</a>
<br />
<a href="admin/add_delivery.php?branch_id=<? echo $branch_id; ?>" class='example6' style="color:#000;"><img src="images/bt-edit.png" border="0" align="absmiddle" width="45" /> Delivery Area</a>
</div>
<hr />
<? } ?>
    <ul style="margin:0; padding:0 0 0 15px; color:#000; ">
			<?				
                    $sql = "SELECT * FROM catname WHERE branch_id='$branch_id' && cat_ordertime='$ordertime' ORDER BY id ASC ";
                    $rsl = mysql_query($sql);
                    while($data = mysql_fetch_array($rsl)){
                        $catname = $data['cat_name'];
                        $catID = $data['id'];
					
						$catnameC = str_replace(" ","-",$catname);
						$catnameC = str_replace("&","-",$catnameC);
						$catnameC = str_replace("(","-",$catnameC);
						$catnameC = str_replace(")","-",$catnameC);
            ?>  
                <li><a id="<? echo $catnameC;?>" href="#" style="color:#000; font-size:17px;"><? echo strtoupper($catname);?></a></li>
            <? } ?>
		  </ul>
          </td>
    <td background="images/orderBoxR.png" width="10"><img src="images/spacer.gif" width="100%" height="1" /></td>
  </tr>
</table>
<img src="images/orderBoxB-L.png" />
</div>
</td>
        <td width="10"><img src="images/spacer.gif" width="100%" height="1" /></td>
        <td valign="top">
  <div id="lineT"><img src="images/spacer.gif" width="100%" height="1" /></div>
<div id="main">
<!--<div style="background-image:url(images/bgTA.png); width:437px; height:101px; position:absolute; margin:-20px 0 0 0px;"><h2 style="margin:15px 0 0 70px;"><span style="font-size:42px; color:#FFF;"><? /*echo $typeMenu;*/ ?></span></h2></div>-->
		
<img src="images/spacer.gif" width="100%" height="15" />
        
<? /*if($typeMenu=='Dinner Menu'){  ?>
<a href="menu.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image15','','images/btOrder-ov.png',1)"><img src="images/btOrder.png" name="Image15"  border="0" id="Image15" class="btOrderOnlineInner" /></a>
<? }*/ ?>

        <? 
	
			if($ordertime=='dinner'){ 
				$chkForOpen = $chkOpenOnline[$branch_id];
			} else if($ordertime=='lunch'){
				$chkForOpen = $chkOpenOnlineLunch[$branch_id];							
			}
			
		if(($chkForOpen!=1) && ($typeMenu=='Take Away Menu')){  // 1 = Available  /  2 = Unavailable?>
        <h2><span style="font-size:24px; line-height:35px;"><span style="font-size:42px">Sorry!</span> <br />Order Online is Temporarily <u class="txtRed">Unavailable</u>.</span></h2>
        <? } ?>

        <?	
		$numberList = 1;
		
		$sql = "SELECT * FROM catname WHERE branch_id='$branch_id' && cat_ordertime='$ordertime' ORDER BY id ASC ";
		$rsl = mysql_query($sql);
		while($data = mysql_fetch_array($rsl)){
			$catname = $data['cat_name'];
			$cat_id = $data['id'];
	?>
    			
				<? 					
					$sql2 = "SELECT * FROM products WHERE cat_id='$cat_id' GROUP BY p_name ORDER BY id ASC ";
					$rsl2 = mysql_query($sql2);
					$row = mysql_num_rows($rsl2);
					
					if(($row>0)or($_SESSION['sessionLogin']=="admin")){
				?>
<? if($numberList >1){ echo "<br /><br />"; }?>
<a name="cat<? echo $cat_id; ?>"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10"><img src="images/onlineBarCatL.png"/></td>
    <td background="images/onlineBarCatC.png"><h1 style="margin:0; padding:0; color:#000; font-size:28px;"><? echo $catname;?>  
	<? if(($cat_id==24)or($cat_id==26)or($cat_id==33)or($cat_id==35)){ echo "(Come with rice)";} // can delete ?>
    <img src="images/onlineCatIcoH2.png" width="10"  />  
	<? /**/if($_SESSION['sessionLogin']=="admin"){?><a href="admin/add_menu.php?cat_id=<? echo $cat_id; ?>" class='example6'><img src="images/bt-add.png" border="0" align="absmiddle" /></a><? } ?></h1>
   
    </td>
    <td width="10"><img src="images/onlineBarCatR.png"/></td>
  </tr>
</table>
<br />
                            <?
                                while($data2 = mysql_fetch_array($rsl2)){
                                    $productname = $data2['p_name'];
                                    $chkChoiceSelect = $data2['p_choice'];
                                    $chkChoiceSelect2 = $data2['p_choice2'];
                            ?>
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="left" valign="top" id="lineRow" style="padding-right:15px;">
                                
                                <h3>
                                <? /**/if($_SESSION['sessionLogin']=="admin"){?>
                                <a href="admin/edit_menu.php?cat_id=<? echo $cat_id; ?>&id=<? echo $data2['id']; ?>" class='example6'><img src="images/bt-edit.png" width="40" border="0" align="absmiddle" /></a>
                                <a href="#" onClick="ConfirmChoice('<? echo $data2['id'];?>', '<? echo $branch_id;?>'); return false;"><img src="images/bt-del.png" border="0" width="40" align="absmiddle" /></a>
								<? } ?>
                                
                                <?  // if($cat_id>1){  if($chkFirst==""){$numberList=1; $chkFirst="Y";} echo $numberList.". ";} else {echo "• ";}****************** Edit ********************** // ?>	
                                <?  echo $numberList.". "; ?>								
								<? echo ucfirst(strtolower($data2['p_name']));?>
                                <? 
                                    if($data2['ico_spicy']>0){
                                        for($i=1;$i<=$data2['ico_spicy'];$i++){
                                            echo "<img src='images/spicy.png' align='absmiddle' style='margin-bottom:5px;' />";
                                        }
                                    } else {
                                            echo "<img src='images/spacer.gif' width='19' />";
									}?>
                                    
                                </h3>
                                <div id="txtDesc"><? echo $data2['p_desc'];?></div></td>
                                <td width="55" align="left" valign="top" id="lineRow">
                                                <? if($data2['p_price'.$dinner]>0){?>
                                  <div <? if($data2['p_desc']!=''){echo "style='margin:20px 0 0 0'";} else {echo "style='margin:10px 0 0 0'";}?>><b class="txtPrice">$<? echo number_format($data2['p_price'.$dinner],2);?></b></div>
					                                <input type="text" name="choice<?=$numberList;?>" id="choice<?=$numberList;?>" value="" style="width:1px; height:1px; visibility:hidden;">
					                                <input type="text" name="choiceselect_<?=$numberList;?>" id="choiceselect_<?=$numberList;?>" value="" style="width:1px; height:1px; visibility:hidden;">
                                                <? } else {  ?>
                                                    <? 	
                                                        if($chkChoiceSelect != ''){   // Show Choice Extra					
                                                            $choice=explode(",",$chkChoiceSelect);
                                                            $numtmp = count($choice);
                                                    ?>         
                                                            <? if($data2['p_desc']!=''){echo "<img src='images/spacer.gif' width='100%' height='15' />";} else {echo "<img src='images/spacer.gif' width='100%' height='8' />";} ?>
                                                            <select name="choice<? echo  $numberList; ?>" id="choice<? echo  $numberList; ?>" style="width:150px;">                      
                                                    <?
                                                                
                                                            for($i=0;$i<$numtmp;$i++){	
                                                                $selectChoice = $choice[$i];					
                                                                $sqltmp = "select * from choice where id='$selectChoice' ";
                                                                $rsltmp = mysql_query($sqltmp);
                                                                $itemtmp = mysql_fetch_array($rsltmp);
                                                    ?>
                                                              <option value="<? echo $selectChoice;?>"><? echo ucfirst(strtolower($itemtmp['choice_name']))." ($".number_format($itemtmp['choice_price'.$dinner],2).")";?></option>
                                                            <? } ?>
                                                            </select>
                                                    <? } ?> 
                                                    <? 	
                                                        if($chkChoiceSelect2 != ''){   // Show Choice Extra						
                                                            $choice=explode(",",$chkChoiceSelect2);
                                                            $numtmp = count($choice);
                                                    ?>         
                                                            <select name="choiceselect_<? echo  $numberList; ?>" id="choiceselect_<? echo  $numberList; ?>" style="width:150px;" >
                                                    <?
                                                                
                                                            for($i=0;$i<$numtmp;$i++){	
                                                                $selectChoice = $choice[$i];					
                                                                $sqltmp = "select * from choice2 where id='$selectChoice' ";
                                                                $rsltmp = mysql_query($sqltmp);
                                                                $itemtmp = mysql_fetch_array($rsltmp);
                                                    ?>
                                                                <option value="<? echo $selectChoice;?>"><? echo ucfirst(strtolower($itemtmp['choice_name']));?> <? if($itemtmp['choice_price']>0){ echo " ($".number_format($itemtmp['choice_price'],2).")"; }?></option>
                                                            <? } ?>
                                                            </select><br /><br />
                                                    <? }  else { ?>
					                                		<input type="text" name="choiceselect_<?=$numberList;?>" id="choiceselect_<?=$numberList;?>" value="" style="width:1px; height:1px; visibility:hidden;">
													<? }?> 
                                                <? } ?>
                                <input type="text" id="txt<?=$numberList;?>" value="1" style="width:1px; visibility:hidden;">
                                </td>
                                <? if($chkForOpen==1){  // 1 = Available  /  2 = Unavailable?>
                                <td width="40" valign="top" align="right" id="lineRow">
                                
                                <? if($data2['show_takeaway']==1){  // ****************** Edit ********************** // ?>
                                    <img src="images/onlineBTCart.png" alt="Order" title="Order" border="0" class="btOrder<? if($data2['p_desc']==''){echo "Nor";}?>" onClick="JavaScript:doCallAjax('<?=$data2['id'];?>', document.getElementById('txt<?=$numberList;?>').value, document.getElementById('choice<?=$numberList;?>').value, document.getElementById('choiceselect_<?=$numberList;?>').value);  AnimationAdd(); fncHideQTY(); " style="cursor: pointer;"  />
                                <? } ?>
                                </td>
                                <? } ?>
								<? $numberList++;?>
                              </tr>
                            </table>
                                
                            <? } // end while ?>
                            
                    <? } // end if ?>
	<? } ?>
    
</div>
<br />

        
        </td>
        <td width="10"><img src="images/spacer.gif" width="100%" height="1" /></td>
        
        <? if($chkForOpen==1){  // 1 = Available  /  2 = Unavailable?>
        <td width="240" valign="top"><div id="sidebar" style="position:relative;">
		<div id="boxAdd" style="position:absolute; margin:0 0 0 14px; z-index:99; display:none;"><img src="images/ico_add.png" width="35"  /></div>
        
        <span id="mySpan"></span>
        <span id="mySpanLoad"></span>
        
		</div></td>
        <? } ?>   
    </tr>
  </table>

  

    <div id="lineT"><img src="images/spacer.gif" width="100%" height="1" /></div>

</div>
    <!-- *********** End Content *************-->

    </div>
 
<? include('footer.php'); ?>

</body>
</html>