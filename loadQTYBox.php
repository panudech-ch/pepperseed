<?php	
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
        QTY  <select name="tQty" id="tQty" onChange="Javascript:updateQTY('<?php echo $id; ?>', document.getElementById('tQty').value);">
        <?php for($i=1; $i<=10; $i++){ ?>
          <option value="<?php echo $i; ?>" <?php if($Qty==$i){ echo "selected='selected'"; } ?>><?php echo $i; ?></option>        
        <?php } ?>
        </select>
</body>
</html>