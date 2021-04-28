<? include('../connect.php');?>
<?
	$id = $_GET['id'];
	$branch_id = $_GET['branch_id'];
?>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />
<script type="text/javascript">
<!--//
function ConfirmCatagory(urlLink, branch)

{
answer = confirm("Are you want delete?")
if (answer !="0")
{ location = "del_cat-sys.php?id="+urlLink+"&branch_id="+branch }
}
//-->
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? if($id==''){?>
<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="add_cat-sys.php?branch_id=<? echo $branch_id;?>" >
	<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" valign="middle" width="100">Catagory Name :</td>
    <td valign="middle"><input type="text" name="cat_name" id="cat_name" style="width:80%;" /></td>
    </tr>
  <!--<tr>
    <td align="right" valign="middle" width="100">Order Time:</td>
    <td valign="middle"><select name="cat_ordertime" id="cat_ordertime">
      <option value="dinner">dinner</option>
      <option value="lunch">lunch</option>
    </select></td>
    </tr>
  <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
    </tr>-->
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center">
	<!--<br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" style="padding:10px 0 0 0;"><strong><u>Choice Extra</u></strong></td>
    </tr>
  <tr>
    <td valign="top">
      <?	$i = 0;
				$sql = "select * from extra ORDER BY id ASC ";
				$rsl = mysql_query($sql);
				$rowChoice1 = mysql_num_rows($rsl);
				while($item = mysql_fetch_array($rsl)){	$i++;
            ?>
      <div id="con33Nor"><input name="extra_<? echo $i;?>" type="checkbox" id="extra_<? echo $i;?>" value="<? echo $item['id'];?>" /> <? echo $item['ex_name']." ($".number_format($item['ex_price'],2).")";?></div>
      <? } ?>
      <input type="text" name="rowChoice1" id="rowChoice1" style="display:none;" value="<? echo $rowChoice1; ?>" />
    </td>
    </tr>
</table>
    <br />-->
  <hr />
  <input name="Submit" type="submit" value="Add Catagory" />
  <br /><br /><br /><br />
    </td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">
    
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" class="tbTitle"><b>Catagory Name</b></td>
    <!--<td align="center" class="tbTitle"><b>Order Time</b></td>-->
    <td align="center" class="tbTitle"><b>Delete</b></td>
    <td align="center" class="tbTitle"><b>Edit</b></td>
  </tr><?
      	$sqlTmp = "SELECT * FROM catname WHERE branch_id=$branch_id ";
		$rslTmp = mysql_query($sqlTmp);
		while($dataTmp = mysql_fetch_array($rslTmp)){			
	  ?>
  <tr>
    <td align="center" class="tbDesc"><b><? echo $dataTmp['cat_name']; ?></b></td>
    <!--<td align="center" class="tbDesc"><b><? echo $dataTmp['cat_ordertime']; ?></b></td>-->
    <td align="center" class="tbDesc"><b><a href="#" onClick="ConfirmCatagory('<? echo $dataTmp['id'];?>', '<? echo $branch_id;?>'); return false;"><img src="../images/bt-del.png" border="0" width="40" /></a></b></td>
    <td align="center" class="tbDesc"><b><a href="add_cat.php?id=<? echo $dataTmp['id'];?>&branch_id=<? echo $branch_id;?>"><img src="../images/bt-edit.png" width="40" border="0" align="absmiddle" /></a></b></td>
  </tr>
    <? } ?>
</table>


    </td>
    </tr>
  </table>
</form>
<? } else { 
	
	$sql = "select * from catname where id='$id' ";
	$rsl = mysql_query($sql);
	$itemMenu = mysql_fetch_array($rsl);
?>
<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="edit_cat-sys.php?id=<? echo $id;?>&branch_id=<? echo $branch_id;?>" >
	<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" valign="middle" width="100">Catagory Name :</td>
    <td valign="middle"><input type="text" name="cat_name" id="cat_name" style="width:80%;" value="<? echo $itemMenu['cat_name'];?>" /></td>
    </tr>
  <tr>
    <td align="right" valign="middle" width="100">Order Time:</td>
    <td valign="middle"><select name="cat_ordertime" id="cat_ordertime">
      <option value="dinner" <? if($itemMenu['cat_ordertime']=='dinner'){ echo "selected='selected'"; }?> >dinner</option>
      <option value="lunch" <? if($itemMenu['cat_ordertime']=='lunch'){ echo "selected='selected'"; }?> >lunch</option>
    </select></td>
    </tr>
  <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
    </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center">
	<!--<br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" style="padding:10px 0 0 0;"><strong><u>Choice Extra</u></strong></td>
    </tr>
  <tr>
    <td valign="top">
      
      <?	$i = 0;
			
					$chkChoice1 = $itemMenu['extra'];
					$choice1=explode(",",$chkChoice1);
					$num1 = count($choice1);
			
				$sql = "select * from extra ORDER BY id ASC ";
				$rsl = mysql_query($sql);
				$rowChoice1 = mysql_num_rows($rsl);
				while($item = mysql_fetch_array($rsl)){	$i++;
					
					for($j=0;$j<$num1;$j++){	
						if($choice1[$j]==$item['id']){ $chkChoice = "t"; };
					}
            ?>
      <div id="con33Nor"><input name="extra_<? echo $i;?>" type="checkbox" id="extra_<? echo $i;?>" value="<? echo $item['id'];?>" <? if($chkChoice=="t"){ echo " checked='checked'";}?>/> <? echo $item['ex_name']." ($".number_format($item['ex_price'],2).")";?></div>
      <? 
				$chkChoice = ""; 
				} // end While ?>
      <input type="text" name="rowChoice1" id="rowChoice1" style="display:none;" value="<? echo $rowChoice1; ?>" />
    </td>
    </tr>
</table>
	<br />-->
  <hr />
  <input name="Submit" type="submit" value="Update Catagory" />
    </td>
  </tr>
  </table>
</form>
<? } ?>