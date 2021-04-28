<?php include('../connect.php');?>
<?php	$id = $_GET['id'];

$sql="DELETE FROM mainimg WHERE id='$id'";
$result=mysql_query($sql);

if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">  window.location="add_mainimg.php";</script>
<?php } else { ?>
	Error Try again <a href="add_mainimg.php">Click Here</a>
<?php } ?>