<?php include('../connect.php');?>
<?php include('../constant.php');?>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form id="form1" name="regis" method="post" enctype="multipart/form-data" action="maindetail_edit-sys.php?id=<?php echo $id;?>" >
	<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="middle" width="120">USname: </td>
    <td valign="top"><strong>admin</strong></td>
  </tr>
  <tr>
    <td valign="middle" width="90">Password :</td>
    <td valign="top"><input name="passwordAdmin" type="text" id="passwordAdmin" value="<?php echo $passwordAdmin;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="middle" width="90">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" width="90">Name :</td>
    <td valign="top"><input name="shopName" type="text" id="shopName" value="<?php echo $shopName;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="middle">Address :</td>
    <td valign="top"><input name="shopAddr" type="text" id="shopAddr" value="<?php echo $addr;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="middle">Tel :</td>
    <td valign="top"><input name="shopPhone" type="text" id="shopPhone" value="<?php echo $tel;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="middle">Tel 2 :</td>
    <td valign="top"><input name="Fax" type="text" id="Fax" value="<?php echo $fax;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="top">Opening Time :</td>
    <td valign="top"><!--<input name="shopOpen" type="text" id="shopOpen" value="<?php echo $opentime;?>" style="width:100%" />-->
    
      <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
      <textarea cols="50" id="boxDetail" name="boxDetail" rows="22" ><?php echo $opentime;?></textarea>
      <script type="text/javascript">
            //<![CDATA[
                CKEDITOR.replace( 'boxDetail',{
    
                skin            : 'kama',
                language        : 'en',
                extraPlugins    : 'uicolor',
                uiColor            : '#999',
                height            : 100,
                width            : '100%',
				contentsCss : 'body{background:#090100; color:#FFF; font-family: Arial, Helvetica, sans-serif;	font-size: 14px;} a{color:#ffcb08;}',
    
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
        </script></td>
  </tr>
  <tr>
    <td valign="middle">Email Received :</td>
    <td valign="top"><input name="shopMail" type="text" id="shopMail" value="<?php echo $toInfo;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="middle">Email info :</td>
    <td valign="top"><input name="mailforsend" type="text" id="mailforsend" value="<?php echo $mailforsend;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="middle" width="90"><img src="../images/icoFB.png" /> link :</td>
    <td valign="top"><input name="FB" type="text" id="FB" value="<?php echo $FB;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="middle" width="90"><img src="../images/icoTW.png" /> link :</td>
    <td valign="top"><input name="TW" type="text" id="TW" value="<?php echo $TW;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="middle" width="90"><img src="../images/icoIS.png" /> link :</td>
    <td valign="top"><input name="IS" type="text" id="IS" value="<?php echo $IS;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="middle" width="90"><img src="../images/icoYT.png" /> link :</td>
    <td valign="top"><input name="YT" type="text" id="YT" value="<?php echo $YT;?>" style="width:100%" /></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top" align="right">
      <br />
      <hr />
      <input name="Submit" type="submit" value="Update" /></td>
    </tr>
  </table>
</form>