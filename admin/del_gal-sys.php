<?php include('../connect.php');?>
<?php	
$id = $_GET['id'];
$branch_id = $_GET['branch_id'];

$sql="DELETE FROM gallery WHERE id='$id'";
$result=mysql_query($sql);

if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">  window.location="add_gal.php?branch_id=<?php echo $branch_id; ?>";</script>
<?php } else { ?>
	Error Try again <a href="add_gal.php?branch_id=<?php echo $branch_id; ?>">Click Here</a>
<?php } ?>