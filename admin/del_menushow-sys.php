<?php include('../connect.php');?>
<?php	$id = $_GET['id'];

$sql="DELETE FROM menushow WHERE id='$id'";
$result=mysql_query($sql);

if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">  window.location="add_menushow.php";</script>
<?php } else { ?>
	Error Try again <a href="add_menushow.php">Click Here</a>
<?php } ?>