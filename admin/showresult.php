<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
 $txt=isset($_GET['txt']) ? $_GET['txt'] : "";
 $status=isset($_GET['status']) ? $_GET['status'] : "";
 $nameImg=isset($_GET['nameImg']) ? $_GET['nameImg'] : "";
 $url=isset($_GET['url']) ? $_GET['url'] : "";

?>
<div align="center">
	<strong style="font-size:16px;"><?php echo $txt;?> Complete!</strong><br /><br />
    
    <?php
    if(($status=='add') || ($status=='edit')) {
	?>
	<table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../images/btL.png"/></td>
        <td background="../images/btC.png"><a href="resizeImage.php?nameImg=<?php echo $nameImg;?>">Close</a></td>
        <td><img src="../images/btR.png"/></td>
      </tr>
    </table>
	<?php } else { ?>
	<table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../images/btL.png"/></td>
        <td background="../images/btC.png"><a href="#" onclick="javascript:parent.$.colorbox.close();">Close</a></td>
        <td><img src="../images/btR.png"/></td>
      </tr>
    </table>
    <?php } ?>
<?php if($url !=''){ ?>
<br />

	<table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../images/btL.png"/></td>
        <td background="../images/btC.png"><a href="<?php echo $_GET['url'];?>?cat_id=<?php echo $_GET['cat_id']; ?>&branch_id=<?php echo $_GET['branch_id']; ?>">< Back to update again!</a></td>
        <td><img src="../images/btR.png"/></td>
      </tr>
    </table>

<?php } ?>
</div>

</body>
</html>