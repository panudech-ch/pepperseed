<?php include('connect.php');
      include('constant.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $shopName;?> - Boutique thai bites | Balmain Shop & Broadway Shop</title>
    <meta name="keywords" content="<?php echo $shopName;?>" />
    <meta name="description" content="It's been a while! In 2012, we opened Pepper Seeds with our custom menu, Focusing on Boutique Thai dining, we carefully chose dishes to please the Balmainian's fine tastebuds, because we value your love of Thai food. This inspires our creativity growth and strive for perfection on every plate. It's all in how we combine and layer the spices, cooking technique that marry perfectly with fresh Australian produce..." />
    <META name="robots" content="index,follow">
    <meta name='revisit-after' content='4 days' />

    <!-- CSS Section -->
    <?php include('inc/include_css.php')?>
    <!-- end CSS Section-->

    <!-- JS Section-->
    <?php include('inc/include_js.php');?>
    <!-- end JS Section-->

    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Carousel -->
    <link rel="stylesheet" href="inc/css/owl.carousel/owl.carousel.min.css?v=1">
    <link rel="stylesheet" href="inc/css/owl.carousel/owl.theme.default.min.css?v=1">
    <script src="inc/js/owl.carousel/owl.carousel.min.js?v=1"></script>

    <script type='text/javascript'>
        // $(document).ready(function(){
        //     $(window).scroll(function(){
        //         if ($(this).scrollTop() > 100) {
        //             $('#scroll').fadeIn();
        //         } else {
        //             $('#scroll').fadeOut();
        //         }
        //     });
        //     $('#scroll').click(function(){
        //         $("html, body").animate({ scrollTop: 0 }, 600);
        //         return false;
        //     });
        // });
    </script>
    
    <script src="https://js.stripe.com/v3/"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
</head>
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>

<div class="navtop is-hide">
    <div style="float: left">
        <button id="hidden-desktop" class="btn-nav">
            <div class="bar arrow-top-r"></div>
            <div class="bar arrow-middle-r"></div>
            <div class="bar arrow-bottom-r"></div>
        </button>
    </div>
    <div style="float: right">
        <a href="tiffin.php"> <img src="inc/img/icon/pinto.png"></a>
        <span class="cart-qty" style="font-family: 'TheMixBold';"></span>
    </div>

</div>

<script type="text/javascript">
    // $(document).ready(function () {
    //     updateQtyAndTotal();
    //     var isOnepage = $('#is-onepage');
    //     if (!isOnepage.length) {
    //         $('.navtop').removeClass('is-hide');
    //     }
    // });
</script>