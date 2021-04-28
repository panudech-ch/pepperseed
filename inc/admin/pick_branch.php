<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 1/29/2017

 * Time: 1:47 PM

 */

include('../../connect.php');

include('check_admin.php');
include('query_statement.php');
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Pepper Seeds Management</title>
    <link href="../bootstrap.4.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="../css/newfonts.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
     
        
        .bg {
            height: 100%;
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

        .dot {
            height: 14px;
            width: 14px;
            background-color: #5cb85c;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
            box-shadow: 0 0 10px #9ecaed;
        }
    </style>
</head>



<body class="bg">

    <?php

    session_start();

    $isAdmin = chkIsAdmin($_SESSION['sessionLogin']);

    $_SESSION['isAdmin'] = $isAdmin;



    if ($isAdmin) {

        ?>


        <div id="login">
            <h3 class="text-center text-white" style="padding-top: 100px;">
                <div style="text-align: center;"><img src="../../images/pepperseed_logo@2x.png" style="width: 30%;" /></div>
            </h3>
            <div class="container" style="padding-top: 60px;">
                <div id="login-row" class="row justify-content-center align-items-center">

                    <div class="col-4">
                        <div class="card border-0 mb-3">
                            <img src="../../images/brance/pic_coogee.png" class="card-img-top" style="width: 100%;" />
                            <div class="card-footer HEADER_MENU-TwilightScript text-center" style="font-size:1.8rem;">
                                <a href="#" onclick="window.location.href='../admin/menu_showOrderList.php?branch_id=3'" style="color:#163029;"><b>South Eveleigh</b></a>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12" style="text-align: center;color:white">

                                <?php
                                    $catData3 = getStatusBracne(3);
                                    $rs3 = mysql_fetch_assoc($catData3);
                                    if ($rs3['branch_name']) {
                                        ?>
                                    <span class="dot"></span><span>Online now...</span>
                                <?php
                                    } else {
                                        echo "<span style='opacity: 0;color:red'>_</span>";
                                    } ?>


                            </div>
                        </div>



                    </div>
                    <div class="col-4">
                        <div class="card border-0 mb-3">
                            <img src="../../images/brance/pic_balmain.png" class="card-img-top" style="width: 100%;" />
                            <div class="card-footer HEADER_MENU-TwilightScript text-center" style="font-size:1.8rem;">
                                <!--
                                <a href="../../admin/add_cat.php?branch=1'" style="float: right;padding-right: 0;">
                                    Balmain
                                </a>
                                 -->
                                <a href="#" onclick="window.location.href='../admin/menu_showOrderList.php?branch_id=1'"  style="color:#163029;"><b>Balmain</b></a>
                                <br>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="text-align: center;color:white">
                                <?php
                                    $catData1 = getStatusBracne(1);
                                    $rs1 = mysql_fetch_assoc($catData1);
                                    if ($rs1['branch_name']) {
                                        ?>
                                    <span class="dot"></span><span>Online now...</span>
                                <?php
                                    } else {
                                        echo "<span style='opacity: 0;color:red'>_</span>";
                                    } ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-0 mb-3">
                            <img src="../../images/brance/pic_broadway.png" class="card-img-top" style="width: 100%;" />
                            <div class="card-footer HEADER_MENU-TwilightScript text-center" style="font-size:1.8rem;">

                                <a href="#" onclick="window.location.href='../admin/menu_showOrderList.php?branch_id=2'" style="color:#163029;"><b>Broadway</b></a>
                                <!--
                                <a href="#" onclick="window.location.href='../admin/manage_order.php?branch=2'">Broadway</a>
                                -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="text-align: center;color:white">
                                <?php
                                    $catData2 = getStatusBracne(2);
                                    $rs2 = mysql_fetch_assoc($catData2);
                                    if ($rs2['branch_name']) {
                                        ?>
                                    <span class="dot"></span><span>Online now...</span>
                                <?php
                                    } else {
                                        echo "<span style='opacity: 0;color:red'>_</span>";
                                    } ?>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    <?php } else { ?>

        <div class="container">

            Please retry to login. wait 3 second... or click <a href="../../login.php" style="color: red">HERE!!</a>

        </div>

        <script type="text/javascript">
            setTimeout(function() {

                window.location = "../../login.php";

            }, 3000);
        </script>

    <?php } ?>
    <script type="text/javascript" src="../bootstrap.4.6/js/bootstrap.min.js"></script>
</body>

</html>