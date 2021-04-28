<?php include('../connect.php');?>
<?php
	$id = $_GET['id'];
	
	$sql = "select * from firstpage where id='$id' ";
	$rsl = mysql_query($sql);
	$data = mysql_fetch_array($rsl);
?>
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="edit_firstpage-sys.php?id=<?php echo $id;?>" >
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">Description :</td>
  </tr>
  <tr>
    <td valign="top">    
      <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
      <textarea cols="50" id="boxDetail" name="boxDetail" rows="22" ><?php echo $data['firstpage']; ?></textarea>
      <script type="text/javascript">
            //<![CDATA[
                CKEDITOR.replace( 'boxDetail',{
    
                skin            : 'kama',
                language        : 'en',
                extraPlugins    : 'uicolor',
                uiColor            : '#999',
                height            : 500,
                width            : '80%',
				contentsCss : 'body{background:#FFF; color:#000; font-family: Rokkitt;	font-size: 18px; line-height:23px;} a{color:#ffcc00;}',
    
                toolbar :
                    [
    
						['Source','-','Templates'],
						['Font','FontSize','TextColor','BGColor' ],
                        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                        ['NumberedList','BulletedList'],
                        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                        ['Image','Table','Smiley','SpecialChar','PageBreak','Link'],
    
                    ],
    
                filebrowserBrowseUrl : '../ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '../ckfinder/ckfinder.html?Type=Images',
                filebrowserFlashBrowseUrl : '../ckfinder/ckfinder.html?Type=Flash',
                filebrowserUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    
                } );
            //]]>
        </script>
    </td>
  </tr>
  <tr>
    <td align="right">
      <br />
      <hr />
      <input name="Submit" type="submit" value="Update" />
      </td>
  </tr>
  </table>
</form>