<? include('../connect.php');?>
<?
	$cat_id = $_GET['cat_id'];
	$choice_price = "choice_price";
	$choice_price_dinner = "choice_price_dinner";
?>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="add_menu-sys.php?cat_id=<? echo $cat_id; ?>" >
	<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" valign="top" width="50" style="padding-top:5px;">Name :</td>
    <td valign="top" width="250"><input type="text" name="p_name" id="p_name" style="width:100%;" /></td>
    <td align="right" valign="top" width="150" style="padding-top:5px;">Catagory :</td>
    <td colspan="3" valign="top" style="padding-top:5px;"><?
      	$sqlTmp = "SELECT * FROM catname WHERE id=$cat_id ";
		$rslTmp = mysql_query($sqlTmp);
		$dataTmp = mysql_fetch_array($rslTmp);
			echo "<b>".$dataTmp['cat_name']."</b>";
	  ?></td>
    </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding-top:5px;">Detail :</td>
    <td valign="top"><textarea cols="50" id="boxDetail" name="boxDetail" rows="4" style="width:100%;"  ></textarea></td>
    <td align="right" valign="top" style="padding-top:5px;">TA Price ($)<br /><br />
<!--Dinner Price ($)<br />
<br />-->
Can Order Online<br />
<img src="../images/spicy.png" align="absmiddle" style="margin-top:4px;" /></td>
    <td valign="top" width="50"><input type="text" name="p_price" id="p_price" style="width:100%; margin-bottom:3px;" /><br />
<!--<input type="text" name="p_price_dinner" id="p_price_dinner" style="width:100%; margin-bottom:3px;" /><br />-->
<select name="show_takeaway" id="show_takeaway" style="margin-bottom:3px;">
        <option value="0">No</option>
        <option value="1"  selected='selected'>Yes</option>
      </select>
<br />
<select name="ico_spicy" id="ico_spicy" style="margin-bottom:3px;">
        <option value="0" selected="selected">No</option>
        <option value="1">Yes</option>
      </select>
      </td>
    <td align="right" valign="top" style="padding-top:5px;" width="30"></td>
    <td valign="top"></td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" align="right" valign="top"><hr /></td>
    </tr>
  <tr>
    <td colspan="6" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" style="padding:10px 0 0 0;"><strong><u>Choice</u></strong></td>
    </tr>
  <tr>
    <td valign="top">
      <?	$i = 0;
				$sql = "select * from choice WHERE cat_id='$cat_id' ORDER BY id ASC ";
				$rsl = mysql_query($sql);
				$rowChoice1 = mysql_num_rows($rsl);
				while($item = mysql_fetch_array($rsl)){	$i++;
            ?>
      <div id="con25"><input name="choice_<? echo $i;?>" type="checkbox" id="choice_<? echo $i;?>" value="<? echo $item['id'];?>" /> <? echo "<b>".$item['choice_name']."</b>  ($".number_format($item[$choice_price],2).")";  /*"/ Dinein ($".number_format($item[$choice_price_dinner],2).")"*/ ?></div>
      <? } ?>
      <input type="text" name="rowChoice1" id="rowChoice1" style="display:none;" value="<? echo $rowChoice1; ?>" />
    </td>
    </tr>
  <!----><tr>
    <td valign="top" style="padding:20px 0 0 0;"><strong><u>Choice of Step 2</u></strong></td>
    </tr>
  <tr>
    <td valign="top">
      <?	$i = 0;
                    $sql = "select * from choice2 WHERE cat_id='$cat_id' ORDER BY id ASC ";
                    $rsl = mysql_query($sql);
                    $rowChoice2 = mysql_num_rows($rsl);
                    while($item = mysql_fetch_array($rsl)){	$i++;
                ?>
      <div id="con33Nor"><input name="choice2_<? echo $i;?>" type="checkbox" id="choice2_<? echo $i;?>" value="<? echo $item['id'];?>" /> <? echo $item['choice_name'];?></div>
      <? } ?>
      <input type="text" name="rowChoice2" id="rowChoice2" style="display:none;" value="<? echo $rowChoice2; ?>" />
    </td>
    </tr>
    </table>    
    </td>
    </tr>
  <tr>
    <td colspan="6" align="right">
	<br />
  <hr />
  <input name="Submit" type="submit" value="Add Menu" />
    </td>
    </tr>
  </table>
</form>