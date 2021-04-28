<? include('../connect.php');?>
<? 
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

$sql="INSERT INTO products(
		p_name, 
		p_desc,
		p_price, 
		cat_id, 
		ico_spicy, 
		p_choice, 
		p_choice2, 
		p_price_dinner, 
		show_takeaway
	)VALUES(
		'$p_name', 
		'$p_desc', 
		'$p_price', 
		'$cat_id', 
		'$ico_spicy', 
		'$selectChoiceC', 
		'$selectChoiceC2', 
		'$p_price_dinner', 
		'$show_takeaway'
	)";
$result = mysql_query($sql);
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Add Menu&cat_id=<? echo $cat_id; ?>&url=add_menu.php";</script>
<? } else {
echo "ERROR";
} ?>
