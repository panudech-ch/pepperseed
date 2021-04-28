<? include('../connect.php');?>
<? 
	$branch_id = $_GET['branch_id'];
	$id = $_GET['id'];
	$typem = $_GET['typem'];
	$cat_id = $_GET['cat_id'];
	
	$p_name = $_POST['p_name'];
	$p_desc = $_POST['boxDetail'];
	$p_price = $_POST['p_price'];
	$p_price_dinner = $_POST['p_price_dinner'];
	$ico_spicy = $_POST['ico_spicy'];	
	$show_eatin = $_POST['show_eatin'];
	$show_takeaway = $_POST['show_takeaway'];
	
	// Check Choice
	$rowChoice1 = $_POST['rowChoice1'];
	$rowChoice2 = $_POST['rowChoice2'];
	
	$chkComma = 0;
	for($i=1; $i<=$rowChoice1; $i++){
		if($_POST["choice_".$i]!=''){
				if($chkComma==1){$selectChoiceC .= ",";}
				 $selectChoiceC .= $_POST["choice_".$i];
				 $chkComma = 1;
			}		
	}
	$chkComma = 0;
	for($i=1; $i<=$rowChoice2; $i++){
		if($_POST["choice2_".$i]!=''){
				if($chkComma==1){$selectChoiceC2 .= ",";}
				 $selectChoiceC2 .= $_POST["choice2_".$i];
				 $chkComma = 1;
			}		
	}
	// End Check Choice
	
	$p_name = str_replace("'", "&#39;", $p_name);
	$p_name = str_replace("\"", "&quot;", $p_name);
	$p_desc = str_replace("'", "&#39;", $p_desc);
	$p_desc = str_replace("\"", "&quot;", $p_desc);

$sql="UPDATE products SET 
		p_name='$p_name', 
		p_desc='$p_desc', 
		p_price='$p_price', 
		cat_id='$cat_id', 
		ico_spicy='$ico_spicy', 
		p_choice='$selectChoiceC', 
		p_choice2='$selectChoiceC2', 
		p_price_dinner='$p_price_dinner', 
		show_takeaway='$show_takeaway'
	WHERE id='$id'";
$result=mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Update Menu";</script>
<? } else {
echo "ERROR";
} ?>
