<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 2/3/2017
 * Time: 11:15 AM
 */
include('header.php');
include('connect.php');
include('inc/admin/query_statement.php');
?>
<?php
session_start();
$chkPage='order_online';
$_SESSION['currentPage'] = $chkPage;
$isAdmin = $_SESSION['isAdmin'];
$_SESSION['customer_branch'] = $_GET['branch'];
$branch_id = $_SESSION['customer_branch'];

$bgData = getBgByPage('bg_'.$chkPage);
$TitleData = getContentByPageSection('Title_orderonline');
$subTitleData = getContentByPageSection('SubTitle_orderonline');
?>
<link rel="stylesheet" href="inc/css/owl.carousel/owl.carousel.min.css">
<link rel="stylesheet" href="inc/css/owl.carousel/owl.theme.default.min.css">
<script src="inc/js/owl.carousel/owl.carousel.min.js"></script>
<style>
    .owl-carousel .owl-item img{
        width:auto !important;
        max-width: 235px;
        max-height:460px;
    }
</style>
<body class="bg_product"  <?php if($bgData != null) {?>style="background: url(<?php echo $bgData['img_path'];?>) no-repeat center center " <?php } else { echo 'inc/img/bg-aboutus.png';}?>>
<?php if($isAdmin){?>
    <div id="modify_bg" style="float: right">
        Edit Background<a href="inc/admin/edit_bg.php?page=<?php echo $chkPage; ?>" class='bg'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
    </div>
<?php } ?>

    <div class="left_content">
        <div class="content_aboutus">
            <?php include('inc/slide_menu.php'); ?>
        </div>
    </div>

    <div class="right_content">
        <div class="content_aboutus">
            <div class="title_header">
                <?php  if($TitleData['firstpage'] != null) { echo $TitleData['firstpage']; }  else {?> <p>Love by you,</br>Delivery by us</p> <?php } ?>
                <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $TitleData['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php }?>
            </div>
            <div class="little_title">
                <?php if($subTitleData['firstpage'] != null) { echo $subTitleData['firstpage']; }  else {?> <p>What's on the menu?</p> <?php } ?>
                <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $subTitleData['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php }?>
            </div>
        </div>
        <hr class="line_title" style="margin-top:1%;">
        <div class="clearfixed"></div>
        <div class="slocan"><!-- JavaScript --></div>
        <div class="footer_right">
            <?php include('inc/footer_right.php'); ?>
        </div>
    </div>
    <script type="text/javascript" src="inc/js/area.min.js"></script>

<?php include('inc/footer.php'); ?>