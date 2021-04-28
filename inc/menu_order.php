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
$branch_id = $_SESSION['branch_id'];
$checkout_mode = getAllCheckoutSetting();
?>
<div class="menu_pepper">
    <div class="menu_pepper_item">

            <?php
            $bgDataBalmain = getBgByPage('bg_menu_balmain');
            $bgDataBroardway = getBgByPage('bg_menu_broardway');
            ?>
        <div class="pepper_order_area col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="col-xs-12 menu_recbox menu_recbox_balmain">
                <div class="menu-pepper-order menu-order-balmain" style="display:inline-block; padding-top: 10%">
                    <a href="order_online_item.php?branch_id=1" id="btn-balmain" data-bg-hover="<?php if ($bgDataBalmain != null) {
                        echo $bgDataBalmain['img_path'];
                    } else {
                        echo 'inc/img/bg-balmain.png';
                    } ?>">BALMAIN</a>
                </div>
                <!--<div style="display:inline-block;">
                    <?php if ($isAdmin) { ?><a href="inc/admin/edit_bg.php?page=menu_balmain"
                                               class="bg cboxElement"><img src="images/bt-edit.png"
                                                                           border="0"
                                                                           align="absmiddle"></a> <?php } ?>
                </div>-->
                <div class="clearfixed"></div>
                <hr class="pepper_hr_area">
                <span style="font-size: 18px !important; font-family: 'GothamLight' !important;">
                    <?php while ($rs = mysql_fetch_assoc($checkout_mode)){
                        if($rs['branch_name'] == 'Balmain'){
                            if($rs['value'] == 0) { ?>
                                DELIVERY - PICKUP
                            <?php }elseif($rs['value'] == 1){?>
                                PICKUP ONLY
                            <?php }elseif($rs['value'] == 2){?>
                                DELIVERY ONLY
                            <?php }
                        }else{
                            $checkout_broadway = $rs;
                        }
                    }?>
                </span>

                <div class="area_active" id="balmain-area">
                    <p style="font-family: 'GothamLight'; font-size: 12px; margin: 0 0 0 0; padding-top: 10%">
                    <?php $balmainAreaData = getAllActiveDeliveryArea(1);
                          $num_rows = mysql_num_rows($balmainAreaData);
                          $i = 0;
                    while ($rsBalmain=mysql_fetch_assoc($balmainAreaData)){?>
                    <?php
                        $i++;
                        echo $i == ($num_rows) ? $rsBalmain['area'].'' : $rsBalmain['area'].','; ?>
                    <?php }?>
                    </p>
                </div>
            </div>
        </div>
        <div class="pepper_order_area col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="col-xs-12 menu_recbox broadway" style="float: left;">
                <div class="menu-pepper-order menu-order-broardway" style="display:inline-block;padding-top: 10%">
<!--                    <a href="order_online_item.php?branch_id=2" id="btn-broardway" data-bg-hover="--><?php //if ($bgDataBroardway != null) {
//                        echo $bgDataBroardway['img_path'];
//                    } else {
//                        echo 'inc/img/bg-broardway.png';
//                    } ?><!--">BROADWAY</a>-->

                    <a href="javascript:void(0);" id="btn-broardway" class ="btn-broardway" data-bg-hover="<?php if ($bgDataBroardway != null) {
                        echo $bgDataBroardway['img_path'];
                    }else{
                        echo 'inc/img/bg-broardway.png';
                    }?>">BROADWAY</a>
                </div>
                <!--<div style="display:inline-block;">
                    <?php if ($isAdmin) { ?><a href="inc/admin/edit_bg.php?page=menu_broardway"
                                               class="bg cboxElement"><img src="images/bt-edit.png"
                                                                           border="0" align="absmiddle"></a> <?php } ?>
                </div>-->
                <div class="clearfixed"></div>
                <hr class="pepper_hr_area">
                <span style="font-size: 18px !important; font-family: 'GothamLight' !important;">
                    <?php
                        if($checkout_broadway['branch_name'] == 'Broadway'){
                            if($checkout_broadway['value'] == 0) { ?>
                                DELIVERY - PICKUP
                            <?php }elseif($checkout_broadway['value'] == 1){?>
                                DELIVERY - PICKUP
                            <?php }elseif($checkout_broadway['value'] == 2){?>
                                DELIVERY ONLY
                            <?php }
                        }?>
                </span>
                <div class="area_active" id="broardway-area">
                    <p style="font-family: 'GothamLight'; font-size: 12px; margin: 0 0 0 0; padding-top: 10%">
                        <?php $broardwayAreaData = getAllActiveDeliveryArea(2);
                              $num_rows = mysql_num_rows($broardwayAreaData);
                              $i = 0;
                        while ($rsBroardway=mysql_fetch_assoc($broardwayAreaData)){?>
                           <?php
                                $i++;
                                echo $i == ($num_rows) ? $rsBroardway['area'].'' :$rsBroardway['area'].','; ?>
                        <?php }?>
                    </p>
                </div>
                </p>
            </div>
        </div>
        
    </div>


