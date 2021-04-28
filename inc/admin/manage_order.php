<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 1/29/2017

 * Time: 12:08 PM

 */

include('../../connect.php');

include('query_statement.php');

?>

<?php

session_start();

$_SESSION['branch_id'] = $_GET['branch'];

$branchId = $_GET['branch'];

$branchData = getBranchById($branchId);

$chkOpenOnline = $branchData['open_close'];

$chkOpenOnlineLunch = $branchData['open_close_lunch'];



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Pepper Seeds Management</title>

    <link href="../css/custom.css" rel="stylesheet" type="text/css" />

    <link href="../css/custom_respon.css" rel="stylesheet" type="text/css" />

    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

</head>



<body class="bg_staff">

    <?php

    session_start();

    $isAdmin = $_SESSION['isAdmin'];



    if ($isAdmin) {

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

                        <div class="row" style="padding: 0; margin-left: 15px;">

                            <span style="font-family: 'GothamBold';"> You're oraganizing the Pepper Seeds - <?php echo $branchData['branch_name']; ?></span>

                        </div>

                        <div class="row" style="padding: 0; margin: 0;">

                            <div class="col-md-6">

                                <a href="menu_showOrderList.php?branch_id=<?php echo $branchId; ?>" style="float: left">

                                    <span style="font-family: 'GothamBook'; font-size: 14px;">

                                        Show order list (Today)

                                    </span>

                                </a><br />

                            </div>

                            <div class="col-md-6" style="float: right;">

                                <a href="../../admin/add_cat.php" style="float: right;padding-right: 0;">

                                    <span style="font-family: 'GothamBlack'; font-size: 14px; white-space: nowrap">

                                        Edit Backend

                                    </span>

                                </a><br />

                            </div>

                        </div>

                        <div class="row" style="padding: 0; margin: 0;">

                            <div class="col-lg-6">

                                <a href="menu_showOrderListAll.php?condition=all&branch_id=<?php echo $branchId; ?>" style="float: left">

                                    <span style="font-family: 'GothamBook'; font-size: 14px;">

                                        Show Order List (All)

                                    </span>

                                </a>

                            </div>

                            <div class="col-md-6" style="float: right;">

                                <a href="../../painpage.php" style="float: right;padding-right: 0;">

                                    <span style="font-family: 'GothamBlack'; font-size: 14px; white-space: nowrap">

                                        Edit Frontend

                                    </span>

                                </a><br />

                            </div>

                        </div>

                        <div class="row" style="margin-top: 20px;">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                <button type="button" class="<?php echo $chkOpenOnline == 1 ? 'availablebutton' : 'unavailablebutton'; ?>" style="margin-left: 15px" onclick="window.location.href='../../admin/availableonline.php?value=1&branch_id=<?php echo $branchId; ?>&opentime=dinner'">

                                    <span style="font-family: 'GothamBold'; color: white;">

                                        Available

                                    </span>

                                </button>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                <button type="button" class="<?php echo $chkOpenOnline != 1 ? 'availablebutton' : 'unavailablebutton'; ?>" style="margin-right: 15px" onclick="window.location.href='../../admin/availableonline.php?value=0&branch_id=<?php echo $branchId; ?>&opentime=dinner'">

                                    <span style="font-family: 'GothamBold'; color: white;">

                                        UnAvailable

                                    </span>

                                </button>

                            </div>

                        </div>

                        <div class="row" style="padding:0; margin-left:15px; padding-top:20px;">

                            <span style="font-family: 'GothamBook';">

                                <span class="glyphicon glyphicon-asterisk" style="color: <?php echo $chkOpenOnline == 1 ? '#80b73f' : '#414143'; ?>"></span>

                                <?php if ($chkOpenOnline == 1) {
                                        echo "Available Now..";
                                    } else {
                                        echo "UnAvailable Now..";
                                    } ?>

                            </span>

                        </div>

                        <div class="line_form-login" style="width: 96%;"></div>

                        <div class="row" style="padding: 0; margin-top: 10px;padding-bottom: 20px;">

                            <div class="col-md-6" style="float: left; margin-left:18px;">

                                <a href="pick_branch.php" style="float: left;">

                                    <span style="font-family: 'GothamBlack';">

                                        BACK TO CHOOSE VANUES

                                    </span>

                                </a>

                            </div>

                            <div class="col-md-6" style="float: right;margin-left:-18px;">

                                <a href="../../logout.php" style="float: right;">

                                    <span style="font-family: 'GothamBlack';">

                                        LOGOUT

                                    </span>

                                </a>

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

</body>

</html>