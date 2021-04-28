<?php include('../connect.php');?>
<?php 
	$id=$_GET['id'];
	$condition = $_GET['condition']; 
	$branch_id = $_GET['branch_id'];

$sql="DELETE FROM orderno WHERE id='$id'";
$result=mysql_query($sql);

if($result){
	echo "success";
} else {
echo "fail";
} ?>