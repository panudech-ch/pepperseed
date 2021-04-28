<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pepper Seeds Management</title>
<link href="inc/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="inc/css/custom_respon.css" rel="stylesheet" type="text/css"/>
<link href="inc/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>

<body class="bg_staff">
  <div class="left_content">
    <div class="content_aboutus">
      <div class="slide_logo">
        <img src="inc/img/logo-left.png" alt="">
      </div>
      <div class="slide_menu">
      </div>
    </div>
  </div>

  <div class="right_content">
    <div class="content_aboutus">
      <div class="title_header">
        STAFF?
      </div>
      <hr class="line_title">
      <div class="clearfixed"></div>
      <div class="form-login">
        <form id="form1" name="form1" method="post" action="chkLogin-sys.php">
          <div style="padding-left: 4%; padding-bottom: 10px">
            <span style="font-family: 'GothamBook'">User name : &nbsp;&nbsp;</span><input type="text" name="boxUser" id="boxUser"  onkeypress="handle(event)" value="<?php echo isset($_GET['user']) && $_GET['user'] != 'false' ? $_GET['user'] : ''?>"/>
              <span style="color: red"> <?php echo (isset($_GET['user']) && $_GET['user'] == 'false')? "* Please Input Username.": ""?></span>
          </div>
          <div style="padding-left: 4%">
            <span style="font-family: 'GothamBook'">Password :  &nbsp;&nbsp;&nbsp;&nbsp;</span><input type="password" name="boxPw" id="boxPw" onkeypress="handle(event)" autofocus/>
            <span style="color: red"> <?php echo (isset($_GET['pw']) ) ? "* Please Input Password.": ""?></span>
          </div>
          <div class="line_form-login">
          <!--<input name="btLogin" type="submit" value="Login" id="btLogin" />-->
          </div>
          <div class="row"><a  href="#" onclick="document.forms['form1'].submit();"><span style="font-family: 'GothamBold'">LOGIN</span></a></div>

          <div class="login-error">
              <br /><?php $chklogin = isset($_GET['chklogin']) ? $_GET['chklogin'] : "";
                          $pwf = isset($_GET['pwf']) ? $_GET['pwf'] : "";
                if($chklogin=="false"){ ?>
                  <span>Your <b>'User Name'</b> or <b>'Password'</b> wrong. Please try again!</span>
                <?php }else if($pwf=="false") {?>
                  <span>Your <b>'Password'</b> wrong,Please try again!</span>
                <?php }?>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
      function handle(e) {
          var key = e.keyCode || e.which;
          if (key==13){
              document.forms['form1'].submit();
          }
      }
  </script>
<?php include('inc/footer.php'); ?>

