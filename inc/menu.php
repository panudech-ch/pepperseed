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
?>



<div class="menu_pepper" style="padding-top:1%;">
        <div class="pepper_area">
            <div class="row" style="width:100%;">
               <div class="owl-carousel">
        <div class="category">
            <a href="#">
                <img src="inc/img/menu/menu1.jpg">
            </a>
        </div>
        <div class="category">
           <a href="#">
               <img src="inc/img/menu/menu2.jpg">
           </a>
        </div>
        <div class="category">
           <a href="#">
               <img src="inc/img/menu/menu3.jpg">
           </a>
        </div>
</div>
            </div>
</div>

<style>

    .category img {
        max-width: 98%;
        float: left;
    }
    
    @media (max-width: 768px) {
        .category img {
            width:87%;
            margin-top:10px;
        }
    }
</style>

<!--<script>-->
<!--    $('.owl-carousel').owlCarousel({-->
<!--    loop:true,-->
<!--    margin:50,-->
<!--    responsiveClass:true,-->
<!--    lazyLoad: true,-->
<!--    responsive:{-->
<!--        0:{-->
<!--            items:1,-->
<!--            nav:false-->
<!--        },-->
<!--        600:{-->
<!--            items:1,-->
<!--            nav:false-->
<!--        },-->
<!--        1000:{-->
<!--            items:1,-->
<!--            nav:false,-->
<!--            loop:false-->
<!--        }-->
<!--    }-->
<!--})-->
<!--</script>-->