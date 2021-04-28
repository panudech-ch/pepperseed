<?php include('../connect.php');?>
<?php 
	$value = $_GET['value'];

	$sql="UPDATE chk SET 
			booking='$value'
		WHERE id='1'";
	$result=mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="../index.php?txt=Update Complete!";</script>
<?php } else {
echo "ERROR";
} ?>
