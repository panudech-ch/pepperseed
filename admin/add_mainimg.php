<?php include('../connect.php');?>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
<!--//
function ConfirmChoice(urlLink)

{
answer = confirm("Are you want delete?")
if (answer !="0")
{ location = "del_mainimg-sys.php?id="+urlLink }
}
//-->
</script>

<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="add_mainimg-sys.php" >
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" valign="top" style="padding-top:5px;">Image :
</td>
    <td><input name="boxMainImg" type="file" id="boxMainImg"/> <input name="Submit" type="submit" value="Add Image" />
    <br />
 <span>Images Size [ Width <strong class="cmmt">360px</strong> X Height <strong class="cmmt">320px</strong>] <span  class="cmmt">[.jpg]</span></span></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
</form>
<div align="center" style="font-size:18px; font-style:italic; margin:0 0 15px 0;">Resize Image <a href="http://www.picresize.com/" target="_blank">Here</a></div>
<table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr class="tbTitle">
            <td class="tbHead" align="center" width="50">No.</td>
            <td class="tbHead" align="center">Images</td>
            <td class="tbHead" align="center" width="80">Delete</td>
          </tr>
			<?php
				$sql = "SELECT * FROM mainimg ORDER BY id DESC ";	// Select Catagories
				$rsl = mysql_query($sql);	
				while($data = mysql_fetch_array($rsl)){
					$i++;
			?>
              <tr>
                <td class="tbDesc" align="center"><?php echo $i.".";?></td>
                <td class="tbDesc" align="center">
                  <?php if($data['img_path']=="") {?>
                  <img src="../images/noimg.jpg" width="60" height="50" class="borImgProduct" />
                  <?php } else {?>
                  <img src="../images/imguploadtmp/<?php echo $data['img_path']; ?>" width="50" class="borImgProduct" />
                  <?php } // end if?>
                </td>
                <td class="tbDesc" align="center"><a href="#" onClick="ConfirmChoice(<?php echo $data['id']; ?>); return false;"><img src="../images/bt-del.png" alt="Delete" border="0" title="Delete" /></a></td>
              </tr>
			<?php } // end while ?>
        </table>