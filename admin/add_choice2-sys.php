<?php include('../connect.php');?>
<?php
	
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
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Add Choice&url=add_choice2.php&cat_id=<?php echo $cat_id; ?>&branch_id=<?php echo $branch_id;?>";</script>
<?php } else {
echo "ERROR";
} ?>
