<?php
	include('../connect.php');
	include('../constant.php');
	include('../inc/admin/query_statement.php');
?>
<?php
	$value = $_GET['value'];
	$branch_id = $_GET['branch_id'];
	$opentime = $_GET['opentime'];
	
	if($opentime=='dinner'){
		$open_close = 'open_close';
	} else {
		$open_close = 'open_close_lunch';	
	}

	$result= updateBranchByAvailable($branch_id,$open_close,$value);

if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="../inc/admin/manage_order.php?branch=<?php echo $branch_id; ?>";</script>
<?php } else {
echo "ERROR";
} ?>
