<?php include('../connect.php');?>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
<!--//
function ConfirmChoice(urlLink)

{
answer = confirm("Are you want delete?")
if (answer !="0")
{ location = "del_menushow-sys.php?id="+urlLink }
}
//-->
</script>

<!-- Check File befor Upload -->
<script type="text/javascript">
function AlertFilesize(){
    if(window.ActiveXObject){
        var fso = new ActiveXObject("Scripting.FileSystemObject");
        var filepath = document.getElementById('fileInput').value;
        var thefile = fso.getFile(filepath);
        var sizeinbytes = thefile.size;
    }else{
        var sizeinbytes = document.getElementById('boxMainImg').files[0].size;
    }

    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
    fSize = sizeinbytes; i=0;while(fSize>900){fSize/=1024;i++;}
    
	if (sizeinbytes > 1048576) { // 2097152 = 2mb    1048576 = 1mb 
		alert ("+++++ You can not upload file ++++++\n Please resize to less than 1 Mb \n------------------------------------\n your file is = "+(Math.round(fSize*100)/100)+' '+fSExt[i]);
		document.getElementById('boxMainImg').value = "";
		document.getElementById('boxMainImg').focus();
		return false;
	}
	
}
</script>
<!-- End Check File befor Upload -->

<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="add_menushow-sys.php" >
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" width="60">Title : </td>
    <td><input type="text" name="titlename" id="titlename" style="width:100%" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding-top:5px;">Image :
</td>
    <td><input name="boxMainImg" type="file" id="boxMainImg" style="width:100%;" onchange="AlertFilesize();"/> 
 <span>-  [ File Size less than <strong class="cmmt">1Mb</strong>]<br />
 -
 [ Max Width <strong class="cmmt">3,000px</strong>] <span  class="cmmt">[.jpg]</span></span></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input name="Submit" type="submit" value="Add Image" /></td>
  </tr>
  </table>
</form>
<div align="center" style="font-size:18px; font-style:italic; margin:0 0 15px 0;">Resize Image <a href="http://www.picresize.com/" target="_blank">Here</a></div>
<table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr class="tbTitle">
            <td class="tbHead" align="center" width="50">No.</td>
            <td class="tbHead" align="center" width="170">Title</td>
            <td class="tbHead" align="center">Images</td>
            <td class="tbHead" align="center" width="80">Delete</td>
          </tr>
			<?php 	
				$sql = "SELECT * FROM menushow ORDER BY id DESC ";	// Select Catagories
				$rsl = mysql_query($sql);	
				while($data = mysql_fetch_array($rsl)){
					$i++;
			?>
              <tr>
                <td class="tbDesc" align="center"><?php echo $i.".";?></td>
                <td class="tbDesc" align="center"><?php echo $data['titlename'];?></td>
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