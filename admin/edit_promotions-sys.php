<?php include('../connect.php'); ?>
<?php
$id = $_GET['id'];
$status = $_GET['status'];
$branch_id = $_GET['branch_id'];

$sql = "UPDATE promotions SET 
		status ='$status' 
	WHERE id='$id'";
$result = mysql_query($sql);

if ($result) {
    echo "SUCCESS";
} else {
    echo "ERROR";
} ?>
