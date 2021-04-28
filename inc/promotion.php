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
$promotionData = getPromotionIsActive();
?>

<link rel="stylesheet" href="inc/css/owl.carousel/owl.carousel.min.css?v=1">
    <link rel="stylesheet" href="inc/css/owl.carousel/owl.theme.default.min.css?v=1">
    <script src="inc/js/owl.carousel/owl.carousel.min.js?v=1"></script>

<div class="menu_pepper col-md-6" style="padding-left: 0px; padding-top:1%;">
    <p class="pro_title"></p>
    <div class="pepper_area">
        <div class="row" style="width:100%;">
           <div class="owl-carousel">
           <?php while ($rs = mysql_fetch_assoc($promotionData)){ ?>
               <div class="category">
                   <img src="<?php echo str_replace('../','',$rs['pic_path']); ?>"/>
               </div>
           <?php }?>
            </div>
        </div>
    </div>
</div>
<style>
    .pro_title{
        font-family: 'GothamLight';
        font-size: 17.59px;
        text-align: left;
    }
    @media (max-width: 768px) {
        .category img {
            width:87%;
            margin-top:10px;
        }
    }
</style>

<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:50,
    responsiveClass:true,
    lazyLoad: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
</script>