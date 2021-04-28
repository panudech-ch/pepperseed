<? include('../connect.php');?>
<? 
	$id = $_GET['id'];
	$branch_id = $_GET['branch_id'];	
	$choice_name = $_POST['choice_name'];
	$choice_price = $_POST['choice_price'];	
	$choice_price_dinner = $_POST['choice_price_dinner'];
	$cat_id =  $_POST['cat_id'];

$sql="UPDATE choice SET 
		choice_name='$choice_name', 
		choice_price='$choice_price', 
		choice_price_dinner='$choice_price_dinner', 
		cat_id='$cat_id'
	WHERE id='$id'";
$result=mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Update Choice&url=add_choice.php&cat_id=<? echo $cat_id; ?>&branch_id=<? echo $branch_id;?>";</script>
<? } else {
echo "ERROR";
} ?>
