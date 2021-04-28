<? include('../connect.php');?>
<? 
	
	$delivery_name = $_POST['delivery_name'];
	$delivery_price = $_POST['delivery_price'];	
	$branch_id = $_GET['branch_id'];

$sql="INSERT INTO deliveryarea(
		area, 
		charge_price, 
		branch_id
	)VALUES(
		'$delivery_name', 
		'$delivery_price', 
		'$branch_id'
	)";
$result = mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Add Delivery Area&url=add_delivery.php&branch_id=<? echo $branch_id;?>";</script>
<? } else {
echo "ERROR";
} ?>
