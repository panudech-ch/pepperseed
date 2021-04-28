<?php include('../connect.php');?>
<?php include('../constant.php');?>
<?php
	$id = $_GET['id'];
	$cat_id = $_GET['cat_id'];
	$branch_id = $_GET['branch_id'];
	$ordertime = $_SESSION['ordertime'];
	
	  	//$i = 0;
      	$sqlTmp = "SELECT * FROM catname WHERE branch_id=$branch_id && cat_ordertime='$ordertime' ORDER BY id ASC";
		$rslTmp = mysql_query($sqlTmp);
		while($dataTmp = mysql_fetch_array($rslTmp)){
			$i++;
			$namecat[$dataTmp['id']] = $dataTmp['cat_name'];
		}
	  
?>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />
<script type="text/javascript">
<!--//
function ConfirmChoice(urlLink, branch)

{
answer = confirm("Are you want delete?")
if (answer !="0")
{ location = "del_choice2-sys.php?id="+urlLink+"&branch_id="+branch }
}
//-->
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if($id==''){?>
<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="add_choice2-sys.php?cat_id=<?php echo $cat_id; ?>&branch_id=<?php echo $branch_id;?>" >
	<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" valign="middle" width="100">Choice Name :</td>
    <td valign="middle"><input type="text" name="choice_name" id="choice_name" style="width:80%;" /></td>
    <td align="right" valign="middle" width="100"> Price :</td>
    <td valign="middle"><input type="text" name="choice_price" id="choice_price" style="width:80%;" /></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Catagory :</td>
    <td valign="middle"><select name="cat_id" id="cat_id">
	  <?php
      	$sqlTmp = "SELECT * FROM catname WHERE branch_id=$branch_id && cat_ordertime='$ordertime' ORDER BY id ASC";
		$rslTmp = mysql_query($sqlTmp);
		while($dataTmp = mysql_fetch_array($rslTmp)){
	  ?>
        <option value="<?php echo $dataTmp['id']; ?>" <?php if($cat_id==$dataTmp['id']){ echo " selected='selected'";}?>><?php echo $dataTmp['cat_name']; ?></option>
        <?php } ?>
      </select>
      </td>
    <td valign="middle" align="right">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="middle">Branch :</td>
    <td valign="middle"><b class="txtPrice" style="font-size:20px;"><?php echo $shopBranch[$branch_id]; ?></b></td>
    <td valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center">
	<br />
  <hr />
  <input name="Submit" type="submit" value="Add Choice" />
  <br /><br /><br /><br />
    </td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">
    
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" class="tbTitle"><b>Choice Name</b></td>
    <td align="center" class="tbTitle"><b>Price</b></td>
    <!---->
    <td align="center" class="tbTitle"><b>Catagory</b></td>
    <td align="center" class="tbTitle" width="50"><b>Delete</b></td>
    <td align="center" class="tbTitle" width="50"><b>Edit</b></td>
  </tr><?php
      	$sqlTmp = "SELECT * FROM choice2 ";
		$rslTmp = mysql_query($sqlTmp);
		while($dataTmp = mysql_fetch_array($rslTmp)){
			$ckBr =	$dataTmp['cat_id'];
			$sqlBr = "SELECT * FROM catname WHERE  id=$ckBr && cat_ordertime='$ordertime' ";
			$rslBr = mysql_query($sqlBr);
			$dataBr = mysql_fetch_array($rslBr);
				$ckBr=$dataBr['branch_id'];
	  ?>
      
      <?php if($ckBr==$branch_id){?>
  <tr>
    <td align="center" class="tbDesc"><b><?php echo $dataTmp['choice_name']; ?></b></td>
    <td align="center" class="tbDesc"><b><?php echo $dataTmp['choice_price']; ?></b></td>
    <!---->
    <td align="center" class="tbDesc"><b><?php echo $namecat[$dataTmp['cat_id']]; ?></b></td>
    <td align="center" class="tbDesc"><b><a href="#" onClick="ConfirmChoice('<?php echo $dataTmp['id'];?>', '<?php echo $branch_id;?>'); return false;"><img src="../images/bt-del.png" border="0" width="40" /></a></b></td>
    <td align="center" class="tbDesc"><b><a href="add_choice2.php?branch_id=<?php echo $branch_id;?>&id=<?php echo $dataTmp['id'];?>&cat_id=<?php echo $dataTmp['cat_id'];?>"><img src="../images/bt-edit.png" width="40" border="0" align="absmiddle" /></a></b></td>
  </tr>
  	<?php } ?>
    <?php } ?>
</table>


    </td>
    </tr>
  </table>
</form>
<?php } else { 
	
	$sql = "select * from choice2 where id='$id' ";
	$rsl = mysql_query($sql);
	$item = mysql_fetch_array($rsl);
?>
<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="edit_choice2-sys.php?branch_id=<?php echo $branch_id;?>&id=<?php echo $id;?>&cat_id=<?php echo $cat_id; ?>" >
	<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" valign="middle" width="100">Choice Name :</td>
    <td valign="middle"><input type="text" name="choice_name" id="choice_name" style="width:80%;" value="<?php echo $item['choice_name'];?>" /></td>
    <td align="right" valign="middle" width="100"> Price :</td>
    <td valign="middle"><input type="text" name="choice_price" id="choice_price" style="width:80%;" value="<?php echo $item['choice_price'];?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="middle">Catagory :</td>
    <td valign="middle"><select name="cat_id" id="cat_id">
	  <?php
      	$sqlTmp = "SELECT * FROM catname WHERE branch_id=$branch_id && cat_ordertime='$ordertime' ORDER BY id ASC";
		$rslTmp = mysql_query($sqlTmp);
		while($dataTmp = mysql_fetch_array($rslTmp)){
	  ?>
        <option value="<?php echo $dataTmp['id']; ?>" <?php if($cat_id==$dataTmp['id']){ echo " selected='selected'";}?>><?php echo $dataTmp['cat_name']; ?></option>
        <?php } ?>
      </select></td>
    <td valign="middle" align="right">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="middle">Branch :</td>
    <td valign="middle"><b class="txtPrice" style="font-size:20px;"><?php echo $shopBranch[$branch_id]; ?></b></td>
    <td valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center">
	<br />
  <hr />
  <input name="Submit" type="submit" value="Update Choice" />
    </td>
  </tr>
  </table>
</form>
<?php } ?>