<? include('../connect.php');?>
<? 
	$id = $_GET['id'];
	$cat_name = $_POST['cat_name'];
	$cat_ordertime = 'dinner'; //$_POST['cat_ordertime'];
	$branch_id = $_GET['branch_id'];
	
	// Check Choice
	/*$rowChoice1 = $_POST['rowChoice1'];
	$rowChoice2 = $_POST['rowChoice2'];
	
	$chkComma = 0;
	for($i=1; $i<=$rowChoice1; $i++){
		if($_POST["extra_".$i]!=''){
				if($chkComma==1){$selectChoiceC .= ",";}
				 $selectChoiceC .= $_POST["extra_".$i];
				 $chkComma = 1;
			}		
	}*/
	// End Check Choice

$sql="UPDATE catname SET 
		cat_name='$cat_name', 
		extra='$selectChoiceC', 
		branch_id='$branch_id', 
		cat_ordertime='$cat_ordertime'
	WHERE id='$id'";
$result=mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Update Catagory&url=add_cat.php&branch_id=<? echo $branch_id;?>";</script>
<? } else {
echo "ERROR";
} ?>
