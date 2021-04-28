<?php include('../connect.php'); ?>
<?php
$id = $_GET['id'];
$status = $_GET['status'];
$branch_id = $_GET['branch_id'];
//	$delivery_name = $_POST['delivery_name'];
//	$delivery_price = $_POST['delivery_price'];

$sql = "UPDATE deliveryarea SET 
		deli_status ='$status' 
	WHERE id='$id'";
$result = mysql_query($sql);

if ($result) {
    echo "SUCCESS";
} else {
    echo "ERROR";
} ?>
