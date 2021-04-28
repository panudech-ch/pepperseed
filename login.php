<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <!--
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
-->
  <link href="inc/bootstrap.4.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

  <style>
    .bg {
      /* The image used */

      /* Full height */
      height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background: #000000;
      /* For browsers that do not support gradients */
      background: -webkit-linear-gradient(left, #252525, #000000);
      /* For Safari 5.1 to 6.0 */
      background: -o-linear-gradient(right, #252525, #000000);
      /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(right, #252525, #000000);
      /* For Firefox 3.6 to 15 */
      background: linear-gradient(to right, #252525, #000000);
      /* Standard syntax */

    }

    body {
      margin: 0;
      padding: 0;
      background-color: #17a2b8;
      height: 100vh;
    }

    #login-box {
      margin-top: 120px;
    }
  </style>
</head>

<body class="bg">
  <div id="login">
    <h3 class="text-center text-white" style="padding-top: 100px;">
      <div align="center">
        <a href="index.php"><img src="images/pepperseed_logo@2x.png" style="width: 30%;" /></a></div>
    </h3>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">


          <div id="login-box" class="col-md-12">
            <form id="form1" name="form1" method="post" action="chkLogin-sys.php">
              <div class="card" style="">
                <div class="card-body " style="padding-bottom: 0px;">

                  <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label" > <b>User name :</b> </label>
                    <div class="col-sm-8">


                      <input type="text" class="form-control" name="boxUser" id="boxUser" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label"><b>Password :</b> </label>
                    <div class="col-sm-8">

                      <input type="password" class="form-control" name="boxPw" id="boxPw" />

                    </div>
                  </div>
                </div>

              </div>
              <div class="col-12 pt-4" style="padding-left: 0px;padding-right: 0px;">

                <input name="btLogin" class="btn btn-success" type="submit" value="Login" id="btLogin" style="width: 100%;" />
                <?php

                $chklogin = $_GET['chklogin'];
                if ($chklogin == "false") {
                  echo "Your <b>'User Name'</b> or <b>'Password'</b> wrong. <br />Please try again!";
                }
                ?>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script type="text/javascript" src="inc/bootstrap.4.6/js/bootstrap.min.js"></script>
  <!--
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
          -->
</body>

</html>