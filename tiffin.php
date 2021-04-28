<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/26/2017
 * Time: 7:59 PM
 */
include('header.php');
include('connect.php');
include('inc/admin/query_statement.php');
?>
<?php
session_start();
$chkPage='tiffin';
$_SESSION['currentPage'] = $chkPage;
$isAdmin = $_SESSION['isAdmin'];

$bgData = getBgByPage('bg_'.$chkPage);
$headerData = getContentByPageSection('Title_tiffin');

$branch_id = $_SESSION['customer_branch'];
$status = getStatusOrderOnline($branch_id);

while ($rs = mysql_fetch_assoc($status)){
    if($rs['open_close'] == 0){
        echo "<script>location.href='order_online_item.php?branch_id=$branch_id';</script>";
    }
}

?>
<!--body modify at 2017.01.24-->
<body class="bg_product" <?php if($bgData != null) {?>style="background: url(<?php echo $bgData['img_path'];?>) no-repeat center center " <?php }?>>
<div class="left_content">
    <div class="content_aboutus">
        <?php include('inc/slide_menu.php'); ?>
    </div>
</div>

<div class="right_content">
    <?php if($isAdmin){?>
        <div id="modify_bg" style="float: right">
            Edit Background<a href="inc/admin/edit_bg.php?page=<?php echo $chkPage; ?>" class='bg'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
        </div>
    <?php }?>
    <div class="content_aboutus">
        <div class="title_header">
            <?php if($TitleData['firstpage'] != null) { echo $TitleData['firstpage']; }  else {?> <p>Let’s make you Party!</p> <?php } ?>
            <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $TitleData['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php }?>
        </div>
        <div class="little_title">
            <?php if($SubTitleData['firstpage'] != null) { echo $SubTitleData['firstpage']; }  else {?> <p>What's on the menu?</p><?php } ?>
            <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $SubTitleData['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php } ?>
        </div>
    </div>
    <hr class="line_title" style="margin-top:1%;">
    <div class="clearfixed"></div>
    <div class="slocan" style="min-height:60vh;"><!-- JavaScript --></div>
    <div class="footer_right">
        <?php include('inc/footer_right.php'); ?>
    </div>
</div>


<?php include('inc/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.slocan')
            .load('inc/cart-detail.php')
            .css({opacity:0})
            .animate({opacity:1});
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.btn-nav').removeClass('animated');
            $('.nav-container').removeClass('showNav');
            $('.nav-container').addClass('hideNav');
        }
    });

    /* $(document).ready(function(){
     $('.slocan')
     .load('inc/cart.php')
     .css({opacity:0})
     .animate({opacity:1});
     }); */

    //    $(document).ready(function(){
    //        $('.slocan')
    //            .load('inc/cart-payment.php')
    //            .css({opacity:0})
    //            .animate({opacity:1});
    //    });
</script>
