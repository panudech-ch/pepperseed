<? include('../connect.php');?>
<? include('../constant.php');?>
<? 
	$value = $_GET['value'];
	$id = $_GET['id'];

	$sql="UPDATE feedback SET 
			f_show='$value'
		WHERE id='$id'";
	$result=mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.top.location="../index.php";</script>
<? } else {
echo "ERROR";
} ?>
