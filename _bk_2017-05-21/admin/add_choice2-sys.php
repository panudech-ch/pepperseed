<? include('../connect.php');?>
<? 
	
	$branch_id = $_GET['branch_id'];
	$choice_name = $_POST['choice_name'];
	$choice_price = $_POST['choice_price'];	
	$cat_id =  $_POST['cat_id'];

$sql="INSERT INTO choice2(
		choice_name, 
		choice_price,
		cat_id
	)VALUES(
		'$choice_name', 
		'$choice_price',
		'$cat_id'
	)";
$result = mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Add Choice&url=add_choice2.php&cat_id=<? echo $cat_id; ?>&branch_id=<? echo $branch_id;?>";</script>
<? } else {
echo "ERROR";
} ?>
