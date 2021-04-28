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
$chkPage='area-service';
$_SESSION['currentPage'] = $chkPage;
$isAdmin = $_SESSION['isAdmin'];

$bgData = getBgByPage('bg_'.$chkPage);
$TitleData = getContentByPageSection('Title_area-service');
?>
<body class="bg_orderonline" <?php if($bgData != null) {?>style="background: url(<?php echo $bgData['img_path'];?>) no-repeat center center " <?php } else { echo 'inc/img/Artboard-19.png';}?>>
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

    <div class="right_content_order">
        <div class="content_aboutus">
            <div class="title_header_order">
                <?php if($TitleData['firstpage'] != null) { echo $TitleData['firstpage']; }  else {?> Choose you area! <?php } ?>
                <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $TitleData['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php }?>
            </div>
            <hr class="line_title_order">
            <div class="clearfixed"></div>
            <div class="slocan"><!-- JavaScript --></div>
            <div class="footer_right" style="padding-left:5%;">
                <?php include('inc/footer_right.php'); ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="inc/js/order.min.js"></script>

<?php include('inc/footer.php'); ?>