<?php include('../connect.php');?>
<?php 
	$branch_id = $_GET['branch_id'];
	
	if($_GET['mode'] == "edit"){ 
	$pagename = "edit_gal-sys";
	$id = $_GET['id'];
	
	$sql = "select * from gallery where id='$id' ";
	$rsl = mysql_query($sql);
	$data = mysql_fetch_array($rsl);
	
 } else {$pagename = "add_gal-sys"; } ?>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
<!--//
function ConfirmChoice(urlLink, branch)

{
answer = confirm("Are you want delete?")
if (answer !="0")
{ location = "del_gal-sys.php?id="+urlLink+"&branch_id="+branch }
}
//-->
</script>

<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="<?php echo $pagename; ?>.php?id=<?php echo $id; ?>&branch_id=<?php echo $branch_id; ?>" >

    <div align="center">
	<?php if($_GET['mode'] == "edit"){
				echo "<br />";
				 if($data['img_path']=="") {?>
                <img src="../images/noimg.jpg" width="100"class="imgBor" style="margin-top:3px;" />
            	<?php } else {?>
                  <img src="../images/imguploadtmp/<?php echo $data['img_path']; ?>" width="100" class="borImgProduct" />
   <?php		 } ?>   			
    <input type="text" name="boxMainImgOld" id="boxMainImgOld" style="width:150px; text-align:left; display:none;" value="<?php echo $data['img_path'];?>" />
<?php   } ?></div>
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" valign="top" style="padding-top:15px;">Image :
</td>
    <td valign="top" style="padding-top:15px;"><input name="boxMainImg" type="file" id="boxMainImg"/>
    <br />
 <span class="cmmt">Images Size [ Width 600px ] [.jpg]</span></td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding-top:15px;">Title :
</td>
    <td style="padding-top:15px;"><input name="titlename" type="text" id="titlename" style="width:100%" value="<?php echo $data['titlename'];?>" /><br /></td>
  </tr>
  <tr>
    <td align="right"></td>
    <td><?php if($_GET['mode'] == "edit"){?><input name="Button" type="button" value="< Back" onClick="Javascript:window.location='add_gal.php&branch_id=<?php echo $branch_id; ?>';" /><?php } ?> <input name="Submit" type="submit" value="Update Image" /></td>
  </tr>
  </table>
</form>
<?php if($_GET['mode'] != "edit"){?><br />
<div align="center" style="font-size:18px; font-style:italic; margin:0 0 15px 0;">Resize Image <a href="http://www.picresize.com/" target="_blank">Here</a></div>
<table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr class="tbTitle">
            <td class="tbHead" align="center" width="30">No.</td>
            <td class="tbHead" align="center">รูปภาพ</td>
            <td class="tbHead" align="center">Title</td>
            <td class="tbHead" align="center" width="50">Edit</td>
            <td class="tbHead" align="center" width="50">Del</td>
          </tr>
			<?php 	
				$sql = "SELECT * FROM gallery WHERE branch_id='$branch_id' ORDER BY id DESC ";	// Select Catagories
				$rsl = mysql_query($sql);	
				while($data = mysql_fetch_array($rsl)){
					$i++;
			?>
              <tr>
                <td class="tbDesc" align="center"><?php echo $i.".";?></td>
                <td class="tbDesc" align="center">
                  <?php if($data['img_path']=="") {?>
                  <img src="../images/noimg.jpg" width="50" class="borImgProduct" />
                  <?php } else {?>
                  <img src="../images/imguploadtmp/<?php echo $data['img_path']; ?>" width="50" class="borImgProduct" />
                  <?php } // end if?>
                </td>
                <td class="tbDesc" align="center"><?php echo $data['titlename']; ?></td>
                <td class="tbDesc" align="center"><a href="add_gal.php?mode=edit&id=<?php echo $data['id']; ?>&branch_id=<?php echo $branch_id; ?>"><img src="../images/bt-edit.png" alt="Edit" border="0" title="Edit" width="40" /></a></td>
                <td class="tbDesc" align="center"><a href="#" onClick="ConfirmChoice('<?php echo $data['id']; ?>', '<?php echo $branch_id; ?>'); return false;"><img src="../images/bt-del.png" alt="Delete" border="0" title="Delete"" width="40"  /></a></td>
              </tr>
			<?php } // end while ?>
        </table>
<?php } ?>