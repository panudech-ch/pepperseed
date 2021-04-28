<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/master.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div style="margin:0 auto;">

<div align="center" style="padding-top:200px;"><a href="index.php"><img src="images/logo.png" alt="" title="" border="0"/></a></div><br />
<form id="form1" name="form1" method="post" action="chkLogin-sys.php">
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#FFF;">
    <tr>
      <td align="right">User Name :</td>
      <td>        
        <input type="text" name="boxUser" id="boxUser" />
      </td>
    </tr>
    <tr>
      <td align="right">Password :</td>
      <td><input type="password" name="boxPw" id="boxPw" /></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td><input name="btLogin" type="submit" value="Login" id="btLogin" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="txtWhite"><br /><? $chklogin = $_GET['chklogin'];
	  	if($chklogin=="false"){echo "Your <b>'User Name'</b> or <b>'Password'</b> wrong. <br />Please try again!";}
	  ?></td>
      </tr>
  </table>
</form>
</div>
</body>
</html>