<?php include('../connect.php');?>
<?php 
	$id = $_GET['id'];
	
	$boxDetail = $_POST['boxDetail'];

$sql="UPDATE firstpage SET 
		firstpage='$boxDetail'
	WHERE id='$id'";
$result=mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Update Detail";</script>
<?php } else {
echo "ERROR";
} ?>
