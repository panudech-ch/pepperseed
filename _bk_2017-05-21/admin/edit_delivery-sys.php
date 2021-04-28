<? include('../connect.php');?>
<? 
	$id = $_GET['id'];
	$branch_id = $_GET['branch_id'];
	
	$delivery_name = $_POST['delivery_name'];
	$delivery_price = $_POST['delivery_price'];	

$sql="UPDATE deliveryarea SET 
		area='$delivery_name', 
		charge_price='$delivery_price', 
		branch_id='$branch_id'
	WHERE id='$id'";
$result=mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Update Delivery Area&url=add_delivery.php&branch_id=<? echo $branch_id;?>";</script>
<? } else {
echo "ERROR";
} ?>
