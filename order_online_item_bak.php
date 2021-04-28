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
    $chkPage='order_online_item';
    $_SESSION['currentPage'] = $chkPage;
    $isAdmin = $_SESSION['isAdmin'];
    if($_SESSION['customer_branch'] != '' && $_SESSION['customer_branch'] != $_GET['branch_id']){
        session_regenerate_id(true);
        $branch_id = $_GET['branch_id'];
        $_SESSION['customer_branch'] = $branch_id;
    }else{
        $branch_id = $_GET['branch_id'];
        $_SESSION['customer_branch'] = $branch_id;
    }
    //$_SESSION['cat'] = $_GET['cat'];

    $bgData = getBgByPage('bg_'.$chkPage);
    $TitleDataBalmain = getContentByPageSection('Title_orderonline_item_balmain');
    $SubTitleDataBalmain = getContentByPageSection('SubTitle_orderonline_item_balmain');
    $TitleDataBroadway = getContentByPageSection('Title_orderonline_item_broadway');
    $SubTitleDataBroadway = getContentByPageSection('SubTitle_orderonline_item_broadway');
    $closeDataBalmain = getContentByPageSection('Close_orderonline_item_balmain');
    $closeDataBroadway = getContentByPageSection('Close_orderonline_item_broadway');
    $status = getStatusOrderOnline($branch_id);
?>
<body class="bg_product" <?php if($bgData != null) {?>style="background: url(<?php echo $bgData['img_path'];?>) no-repeat center center fixed" <?php } else { echo 'inc/img/bg-aboutus.png';}?>>
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
        <?php } ?>
        <div class="content_aboutus">
            <div class="title_header header-online-item">
                <div style="float: left;">
                    <?php if( $branch_id == 1 ? $TitleDataBalmain['firstpage'] != null : $TitleDataBroadway['firstpage'] != null) { echo $branch_id == 1 ? $TitleDataBalmain['firstpage'] : $TitleDataBroadway['firstpage']; }  else {?> <p>Love by you,</br>Delivery by us</p> <?php } ?>
                    <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $branch_id == 1 ? $TitleDataBalmain['id'] : $TitleDataBroadway['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php }?>
                </div>
                <?php include('cart_item.php'); ?>
            </div>
            <div class="clearfixed"></div>
            <div class="little_title">
                <?php if( $branch_id == 1 ? $SubTitleDataBalmain['firstpage'] != null : $SubTitleDataBroadway['firstpage'] != null) { echo $branch_id == 1 ? $SubTitleDataBalmain['firstpage'] : $SubTitleDataBroadway['firstpage']; }  else {?> <p>What's on the menu?</p><?php } ?>
                <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $branch_id == 1 ? $SubTitleDataBalmain['id'] : $SubTitleDataBroadway['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php } ?>
            </div>
        </div>
        <hr class="line_title" style="margin-top:1%;">
        <div class="clearfixed"></div>

                <?php while ($rs = mysql_fetch_assoc($status)){
                    if($rs['open_close'] == 0){
                        $_SESSION['order_on'] = 'no';?>
                        <div class="title_icon col-md-1" style="width:5%; padding-left: 0;"><img class="icon_pep" src="inc/img/icon/sory.png" alt=""></div>
                        <div class="little_title col-md-11" style="width: 95%; font-size: 24.36px; padding-left: 0;">
                            <?php if ( $branch_id == 1 && $closeDataBalmain['firstpage'] != null ) { echo $closeDataBalmain['firstpage']; } elseif ($branch_id == 2 && $closeDataBroadway['firstpage'] != null) { echo $closeDataBroadway['firstpage']; } else {?>
                             <p>Store is currently closed! Please come back later.</p>
                             <p>Open Mon - Sun 5:30pm -10pm</p>
                             <?php } ?>
                        </div>
                <?php }else{
                        $_SESSION['order_on'] = 'yes';
                    }
                } ?>

        <div class="clearfixed"></div>
        <div class="slocan"><!-- JavaScript --></div>
        <div class="footer_right">
            <?php include('inc/footer_right.php'); ?>
        </div>
    </div>
    <script type="text/javascript" src="inc/js/item.min.js"></script>

    <script>
        $(document).on('click', '.scroll-item', function() {
            var scrollAnchor = $(this).data('scroll'),
                scrollPoint = $('*[data-anchor="' + scrollAnchor + '"]').offset().top;
            $('body,html').animate({
                scrollTop: scrollPoint
            }, 750);

            return false;

        });
        $(document).on('click', '.scroll-item-inner', function() {
            var scrollAnchor = $(this).data('scroll'),
                scrollPoint = $('*[data-anchor="' + scrollAnchor + '"]').offset().top;
            $('body,html').animate({
                scrollTop: scrollPoint
            }, 750);

            return false;

        });

        // Scroll
        $(window).scroll(function() {
            var windscroll = $(window).scrollTop();
            $('section.section').each(function(i) {
                if ($(this).position().top - 20 <= windscroll) {
                    $('.slide_menu ul .menu_item.is-active').removeClass('is-active');
                    $('.slide_menu ul .menu_item').eq(i-1).addClass('is-active');
                } else {
                    $('.slide_menu ul .menu_item').eq(i-1).removeClass('is-active');
                }
            });
            $('.inner-section').each(function(i) {
                if ($(this).offset().top - 20 <= windscroll) {
                    $('#sub_menus .sub_item.is-active').removeClass('is-active');
                    $('#sub_menus .sub_item').eq(i).addClass('is-active');
                } else {
                    $('#sub_menus .sub_item').eq(i).removeClass('is-active');
                }
            });
        }).scroll();
    </script>

    <?php include('inc/footer.php'); ?>

    <style>
        .footer_custom{
            display: block;
        }
    </style>
<script type="text/javascript">
    $(document).ready(function () {
       updateQtyAndTotal();
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.btn-nav').removeClass('animated');
            $('.nav-container').removeClass('showNav');
            $('.nav-container').addClass('hideNav');
        }
    });
</script>