<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 2/3/2017
 * Time: 12:11 AM
 */
    include('header.php');
    include('connect.php');
    include('inc/admin/query_statement.php');
?>

<?php
    session_start();
    $chkPage='our_menu';
    $_SESSION['currentPage'] = $chkPage;
    $isAdmin = $_SESSION['isAdmin'];

    $bgData = getBgByPage('bg_'.$chkPage);
    $headerData = getContentByPageSection('Title_our_menu');

?>
<!--body modify at 2017.01.24-->
<link rel="stylesheet" href="inc/css/owl.carousel/owl.carousel.min.css">
<link rel="stylesheet" href="inc/css/owl.carousel/owl.theme.default.min.css">
<script src="inc/js/owl.carousel/owl.carousel.min.js"></script>
<body class="bg_aboutus" <?php if($bgData != null) {?>style="background: url(<?php echo $bgData['img_path'];?>) no-repeat center center " <?php }?>>

        <div class="left_content">
            <div class="content_aboutus">
                <?php include('inc/slide_menu.php'); ?>
            </div>
        </div>

        <div class="right_content" style="height: 100vh;">
        <?php if($isAdmin){?>
            <div id="modify_bg" style="float: right">
                Edit Background<a href="inc/admin/edit_bg.php?page=<?php echo $chkPage; ?>" class='bg'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
            </div>
        <?php }?>
        <div class="content_aboutus">

            <div class="title_header">
                <?php if($headerData['firstpage'] != null) { echo $headerData['firstpage']; }  else {?> ON OUR MENUS! <?php } ?>
                <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $headerData['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php }?>
            </div>
        </div>
            <hr class="line_title" style="margin-top:1%;">
            <div class="clearfixed"></div>
            <div class="slocan"><!-- JavaScript --></div>
            <!--<div class="footer_right">
                <?php /*include('inc/footer_right.php'); */?>
            </div>-->
        </div>
        <script type="text/javascript" src="inc/js/menu.min.js"></script>

<?php include('inc/footer.php'); ?>