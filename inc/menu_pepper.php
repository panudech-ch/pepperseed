<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/24/2017
 * Time: 10:53 AM
 */

include('../connect.php');
include('../inc/admin/query_statement.php');

session_start();
$isAdmin = $_SESSION['isAdmin'];
$bgDataBalmain = getBgByPage('bg_menu_balmain');
$bgDataBroardway = getBgByPage('bg_menu_broardway');
?>
<div id="wrap" style="position: absolute;z-index: 1;top: 0;left: 0;">
    <img id="img-balmain" src="<?php if ($bgDataBalmain != null) {
        echo $bgDataBalmain['img_path'];
    } else {
        echo 'inc/img/bg-balmain.png';
    } ?>" class="img-hover-homepage">
    <img id="img-broardway" src="<?php if ($bgDataBroardway != null) {
        echo $bgDataBroardway['img_path'];
    } else {
        echo 'inc/img/bg-broardway.png';
    } ?>" class="img-hover-homepage">
</div>
<div class="menu_pepper">
    <div class="small_logo">
        <img src="inc/img/peper-logo-small-new.png" alt="">
    </div>
    <div class="menu_pepper_item_home">
        <div class="pepper_area">
            <p>
            <div class="menu-pepper-home menu-balmain" style="display:inline-block;">
                <a href="#aboutus" class="scroll-item" data-scroll="aboutus" id="btn-balmain" data-bg-hover="<?php if ($bgDataBalmain != null) {
                    echo $bgDataBalmain['img_path'];
                } else {
                    echo 'inc/img/bg-balmain.png';
                } ?>">BALMAIN</a>
            </div>
            <div style="display:inline-block;">
                <?php if ($isAdmin) { ?><a href="inc/admin/edit_bg.php?page=menu_balmain"
                                           class="example6" target="_blank"><img src="images/bt-edit.png"
                                                                       border="0"
                                                                       align="absmiddle"></a> <?php } ?>
            </div>
            </p>
            <p>
            <div class="menu-pepper-home menu-broardway" style="display:inline-block;">
                <a href="#aboutus" class="scroll-item" data-scroll="aboutus" id="btn-broardway" data-bg-hover="<?php if ($bgDataBroardway != null) {
                    echo $bgDataBroardway['img_path'];
                } else {
                    echo 'inc/img/bg-broardway.png';
                } ?>">BROADWAY</a>
            </div>
            <div style="display:inline-block;">
                <?php if ($isAdmin) { ?><a href="inc/admin/edit_bg.php?page=menu_broardway"
                                           class="example6" target="_blank"><img src="images/bt-edit.png"
                                                                       border="0" align="absmiddle"></a> <?php } ?>
            </div>
            </p>
        </div>
        <hr class="pepper_hr">
        <div class="menu-pepper-home pepper_oder menu-pepper_oder">
            <p><a  href="#area-service" class="scroll-item" data-scroll="area-service"  id="btn-pepper_oder">ORDER ONLINE</a></p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $.getScript('inc/js/jquery-1.12.4.min.js');
         //$(".bg").colorbox({iframe: true, width: "80%", height: "80%"});

        var dg_H = $(window).height();
        var dg_W = $(window).width();
        $('#wrap').css({'height':dg_H,'width':dg_W});

        $('#btn-balmain').hover(function (e) {
            e.preventDefault();
            $("#wrap img#img-balmain").fadeIn(2000);
//            $(".bg_home").css('background', 'url(' + $('#btn-balmain').data("bg-hover") + ') no-repeat center center fixed');
            $('.menu-pepper-home').removeClass('blur');
            $('.menu-broardway').addClass('blur');
            $('.menu-pepper_oder').addClass('blur');
        }, function () {
            $("#wrap img#img-balmain").fadeOut(1500);
//            $(".bg_home").css('background', 'url(' + $('.bg_home').data("background") + ') no-repeat center center fixed');
            $('.menu-pepper-home').removeClass('blur');
        });

        $('#btn-broardway').hover(function (e) {
            e.preventDefault();
            $("#wrap img#img-broardway").fadeIn(2000);
//            $(".bg_home").css('background', 'url(' + $('#btn-broardway').data("bg-hover") + ') no-repeat center center fixed');
            $('.menu-pepper-home').removeClass('blur');
            $('.menu-balmain').addClass('blur');
            $('.menu-pepper_oder').addClass('blur');
        }, function () {
            $("#wrap img#img-broardway").fadeOut(1500);
//            $(".bg_home").css('background', 'url(' + $('.bg_home').data("background") + ') no-repeat center center fixed');
            $('.menu-pepper-home').removeClass('blur');
        });

        $('#btn-pepper_oder').hover(function () {
            $('.menu-pepper-home').removeClass('blur');
            $('.menu-balmain').addClass('blur');
            $('.menu-broardway').addClass('blur');
        },function(){
            $('.menu-pepper-home').removeClass('blur');
        });
    });
</script>