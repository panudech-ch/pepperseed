<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 2/3/2017
 * Time: 11:27 AM
 */
    include('header.php');
    include('connect.php');
    include('inc/admin/query_statement.php');

    session_start();
    $chkPage='promotion';
    $_SESSION['currentPage'] = $chkPage;
    $isAdmin = $_SESSION['isAdmin'];

    $bgData = getBgByPage('bg_'.$chkPage);
    $TitleData = getContentByPageSection('Title_promotion');
    $promotionData = getPromotionIsActive();
?>
<link rel="stylesheet" href="inc/css/owl.carousel/owl.carousel.min.css">
<link rel="stylesheet" href="inc/css/owl.carousel/owl.theme.default.min.css">
<script src="inc/js/owl.carousel/owl.carousel.min.js"></script>
<body class="bg_promotion">
    <div class="left_content">
        <div class="content_aboutus">
            <?php include('inc/slide_menu.php'); ?>
        </div>
    </div>

    <div class="right_content">
        <div class="content_aboutus">
            <div class="title_header">
                <?php if($TitleData['firstpage'] != null) { echo $TitleData['firstpage']; }  else {?> Promotions <?php } ?>
                <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $TitleData['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php }?>
            </div>
            <hr class="line_title" />
            <div class="clearfixed"></div>
            <div class="slocan"><!-- JavaScript --></div>
            <div class="footer_right">
                <?php include('inc/footer_right.php'); ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="inc/js/promotion.min.js"></script>
<?php include('inc/footer.php'); ?>