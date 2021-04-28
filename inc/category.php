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
$catData = getAllActiveCategoryByBranchId($branch_id);
?>



<div class="menu_pepper" style="padding-top:1%;">
        <div class="pepper_area">
            <div class="row" style="width:100%;">
               <div class="owl-carousel">
 <?php while ($rs = mysql_fetch_assoc($catData)){ ?>
        <div class="category">
                <a href="order_online_item.php?cat=<?php echo $rs['id'];?>">
                    <img src="<?php echo $rs['cat_img'] != '' ? str_replace('../','',$rs['cat_img']) : 'inc/img/icon/no-image-found.gif' ;?>">
                </a>
        </div>
<?php  }?>
</div>
            </div>
</div>

<style>
    
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
<!--            items:2,-->
<!--            nav:false-->
<!--        },-->
<!--        1000:{-->
<!--            items:3,-->
<!--            nav:false,-->
<!--            loop:false-->
<!--        },-->
<!--        1650:{-->
<!--            items:4,-->
<!--            nav:false,-->
<!--            loop:false-->
<!--        }-->
<!--    }-->
<!--})-->
<!--</script>-->