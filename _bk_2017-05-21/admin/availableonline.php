<? include('../connect.php');?>
<? include('../constant.php');?>
<? 
	$value = $_GET['value'];
	$branch_id = $_GET['branch_id'];
	$opentime = $_GET['opentime'];
	
	if($opentime=='dinner'){
		$open_close = 'open_close';
	} else {
		$open_close = 'open_close_lunch';	
	}

	$sql="UPDATE branch SET 
			$open_close='$value'
		WHERE id='$branch_id'";
	$result=mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="../index.php?txt=Update Complete!";</script>
<? } else {
echo "ERROR";
} ?>