</div>
<div class="modal fade" id="modal-external" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document" id="modal-dailog-external">
        <div class="modal-content" style="color: black;">
            <div class="modal-body" style="background-color: rgba(0, 0, 0, 0.8);min-height: 85px">
                <!--<div class="col-xs-5">-->
                <!--        <span style="font-size: 20px !important; font-family: 'GothamBold' !important; color: #ffffff;">-->
                <!--            <a href="https://www.foodora.com.au/restaurant/a6yv/pepper-seeds-broadway" target="_blank" style="color: #ffffff">DELIVERY</a>-->
                <!--        </span>-->
                <!--</div>-->
                <!--<div class="col-xs-1">-->
                <!--    <span style="font-size: 20px !important; font-family: 'GothamBold' !important; color: #ffffff;">|</span>-->
                <!--</div>-->
                <!--<div class="col-xs-5">-->
                <!--        <span style="font-size: 20px !important; font-family: 'GothamBold' !important; color: #ffffff;">-->
                <!--            <a href="order_online_item.php?branch_id=2" style="color: #ffffff;">PICKUP</a>-->
                <!--        </span>-->
                <!--</div>-->
                <div class="col-xs-12">
                    <span style="font-size: 20px !important; font-family: 'GothamBold' !important; color: #ffffff;">
                        Online Order Not Available
                    </span>
                </div>
                <div class="col-xs-12">
                    <span style="font-size: 20px !important; font-family: 'GothamBold' !important; color: #ffffff;">
                        Please call shop 02 9212 7553
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="inc/js/jquery-1.12.4.min.js?v=1"></script>
<script type="text/javascript" src="inc/bootstrap/js/bootstrap.min.js?v=1"></script>
<script type="text/javascript">
    $(document).ready(function () {
//        $.getScript('inc/js/jquery-1.12.4.min.js');
//        $.getScript('inc/bootstrap/js/bootstrap.min.js');

        $('a.btn-broardway').click(function () {
            jQuery.noConflict();
            window.open('https://www.ubereats.com/au/sydney/food-delivery/pepper-seeds-thai-broadway/DM-namjGQfSlUB98SUSiqQ', '_blank')
            // $('#modal-external').modal('show');
        })

        // $(".bg").colorbox({iframe: true, width: "80%", height: "80%"});

//        $('#btn-balmain').hover(function () {
//            $('.menu-order-balmain').removeClass('blur');
//            $('.menu-order-broardway').addClass('blur');
//            $('.pepper_hr_area').css('display','');
//            $('#balmain-area').slideDown('fast');
//            $('#broardway-area').slideUp('fast');
//        }, function () {
//            $('#balmain-area').hover(function () {
//
//            },function () {
//                $('.menu-pepper-order').removeClass('blur');
//                $('.pepper_hr_area').css('display','none');
//                $('#balmain-area').slideUp('fast');
//                $('#broardway-area').slideUp('fast');
//            });
//        });

//        $('#btn-balmain').on('touchstart',function(e){
//            "use strict";
//            var menu = $(this);
//            if($('.menu-order-broardway').hasClass('blur')){
//                e.preventDefault();
//                var href = menu.attr('href');
//                window.location = href;
//                return true;
//            }else{
//                e.preventDefault();
//                $('.menu-order-balmain').removeClass('blur');
//                $('.menu-order-broardway').addClass('blur');
//                $('.pepper_hr_area').css('display','');
//                $('#balmain-area').slideDown('fast');
//                $('#broardway-area').slideUp('fast');
//                return false;
//            }
//        });

//        $('#btn-broardway').hover(function () {
//            $('.menu-order-broardway').removeClass('blur');
//            $('.menu-order-balmain').addClass('blur');
//            $('.pepper_hr_area').css('display','');
//            $('#broardway-area').slideDown('fast');
//            $('#balmain-area').slideUp('fast');
//        }, function () {
//            $('#broardway-area').hover(function () {
//
//            },function () {
//                $('.menu-pepper-order').removeClass('blur');
//                $('.pepper_hr_area').css('display','none');
//                $('#broardway-area').slideUp('fast');
//            });
//        });
//
//        $('#btn-broardway').on('touchstart',function(e){
//            "use strict";
//            var menu = $(this);
//            if($('.menu-order-balmain').hasClass('blur')){
//                e.preventDefault();
//                var href = menu.attr('href');
//                window.location = href;
//                return true;
//            }else{
//                e.preventDefault();
//                $('.menu-order-broardway').removeClass('blur');
//                $('.menu-order-balmain').addClass('blur');
//                $('.pepper_hr_area').css('display','');
//                $('#broardway-area').slideDown('fast');
//                $('#balmain-area').slideUp('fast');
//                return false;
//            }
//        });
//
//        $('.right_content_order').click(function () {
//            $('.menu-pepper-order').removeClass('blur');
//            $('.pepper_hr_area').css('display','none');
//            $('#balmain-area').slideUp('fast');
//            $('#broardway-area').slideUp('fast');
//        });
//

    });
</script>
<style>
    .pepper_hr_area {
        border: solid 1px #ffffff;
    }
</style>