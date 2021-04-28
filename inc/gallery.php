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
$branch_id = $_SESSION['customer_branch'];
$imgGalleryBalmainData = getSlideForGalleriesPage('bg_'.'gallery_balmain');
$imgGalleryBroadwayData = getSlideForGalleriesPage('bg_'.'gallery_broadway');

//$json = file_get_contents
//('https://api.instagram.com/v1/tags/pepperseeds/media/recent?access_token=345074507.c8db088.a82b8e0b959c4e1d8461e1564fb2f282');
//$decode = json_decode($json, true);
?>


<div class="col-md-12" style="padding-left: 0px; padding-top: 1%">

    <div class="row">
        <div class="responsive-gallery">

            <a href="https://widgetic.com/widgets/social/social-media-grid/" class="widgetic-composition" data-autoscale="on" data-id="591e6951ecb2a109208b4570" data-width="100%" data-height="100%" data-resize="allow-scale-down">Social Media Grid</a><script async src="https://widgetic.com/sdk/sdk.js"></script>

            <!--            <div class="owl-carousel owl-theme">-->
<!---->
<!--            --><?php //if(mysql_num_rows($imgGalleryBalmainData) == 0){ ?>
<!--                <div class="gallery">-->
<!--                    <img src="inc/img/map-balmain.jpg" class="img-responsive img-height">-->
<!--                </div>-->
<!--            --><?php //}else {
//                while ($rs = mysql_fetch_assoc($imgGalleryBalmainData)) { ?>
<!--                <div class="gallery">-->
<!--                    <img src="--><?php //echo str_replace('../', '', $rs['img_path']); ?><!--" class="img-responsive img-height"/>-->
<!--                </div>-->
<!--                --><?php //}
//            }?>
<!--            </div>-->
<!--            <h4 class="desc">Balmain</h4>-->
<!--            --><?php //if ($isAdmin) { ?>
<!--                <div id="modify_bg" style="float: right">-->
<!--                    Edit Background<a href="inc/admin/edit_bg.php?page=gallery_balmain" class='example6'><img-->
<!--                            src="images/bt-edit.png" border="0" align="absmiddle"/></a>-->
<!--                </div>-->
<!--            --><?php //} ?>
<!--            --><?php //foreach ($decode['data'] as $data) {
//            $thumbnail = $data['images']['low_resolution']['url'];
//            ?>
<!--            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ig-gallery">-->
<!--                <a href="--><?php //echo $data['link']?><!--" target="_blank">-->
<!--                    <img src="--><?php //echo $thumbnail ?><!--" class="img-responsive img-resolution ig-img"/>-->
<!--                </a>-->
<!--            </div>-->
<!--            --><?php //}?>
        </div>


<!--        <div class="responsive-gallery">-->
<!--            <div class="owl-carousel owl-theme">-->
<!--            --><?php //if(mysql_num_rows($imgGalleryBroadwayData) == 0){ ?>
<!--                <div class="gallery">-->
<!--                    <img src="inc/img/map-pic.png" class="img-responsive img-height">-->
<!--                </div>-->
<!--            --><?php //}else {
//                while ($rsBroadway = mysql_fetch_assoc($imgGalleryBroadwayData)) { ?>
<!--                <div class="gallery">-->
<!--                    <img src="--><?php //echo str_replace('../', '', $rsBroadway['img_path']); ?><!--" class="img-responsive img-height"/>-->
<!--                </div>-->
<!--                --><?php //}
//            }?>
<!--            </div>-->
<!--            <h4 class="desc">Broadway</h4>-->
<!--            --><?php //if ($isAdmin) { ?>
<!--                <div id="modify_bg" style="float: right">-->
<!--                    Edit Background<a href="inc/admin/edit_bg.php?page=gallery_broadway" class='example6'><img-->
<!--                            src="images/bt-edit.png" border="0" align="absmiddle"/></a>-->
<!--                </div>-->
<!--            --><?php //} ?>
<!--        </div>-->
        <div class="clearfix"></div>
    </div>

</div>


<style>
    div.gallery img {
        width: 100%;
        height: auto;
    }
    h4.desc {
        padding: 15px 0;
        text-align: left;
    }
    * {
        box-sizing: border-box;
    }
    .responsive-gallery {
        float: left;
        width: 100%;
        overflow: hidden;
    }
    @media (max-width: 768px){
        .slocan-gallery .col-md-12{
            padding-right: 0;
        }
        .responsive-gallery {
            width: 100%;
        }
    }
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

</style>
<script>
//    $('.owl-carousel').owlCarousel({
//        autoplay: true,
//        autoPlaySpeed: 5000,
//        loop:true,
//        margin:50,
//        responsiveClass:true,
//        lazyLoad: true,
//        dots: false,
//        responsive:{
//            0:{
//                items:1,
//                nav:false
//            },
//            600:{
//                items:1,
//                nav:false
//            },
//            1000:{
//                items:1,
//                nav:false,
//                loop:true
//            }
//        }
//    });
//    $('.owl-carousel').owlCarousel({
//        autoplay: true,
//        autoPlaySpeed: 5000,
//        loop:true,
//        margin:50,
//        responsiveClass:true,
//        lazyLoad: true,
//        dots: false,
//        responsive:{
//            0:{
//                items:1,
//                nav:false
//            },
//            600:{
//                items:1,
//                nav:false
//            },
//            1000:{
//                items:1,
//                nav:false,
//                loop:true
//            }
//        }
//    })
</script>

