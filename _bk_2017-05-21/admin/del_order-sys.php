<? include('../connect.php');?>
<? 
	$id=$_GET['id'];
	$condition = $_GET['condition']; 
	$branch_id = $_GET['branch_id'];

$sql="DELETE FROM orderno WHERE id='$id'";
$result=mysql_query($sql);

if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="../menu_showOrderList.php?condition=<? echo $condition; ?>&branch_id=<? echo $branch_id; ?>";</script>
<? } else {
echo "ERROR";
} ?>