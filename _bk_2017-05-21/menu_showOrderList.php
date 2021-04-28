<? include('connect.php'); ?>
<? include('constant.php'); ?>
<? $condition = $_GET['condition']; 
	$branch_id = $_GET['branch_id']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show Order List</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<script src="js/swfobject_modified.js" type="text/javascript"></script>
<link href="css/master.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<script type="text/JavaScript">
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}

function ConfirmChoice(urlLink, condi, branch){
				answer = confirm("Are you want delete?")
				if (answer !="0")
				{ location = "admin/del_order-sys.php?id="+urlLink+"&condition="+condi+"&branch_id="+branch }
}
//   -->
</script>
<style type="text/css">
body {
	background-image:none;
	background-color:#222;
}
</style>
</head>

<body onload="JavaScript:timedRefresh(20000);">
<div id="content" style="border:1px #F93 dotted; width:70%; margin:0 auto;">
<? if($_SESSION['sessionLogin']=="admin"){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#FFF; padding:20px;">
  <tr>
    <td valign="top">
    <?
    $cat = $_POST['cat'];
	?>
    <div id="con50"><h2 class="banquet">Order List @ <? echo $shopBranch[$branch_id];?></h2></div><div id="con50" align="right"></div>
    <br clear="all" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="tbTitle" align="center"><b>New!</b></td>
    <td class="tbTitle" align="center"><b>Order ID</b></td>
    <td class="tbTitle" align="center"><b>Customer Name</b></td>
    <td class="tbTitle" align="center"><b>Date</b></td>
    <td class="tbTitle" align="center"><b>Detail</b></td>
    <td class="tbTitle" align="center"><b>Pick up / Take Away</b></td>
    <!--<td class="tbTitle" align="center"><b>ORDER TIME</b></td>-->
    <td class="tbTitle" align="center"><b>Reply Time Customer</b></td>
    <td class="tbTitle" align="center"><b>Delete</b></td>
  </tr>
<?		
	date_default_timezone_set('Australia/Sydney');
	$dateOrd= date(" j / n / Y");
	$i=0;
	
	if($condition=='all'){
		$sql = "SELECT * FROM orderno WHERE branch_id='$branch_id' ORDER BY id DESC ";		
	} else {
		$sql = "SELECT * FROM orderno WHERE branch_id='$branch_id' && ord_date='$dateOrd' ORDER BY id DESC ";
	}
	
    $rsl = mysql_query($sql);
    while ($data = mysql_fetch_array($rsl)){
		$i++;
		$choicedelivery=$data['ord_choicedelivery'];
		
			/* ---- Area Price ---*/
			  $sqlArea = "select * from deliveryarea WHERE id = '$choicedelivery' ";
			  $rslArea = mysql_query($sqlArea);
			  $dataArea = mysql_fetch_array($rslArea);
					$area = $dataArea['area'];
					$charge_price = $dataArea['charge_price'];
?>
  <tr>
    <td align="center" class="tbDesc<? if($data['ord_chk']!='yes'){echo "New";} ?>"><? if($data['ord_chk']!='yes'){?> <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="50" height="20">
            <param name="movie" value="status.swf" />
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
            <param name="expressinstall" value="Scripts/expressInstall.swf" />
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="status.swf" width="50" height="20">
              <!--<![endif]-->
              <param name="quality" value="high" />
              <param name="wmode" value="opaque" />
              <param name="swfversion" value="6.0.65.0" />
              <param name="expressinstall" value="Scripts/expressInstall.swf" />
              <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
              <div>
                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
              </div>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object><? } ?></td>
    <td align="center" class="tbDesc<? if($data['ord_chk']!='yes'){echo "New";} ?>"><? echo $titleOrderID.str_pad($data['id'],6,"0",STR_PAD_LEFT);?></td>
    <td align="center" class="tbDesc<? if($data['ord_chk']!='yes'){echo "New";} ?>"><? echo $data['ord_cname'];?></td>
    <td align="center" class="tbDesc<? if($data['ord_chk']!='yes'){echo "New";} ?>"><? echo $data['ord_date'];?></td>
    <td align="center" class="tbDesc<? if($data['ord_chk']!='yes'){echo "New";} ?>"><a href="_orderDetail.php?id=<? echo $data['id']; ?>" target="_blank" class="txtRed">Show Detail</a></td>
    <td align="center" class="tbDesc<? if($data['ord_chk']!='yes'){echo "New";} ?>"><? if($data['ord_choicedelivery']!=1) { echo $data['ord_addr']." (".$area.")";} else {echo $area;}?></td>
    <!--<td align="center" class="tbDesc<? if($data['ord_chk']!='yes'){echo "New";} ?>"><? if($data['ord_ordertime']==''){ echo "DINNER";} else { echo strtoupper($data['ord_ordertime']);} ?></td>-->
    <td align="center" class="tbDesc<? if($data['ord_chk']!='yes'){echo "New";} ?>">
    
    <? if($data['timepickup']==''){?>
    
    <form id="regis<? echo $data['id']; ?>" name="regis<? echo $data['id']; ?>" method="post" action="admin/sendmailtime-sys.php?id=<? echo $data['id']; ?>&condition=<? echo $condition;?>&branch_id=<? echo $branch_id; ?>">
    
        <select name="time<? echo $data['id']; ?>" id="time<? echo $data['id']; ?>" style="width:80px;">
          <option value="15 mins">15 mins</option>
          <option value="20 mins">20 mins</option>
          <option value="25 mins">25 mins</option>
          <option value="30 mins">30 mins</option>
          <option value="35 mins">35 mins</option>
          <option value="40 mins">40 mins</option>
          <option value="45 mins">45 mins</option>
          <option value="50 mins">50 mins</option>
          <option value="55 mins">55 mins</option>
          <option value="60 mins">60 mins</option>
          <option value="More than 60 mins">More than 60 mins</option>
        </select>
        
        <input type="submit" name="sendmail" id="sendmail" value="Send Mail" style="margin:0 0 0 5px;" />
        
        
    </form>
    <? } else {  echo $data['timepickup']; }?>    
    
    </td>
    <td align="center" class="tbDesc<? if($data['ord_chk']!='yes'){echo "New";} ?>"><a href="#" onClick="ConfirmChoice('<? echo $data['id'];?>', '<? echo $condition; ?>', '<? echo $branch_id; ?>'); return false;"><img src="images/bt-del.png" border="0" width="40" align="absmiddle" /></a></td>
  </tr>
<? } ?>
</table>
    
    </td>
  </tr>
</table>
<? } else { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#FFF; padding:20px;">
  <tr>
    <td valign="top" align="center">
	<h2>Please login before see your show order list <a href="login.php" class="txtGreen"><u>[log in]</u></a></h2>
    </td>
  </tr>
</table>

<? } ?>
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>