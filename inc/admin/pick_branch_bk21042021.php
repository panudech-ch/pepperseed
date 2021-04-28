<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 1/29/2017

 * Time: 1:47 PM

 */

    include('../../connect.php');

    include('check_admin.php');

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Pepper Seeds Management</title>

    <link href="../css/custom.css" rel="stylesheet" type="text/css"/>

    <link href="../css/custom_respon.css" rel="stylesheet" type="text/css"/>

    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

</head>



<body class="bg_staff">

<?php

    session_start();

    $isAdmin = chkIsAdmin($_SESSION['sessionLogin']);

    $_SESSION['isAdmin'] = $isAdmin;



    if($isAdmin) {

?>

    <div id="content">

        <div class="left_content">

            <div class="content_aboutus">

                <div class="slide_logo">

                    <img src="../img/logo-left.png" alt="">

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

                    <span style="font-family: 'GothamBold'; padding-left: 22px; line-height: 30px;">CHOOSE YOUR BRANCH..</span>

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center; margin-bottom: 5%">

                            <button class="branchbutton" type="button" onclick="window.location.href='../admin/manage_order.php?branch=1'">

                                <span style="font-family: 'GothamBold'; color: white;"> BALMAIN</span>

                            </button>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">

                            <button class="branchbutton" type="button" onclick="window.location.href='../admin/manage_order.php?branch=2'">

                                <span style="font-family: 'GothamBold'; color: white;"> BROADWAY</span>

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

<?php } else {?>

        <div class="container">

            Please retry to login. wait 3 second... or click <a href="../../login.php" style="color: red">HERE!!</a>

        </div>

        <script type="text/javascript">

            setTimeout(function() {

                window.location="../../login.php";

            },3000);

        </script>

<?php }?>

</body>

</html>

