<? include('../connect.php');?>
<? 
	$cat_name = $_POST['cat_name'];
	$cat_ordertime = 'dinner'; //$_POST['cat_ordertime'];
	$branch_id = $_GET['branch_id'];
	
		$cat_name = str_replace("'", "&#39;", $cat_name);
		$cat_name = str_replace("\"", "&quot;", $cat_name);
	
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

$sql="INSERT INTO catname(
		cat_name, 
		extra, 
		branch_id,
		cat_ordertime
	)VALUES(
		'$cat_name', 
		'$selectChoiceC', 
		'$branch_id',
		'$cat_ordertime'
	)";
$result = mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Add Catagory&url=add_cat.php&branch_id=<? echo $branch_id;?>";</script>
<? } else {
echo "ERROR";
} ?>
