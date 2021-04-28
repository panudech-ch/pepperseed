<? include('../connect.php');?>
<? include('../constant.php');?>
<? 
	$tmpShop[1] = $_POST['shopName'];
	$tmpShop[2] = $_POST['shopAddr'];
	$tmpShop[3] = $_POST['shopPhone'];
	$tmpShop[4] = $_POST['boxDetail'];
	$tmpShop[5] = $_POST['shopMail'];
	$tmpShop[6] = $_POST['FB'];
	$tmpShop[7] = $_POST['TW'];
	$tmpShop[8] = $_POST['IS'];
	$tmpShop[9] = $_POST['YT'];
	$tmpShop[10] = $_POST['passwordAdmin'];
	$tmpShop[11] = $_POST['mailforsend'];
	$tmpShop[12] = $_POST['Fax'];

for($i=1;$i<=12;$i++){
	$sql="UPDATE maindetail SET 
			desc_d='$tmpShop[$i]'
		WHERE id='$i'";
	$result=mysql_query($sql);
}
 
if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="showresult.php?txt=Update Detail";</script>
<? } else {
echo "ERROR";
} ?>
