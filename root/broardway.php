<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/25/2017
 * Time: 11:13 PM
 */
?>

<?php include('header.php'); ?>
<?php $chkPage = 'home'; ?>
    <!--body modify at 2017.01.24-->
    <body class="bg_broadway">

    <div class="container">
        <div class="menu_pepper">
            <div class="small_logo">
                <img src="inc/img/peper-logo.black.png" alt="">
            </div>
            <div class="menu_pepper_item">
                <div class="pepper_area">
                    <p><a href="balmain.php">BALMAIN</a></p>
                    <p><a href="broardway.php">BROARDWAY</a></p>
                </div>
                <hr class="pepper_hr">
                <div class="pepper_oder">
                    <p><a href="aboutus.php">ODER ONLINE</a></p>
                </div>
            </div>
        </div>
    </div>

<?php if (($_SESSION['sessionLogin'] == "admin") && ($_SESSION['adminBranchID'] != '')) { ?>
    <div id="content">

    </div>
<?php } ?>

<?php include('inc/footer.php'); ?>