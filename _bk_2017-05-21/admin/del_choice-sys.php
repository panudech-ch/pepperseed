<? include('../connect.php');?>
<? 
	$id=$_GET['id'];
	$branch_id = $_GET['branch_id'];

$sql="DELETE FROM choice WHERE id='$id'";
$result=mysql_query($sql);

if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="add_choice.php?branch_id=<? echo $branch_id;?>";</script>
<? } else {
echo "ERROR";
} ?>