<? include('../connect.php');?>
<?
	$id = $_GET['id'];
	$branch_id = $_GET['branch_id'];
?>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />
<script type="text/javascript">
<!--//
function ConfirmDelivery(urlLink, branch)

{
answer = confirm("Are you want delete?")
if (answer !="0")
{ location = "del_delivery-sys.php?id="+urlLink+"&branch_id="+branch }
}
//-->
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? if($id==''){?>
<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="add_delivery-sys.php?branch_id=<? echo $branch_id;?>" >
	<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" valign="middle" width="110">Delivery Area :</td>
    <td valign="middle"><input type="text" name="delivery_name" id="delivery_name" style="width:100%;" /></td>
    <td align="right" valign="middle" width="70"> Price :</td>
    <td valign="middle" width="70"><input type="text" name="delivery_price" id="delivery_price" style="width:100%;" /></td>
    <td align="right" valign="middle" width="120" style="padding-left:10px;"><input name="Submit" type="submit" value="Add Delivery Area" /></td>
  </tr>
  <tr>
    <td colspan="5" align="center">
	<br />
  <hr />
    </td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5">
    
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" class="tbTitle"><b>Delivery Area</b></td>
    <td align="center" class="tbTitle"><b>Price</b></td>
    <td align="center" class="tbTitle"><b>Delete</b></td>
    <td align="center" class="tbTitle"><b>Edit</b></td>
  </tr><?
      	$sqlTmp = "SELECT * FROM deliveryarea WHERE id!=1 && id!=2 && id!=15 && id!=16 && branch_id=$branch_id ";
		$rslTmp = mysql_query($sqlTmp);
		while($dataTmp = mysql_fetch_array($rslTmp)){			
	  ?>
  <tr>
    <td align="center" class="tbDesc"><b><? echo $dataTmp['area']; ?></b></td>
    <td align="center" class="tbDesc"><b>$<? echo $dataTmp['charge_price']; ?></b></td>
    <td align="center" class="tbDesc"><b><a href="#" onClick="ConfirmDelivery('<? echo $dataTmp['id'];?>', '<? echo $branch_id;?>'); return false;"><img src="../images/bt-del.png" border="0" width="40" /></a></b></td>
    <td align="center" class="tbDesc"><b><a href="add_delivery.php?id=<? echo $dataTmp['id'];?>&branch_id=<? echo $branch_id;?>"><img src="../images/bt-edit.png" width="40" border="0" align="absmiddle" /></a></b></td>
  </tr>
    <? } ?>
</table>


    </td>
    </tr>
  </table>
</form>
<? } else { 
	
	$sql = "select * from deliveryarea where id='$id' ";
	$rsl = mysql_query($sql);
	$item = mysql_fetch_array($rsl);
?>
<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="edit_delivery-sys.php?id=<? echo $id;?>&branch_id=<? echo $branch_id;?>" >
	<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" valign="middle" width="110">Delivery Area :</td>
    <td valign="middle"><input type="text" name="delivery_name" id="delivery_name" style="width:100%;" value="<? echo $item['area'];?>" /></td>
    <td align="right" valign="middle" width="70"> Price : </td>
    <td valign="middle" width="70"><input type="text" name="delivery_price" id="delivery_price" style="width:100%;" value="<? echo $item['charge_price'];?>" /></td>
    <td align="right" valign="middle" width="140" style="padding-left:10px;"> <input name="Submit" type="submit" value="Update Delivery Area" /></td>
  </tr>
  <tr>
    <td colspan="5" align="center">
	<br />
  <hr />
  
    </td>
  </tr>
  </table>
</form>
<? } ?>