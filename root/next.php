<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/24/2017
 * Time: 10:33 AM
 */
?>

<?php include('header.php'); ?>
<?php $chkPage='home'; ?>
    <!--body modify at 2017.01.24-->
    <body class="bg_home">
    <div class="container">
        <div class="logo_pepper">
            <img src="inc/img/peper-logo.png" alt="">
        </div>
    </div>

<?php if(($_SESSION['sessionLogin']=="admin") && ($_SESSION['adminBranchID']!='') ){?>
    <div id="content">

    </div>
<?php } ?>

<?php include('footer.php'); ?>