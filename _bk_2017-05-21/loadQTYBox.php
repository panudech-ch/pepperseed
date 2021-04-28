<?	
	$id = $_POST["id"];
	$Qty = $_POST["Qty"];
?>
<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title></title>
  
</head>

<body>
        QTY  <select name="tQty" id="tQty" onChange="Javascript:updateQTY('<? echo $id; ?>', document.getElementById('tQty').value);">
        <? for($i=1; $i<=10; $i++){ ?>
          <option value="<? echo $i; ?>" <? if($Qty==$i){ echo "selected='selected'"; } ?>><? echo $i; ?></option>        
        <? } ?>
        </select>
</body>
</html>