<?php
include('header.php');
include('connect.php');
include('inc/admin/check_admin.php');
include('inc/admin/query_statement.php');
include('booking_controller.php');
?>
<?php
session_start();
$chkPage = 'home';
$_SESSION['currentPage'] = $chkPage;
$isAdmin = $_SESSION['isAdmin'];

$bgData = getBgByPage('bg_' . 'home');
$bgAboutusData = getBgByPage('bg_' . 'aboutus');
$bgAreaServiceData = getBgByPage('bg_' . 'area_service');
$bgPromotionData = getBgByPage('bg_' . 'promotion');
$bgGalleryData = getBgByPage('bg_' . 'gallery');
$bglocationBalmainData = getBgByPage('bg_' . 'location_balmain');
$bglocationBroadwayData = getBgByPage('bg_' . 'location_broadway');

$headerAboutData = getContentByPageSection('Title_aboutus');
$headerAreaServiceData = getContentByPageSection('Title_areaservice');
$headerPromotionData = getContentByPageSection('Title_promotion');
$headerMenuData = getContentByPageSection('Title_menu');
$headerBookData = getContentByPageSection('Title_booking');
$headerGalleryData = getContentByPageSection('Title_gallery');

$topicData = getContentByPageSection('Booking_topic');
$detailBalmianMap = getContentByPageSection('detail_balmain_map');
$detailBroadwayMap = getContentByPageSection('detail_broadway_map');

$useragent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) { ?>
    <link href="datePicker/css/default.css" rel="stylesheet" type="text/css"/>
    <link href="datePicker/css/default.date.css" rel="stylesheet" type="text/css"/>
<?php } else { ?>
    <link href="datePicker/css/classic.css" rel="stylesheet" type="text/css"/>
    <link href="datePicker/css/classic.date.css" rel="stylesheet" type="text/css"/>
<?php }
?>
    <!--body modify at 2017.01.24-->
    <body>

<!-- Home -->
<input type="hidden" id="is-onepage" data-value="true">

<div id="onepage" style="display: none;"></div>
<section class="section bg_home" id="home-page" data-anchor="home-page"
         <?php if ($bgData != null) { ?>style="background: url(<?php echo $bgData['img_path']; ?>) no-repeat center center " <?php } else {
    echo 'inc/img/bg-home.png';
} ?>>
    <?php if ($isAdmin) { ?>
        <div id="modify_bg" style="float: right">
            Edit Background<a href="inc/admin/edit_bg.php?page=home" class='example6'><img src="images/bt-edit.png"
                                                                                           border="0"
                                                                                           align="absmiddle"/></a>
        </div>
    <?php } ?>
    <div class="container"><!--JavaScript--></div>
</section>

<!-- Slide Menu -->
<div class="left_content is-menu">
    <div class="content_aboutus">
        <?php include('inc/slide_menu_new.php'); ?>
    </div>
</div>

<!-- About Us -->
<section class="section bg_aboutus" id="aboutus" data-anchor="aboutus"
         <?php if ($bgAboutusData != null) { ?>style="background: url(<?php echo $bgAboutusData['img_path']; ?>) no-repeat center center " <?php echo $bgAboutusData['img_path'];
} ?>>
    <div class="right_content">
        <?php if ($isAdmin) { ?>
            <div id="modify_bg" style="float: right">
                Edit Background
                <a href="inc/admin/edit_bg.php?page=aboutus" class='example6'>
                    <img src="images/bt-edit.png" border="0" align="absmiddle"/>
                </a>
            </div>
        <?php } ?>
        <div class="content_aboutus">
            <div class="title_header">
                <?php if ($headerAboutData['firstpage'] != null) {
                    echo $headerAboutData['firstpage'];
                } else { ?> DARLINGS! <?php } ?>
                <?php if ($isAdmin) { ?> <a href="admin/edit_firstpage.php?id=<?php echo $headerAboutData['id']; ?>"
                                            class="example6"><img src="images/bt-edit.png" border="0"
                                                                  align="absmiddle"/></a> <?php } ?>
            </div>
            <hr class="line_title">
            <div class="clearfixed"></div>
            <div class="slocan-about"><!-- JavaScript --></div>
            <!--<div class="about-mockup" style="opacity: 0; visibility: hidden;"></div>-->
        </div>
    </div>
    <div class="clearfix"></div>
</section>


<!-- Service Area -->
<section class="section bg_orderonline" id="area-service" data-anchor="area-service"
         <?php if ($bgAreaServiceData != null) { ?>style="background: url(<?php echo $bgAreaServiceData['img_path']; ?>) no-repeat center center " <?php } ?>>
    <div class="right_content_order">
        <?php if ($isAdmin) { ?>
            <div id="modify_bg" style="float: right">
                Edit Background
                <a href="inc/admin/edit_bg.php?page=area_service" class='example6'>
                    <img src="images/bt-edit.png" border="0" align="absmiddle"/>
                </a>
            </div>
        <?php } ?>
        <div class="content_aboutus">
            <div class="title_header_order" style="color: #000;">
                <?php if ($headerAreaServiceData['firstpage'] != null) {
                    echo $headerAreaServiceData['firstpage'];
                } else { ?> Choose you area! <?php } ?>
                <?php if ($isAdmin) { ?>
                    <a href="admin/edit_firstpage.php?id=<?php echo $headerAreaServiceData['id']; ?>" class="example6">
                        <img src="images/bt-edit.png" border="0" align="absmiddle"/>
                    </a>
                <?php } ?>
            </div>
            <hr class="line_title_order" style="border: solid 2px #000;">
            <div class="clearfixed"></div>
            <div class="slocan-order"><!-- JavaScript --></div>
        </div>
    </div>
    <div class="clearfix"></div>

</section>

<!-- Promotion -->
<section class="section bg_promotion" id="promotion" data-anchor="promotion"
         <?php if ($bgPromotionData != null) { ?>style="background: url(<?php echo $bgPromotionData['img_path']; ?>) no-repeat center center " <?php } ?>>
    <div class="right_content">
        <?php if ($isAdmin) { ?>
            <div id="modify_bg" style="float: right">
                Edit Background
                <a href="inc/admin/edit_bg.php?page=promotion" class='example6'>
                    <img src="images/bt-edit.png" border="0" align="absmiddle"/>
                </a>
            </div>
        <?php } ?>
        <div class="content_aboutus">
            <div class="title_header">
                <?php if ($headerPromotionData['firstpage'] != null) {
                    echo $headerPromotionData['firstpage'];
                } else { ?> PROMOTIONS <?php } ?>
                <?php if ($isAdmin) { ?>
                    <a href="admin/edit_firstpage.php?id=<?php echo $headerPromotionData['id']; ?>" class="example6">
                        <img src="images/bt-edit.png" border="0" align="absmiddle"/>
                    </a>
                <?php } ?>
            </div>
            <hr class="line_title"/>
            <div class="clearfixed"></div>
            <div class="slocan-promotion"><!-- JavaScript --></div>
            <div class="footer_right">
                <?php //include('inc/footer_right.php'); ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>

<!-- Menus -->
<div class="book_container bg_booking">
    <section class="section auto_section" id="menus" data-anchor="menus">
        <div class="right_content right_long">
            <div class="content_aboutus">
                <div class="menu_box">
                    <div class="title_header">
                        <?php if ($headerMenuData['firstpage'] != null) {
                            echo $headerMenuData['firstpage'];
                        } else { ?> ON OUR MENUS! <?php } ?>
                        <?php if ($isAdmin) { ?>
                            <a href="admin/edit_firstpage.php?id=<?php echo $headerMenuData['id']; ?>" class="example6">
                                <img src="images/bt-edit.png" border="0" align="absmiddle"/>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="separate"></div>
                    <a href="inc/pdf/menu.pdf" target="_blank" class="button download">Downloadable Menu</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <section class="section auto_section" id="booking" data-anchor="booking">
        <div class="right_content right_long">
            <div class="content_aboutus">
                <div class="menu_booking">
                    <div class="title_header">
                        <?php if ($headerBookData['firstpage'] != null) {
                            echo $headerBookData['firstpage'];
                        } else { ?> BOOK A TABLE <?php } ?>
                        <?php if ($isAdmin) { ?> <a
                            href="admin/edit_firstpage.php?id=<?php echo $headerBookData['id']; ?>"
                            class="example6"><img src="images/bt-edit.png" border="0"
                                                  align="absmiddle"/></a> <?php } ?>
                    </div>
                    <p class="sub_title"></p>

                    <div class="separate"></div>
                    <?php if ($topicData['firstpage'] != null) {
                        echo $topicData['firstpage'];
                    } else { 
                    echo '<p class="open">now open 7 days
                        <small>Balmain 5.30pm - 10pm | Broadway 10am-9pm</small>
                        </p>';
                    } ?>
                    <?php if ($isAdmin) { ?> <a
                            href="admin/edit_firstpage.php?id=<?php echo $topicData['id']; ?>"
                            class="example6"><img src="images/bt-edit.png" border="0"
                                                  align="absmiddle"/></a> 
                    <?php } ?>
                    
                    <a href="booking.php" target="_blank" class="button booking">RESERVE NOW</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
</div>

<!-- locations -->
<section class="section" id="store" data-anchor="store">
    <!-- Balmain -->
    <section class="inner-section" id="store-balmain" data-anchor="store-balmain">
        <div id="balmailmap" style="opacity: 0.5;"></div>
        <div class="right_content full_height_d">
            <div class="content_aboutus">
                <div id="contactform">
                    <?php if ($detailBalmianMap['firstpage'] != null) {
                        echo $detailBalmianMap['firstpage'];
                    } else { ?>
                        <p class="contactform_title">BALMAIN</p>
    
                        <p class="contactform_address">10/418 Darling Street</p>
    
                        <p class="contactform_address">Balmain, Sydney</p>
    
                        <p class="contactform_detail">9555-5248</p>
    
                        <p class="contactform_detail">OPENING TIMES:</p>
    
                        <p class="contactform_detail">Everyday: 5.30pm.-10pm.</p>
                    <?php }?>
                     <?php if ($isAdmin) { ?> <a
                            href="admin/edit_firstpage.php?id=<?php echo $detailBalmianMap['id']; ?>"
                            class="example6"><img src="images/bt-edit.png" border="0"
                                                  align="absmiddle"/></a> 
                    <?php } ?>
                    
                </div>
                <div id="directionlink">
                    <a href="https://maps.google.com/maps?ll=-33.856198,151.173802&z=18&t=m&hl=th-TH&gl=AU&mapclient=embed&daddr=Pepper%20Seeds%20%22Boutique%20Thai%20Bites%22%2010%2F418%20Darling%20St%20Balmain%20NSW%202041@-33.8561621,151.1745952"
                       target="_blank">
                        <span><img src="inc/img/icon/icon-get-direction.png" alt="">&nbsp;<span>Get direction</span>
                            <div id="profile-picture">
                                <img class="responsive profile-photo img-height"
                                     src="<?php echo $bglocationBalmainData != null ? $bglocationBalmainData['img_path'] : "inc/img/map-balmain.jpg"; ?>"
                                     alt="">
                            </div>
                    </a>
                    <?php if ($isAdmin) { ?>
                        <div id="modify_bg" style="float: left; color: black">
                            Edit Image<a href="inc/admin/edit_bg.php?page=location_balmain" class='example6'><img
                                    src="images/bt-edit.png" border="0" align="absmiddle"/></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <!-- Broardway -->
    <section class="inner-section" id="store-broardway" data-anchor="store-broardway">
        <div id="broardwaymap" style="opacity: 0.5;"></div>
        <div class="right_content full_height_d">
            <div class="content_aboutus">
                <div id="contactform">
                    <?php if ($detailBroadwayMap['firstpage'] != null) {
                        echo $detailBroadwayMap['firstpage'];
                    } else { ?>
                        <p class="contactform_title">BROADWAY</p>
    
                        <p class="contactform_address">Broadway Shop 221,</p>
    
                        <p class="contactform_address">Level 2 Broardway,Sydney</p>
    
                        <p class="contactform_detail">9212-7553</p>
    
                        <p class="contactform_detail">OPENING TIMES:</p>
    
                        <p class="contactform_detail">Everyday: 10am - 9pm.</p>
                    <?php } ?>
                     <?php if ($isAdmin) { ?> <a
                            href="admin/edit_firstpage.php?id=<?php echo $detailBroadwayMap['id']; ?>"
                            class="example6"><img src="images/bt-edit.png" border="0"
                                                  align="absmiddle"/></a> 
                    <?php } ?>
                </div>
                <div id="directionlink">
                    <a href="https://maps.google.com/maps?ll=-33.883611,151.193871&z=18&t=m&hl=th-TH&gl=TH&mapclient=embed&daddr=Pepper%20Seeds%20Thai%20Broadway%20Shopping%20Centre%2090%2F86%20Bay%20St%20Glebe%20NSW%202037%20%E0%B8%AD%E0%B8%AD%E0%B8%AA%E0%B9%80%E0%B8%95%E0%B8%A3%E0%B9%80%E0%B8%A5%E0%B8%B5%E0%B8%A2@-33.8836106,151.1938708"
                       target="_blank">
                        <span><img src="inc/img/icon/icon-get-direction.png" alt="">&nbsp;<span>Get direction</span>
                            <div id="profile-picture">
                                <img class="responsive profile-photo img-height"
                                     src="<?php echo $bglocationBroadwayData != null ? $bglocationBroadwayData['img_path'] : "inc/img/map-pic.png"; ?>"
                                     alt="">
                            </div>
                    </a>
                    <?php if ($isAdmin) { ?>
                        <div id="modify_bg" style="float: left; color: black">
                            Edit Image<a href="inc/admin/edit_bg.php?page=location_broadway" class='example6'><img
                                    src="images/bt-edit.png" border="0" align="absmiddle"/></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>

</section>

<!-- Gallery -->
<section class="section bg_aboutus" id="gallery" data-anchor="gallery"
         <?php if ($bgGalleryData != null) { ?>style="background: url(<?php echo $bgGalleryData['img_path']; ?>) no-repeat center center " <?php } ?>>
    <div class="right_content">
        <?php if ($isAdmin) { ?>
            <div id="modify_bg" style="float: right">
                Edit Background
                <a href="inc/admin/edit_bg.php?page=gallery" class='example6'>
                    <img src="images/bt-edit.png" border="0" align="absmiddle"/>
                </a>
            </div>
        <?php } ?>
        <div class="content_aboutus">
            <div class="title_header">
                <!--                --><?php //if ($headerGalleryData['firstpage'] != null) {
                //                    echo $headerGalleryData['firstpage'];
                //                } else { ?><!-- GALLERIES --><?php //} ?>
                <!--                --><?php //if ($isAdmin) { ?>
                <!--                    <a href="admin/edit_firstpage.php?id=-->
                <?php //echo $headerGalleryData['id']; ?><!--" class="example6">-->
                <!--                        <img src="images/bt-edit.png" border="0" align="absmiddle"/>-->
                <!--                    </a>-->
                <!--                --><?php //} ?>
            </div>
            <hr class="line_title" style="width: 98%"/>
            <div class="clearfixed"></div>
            <div class="slocan-gallery"><!-- JavaScript --></div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>


<script src="inc/js/jquery.mousewheel-3.0.4.pack.js?v=56682" charset="utf-8"></script>
<script type="text/javascript" src="inc/js/index.min.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?address=Pepper+Seeds+%22Boutique+Thai+Bites&sensor=false&key=AIzaSyAb5FG7j3FNNJvUR2xA7jvYvAYkUXAys2U"></script>
<script>

    $(document).on('click', '.scroll-item', function () {
        var scrollAnchor = $(this).data('scroll'),
            scrollPoint = $('*[data-anchor="' + scrollAnchor + '"]').offset().top;
        $('body,html').animate({
            scrollTop: scrollPoint
        }, 750);

        return false;

    });
    $(document).on('click', '.scroll-item-inner', function () {
        var scrollAnchor = $(this).data('scroll'),
            scrollPoint = $('*[data-anchor="' + scrollAnchor + '"]').offset().top;
        $('body,html').animate({
            scrollTop: scrollPoint
        }, 750);

        return false;

    });

    // Scroll
    // $('.navtop').addClass('is-hide');
    $(window).scroll(function () {
        var windscroll = $(window).scrollTop();
        $('section.section').each(function (i) {
            if ($(this).position().top - 20 <= windscroll) {
                $('.slide_menu ul .menu_item.is-active').removeClass('is-active');
                $('.slide_menu ul .menu_item').eq(i - 1).addClass('is-active');
            } else {
                $('.slide_menu ul .menu_item').eq(i - 1).removeClass('is-active');
            }
        });
        $('.inner-section').each(function (i) {
            if ($(this).offset().top - 20 <= windscroll) {
                $('#sub_menus .sub_item.is-active').removeClass('is-active');
                $('#sub_menus .sub_item').eq(i).addClass('is-active');
            } else {
                $('#sub_menus .sub_item').eq(i).removeClass('is-active');
            }
        });
        var sectionAbout = $('.section#aboutus').offset().top;
        if (windscroll > 1) {
            $('.left_content.is-menu').addClass('is-active');

            $('.navtop').removeClass('is-hide');
        } else {
            $('.left_content.is-menu').removeClass('is-active');

            $('.navtop').addClass('is-hide');
        }
    }).scroll();

    // Print
    function printIt() {
        var wnd = window.open('inc/pdf/menu.pdf');
        wnd.print();
    }

    // about us
    var abtTop = $('#aboutus').position().top;
    var pass = 0;
    <?php
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {?>
    $(document).ready(function () {
        $('.slocan-about')
            .load('inc/history.php')
            .css({opacity: 0})/*set opacity to 0*/
            .delay(2E0)/*wait 2 seconds*/
            .animate({opacity: 1}, 2000)
    });
    <?php } else { ?>
    $(window).scroll(function () {
        if ($(this).scrollTop() >= abtTop) {
            $('.about-mockup').load('inc/history.php');
            if (pass == 0) {
                $('.slocan-about')
                    .load('inc/slocan.php')
                    .css({opacity: 0})/*set opacity to 0*/
                    .delay(2E0)/*wait 2 seconds*/
                    .animate({opacity: 1});
                setTimeout(function () {
                    $('.slocan-about').load('inc/history.php', function () {
                        $(this).css({opacity: 0})/*set opacity to 0*/
                            .delay(4E0)/*wait 2 seconds*/
                            .animate({opacity: 1});
                    });
                }, 5000);
                pass = 1;
            }
        }
    });
    <?php } ?>


    // Order
    $(document).ready(function () {
        $('.slocan-order')
            .load('inc/menu_order.php')
            .css({opacity: 0})/*set opacity to 0*/
            .delay(2E0)/*wait 2 seconds*/
            .animate({opacity: 1}, 2000);

        $('a.btn-broardway').click(function () {
            jQuery.noConflict();
            $('#modal-external').modal('show');
        })
    });

    // Promotion
    $(document).ready(function () {
        $('.slocan-promotion')
            .load('inc/promotion.php')
            .css({opacity: 0})/*set opacity to 0*/
            .delay(2E0)/*wait 2 seconds*/
            .animate({opacity: 1}, 2000)
    });

    // Gallery
    $(document).ready(function () {
        $('.slocan-gallery')
            .load('inc/gallery.php')
            .css({opacity: 0})/*set opacity to 0*/
            .delay(2E0)/*wait 2 seconds*/
            .animate({opacity: 1}, 2000)
    });

    // Booking
    $(document).ready(function () {
        var $input = $('#book_date').pickadate({
            formatSubmit: 'dd/mm/yyyy',
            min: true,
            container: '#container',
            // editable: true,
            closeOnSelect: true,
            closeOnClear: false,
            today: '',
            clear: '',
            close: ''
        });
        var picker = $input.pickadate('picker');

        $('#book_venue').on('click', function () {
            $(this).find("option[value*='0']").prop("disabled", true);
        });
        $('#book_numP').on('click', function () {
            $(this).find("option[value*='0']").prop("disabled", true);
        });
    });
    function populateTime(value) {
        if (value == 1) {
            $('#timepicker1 option').each(function () {
                $(this).remove();
            });
            $('#timepicker1')
                .append('<option value="5:00pm">5:00pm</option>')
                .append('<option value="5:30pm">5:30pm</option>')
                .append('<option value="6:00pm">6:00pm</option>')
                .append('<option value="6:30pm">6:30pm</option>')
                .append('<option value="7:00pm">7:00pm</option>')
                .append('<option value="7:30pm">7:30pm</option>')
                .append('<option value="8:00pm">8:00pm</option>')
                .append('<option value="8:30pm">8:30pm</option>')
                .append('<option value="9:00pm">9:00pm</option>')
                .append('<option value="9:30pm">9:30pm</option>');
        } else if (value == 2) {
            $('#timepicker1 option').each(function () {
                $(this).remove();
            });
            $('#timepicker1')
                .append('<option value="10:00am">10:00am</option>')
                .append('<option value="10:30am">10:30am</option>')
                .append('<option value="11:00am">11:00am</option>')
                .append('<option value="11:30am">11:30am</option>')
                .append('<option value="12:00am">12:00am</option>')
                .append('<option value="12:30am">12:30am</option>')
                .append('<option value="1:00pm">1:00pm</option>')
                .append('<option value="1:30pm">1:30pm</option>')
                .append('<option value="2:00pm">2:00pm</option>')
                .append('<option value="2:30pm">2:30pm</option>')
                .append('<option value="3:00pm">3:00pm</option>')
                .append('<option value="3:30pm">3:30pm</option>')
                .append('<option value="4:00pm">4:00pm</option>')
                .append('<option value="4:30pm">4:30pm</option>')
                .append('<option value="5:00pm">5:00pm</option>')
                .append('<option value="5:30pm">5:30pm</option>')
                .append('<option value="6:00pm">6:00pm</option>')
                .append('<option value="6:30pm">6:30pm</option>')
                .append('<option value="7:00pm">7:00pm</option>')
                .append('<option value="7:30pm">7:30pm</option>')
                .append('<option value="8:00pm">8:00pm</option>')
                .append('<option value="8:30pm">8:30pm</option>');
        }
    }

    // Menus
    $(document).ready(function () {
        $('.slocan-menus')
            .load('inc/menu.php')
            .css({opacity: 0})/*set opacity to 0*/
            .delay(2E0)/*wait 2 seconds*/
            .animate({opacity: 1}, 2000)
    });
    // Balmain Map
    // The latitude and longitude of your business / place
    var position1 = [-33.8561621, 151.1745952]; // location balmain
    var position2 = [-33.883611, 151.1938708]; // location balmain
    // [-33.883611,151.1938708]  location broadway


    function showBalmainMaps() {

        var latLng = new google.maps.LatLng(position1[0], position1[1]);


        var mapOptions = {
            zoom: 20, // initialize zoom level - the max value is 21,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_TOP
            },
            streetViewControl: false, // hide the yellow Street View pegman
            scaleControl: true, // allow users to zoom the Google Map
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: latLng
        };

        map = new google.maps.Map(document.getElementById('balmailmap'),
            mapOptions);

        // Show the default red marker at the location
        marker = new google.maps.Marker({
            position: latLng,
            map: map,
            draggable: false,
            animation: google.maps.Animation.DROP,
            title: 'Pepper Seeds "Boutique Thai Bites"'
        });
    }

    google.maps.event.addDomListener(window, 'load', showBalmainMaps);

    function showBroardwayMaps() {

        var latLng = new google.maps.LatLng(position2[0], position2[1]);


        var mapOptions = {
            zoom: 17, // initialize zoom level - the max value is 21,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_TOP
            },
            streetViewControl: false, // hide the yellow Street View pegman
            scaleControl: true, // allow users to zoom the Google Map
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: latLng
        };

        map = new google.maps.Map(document.getElementById('broardwaymap'),
            mapOptions);

        // Show the default red marker at the location
        marker = new google.maps.Marker({
            position: latLng,
            map: map,
            draggable: false,
            animation: google.maps.Animation.DROP,
            title: 'Pepper Seeds "Boutique Thai Bites"'
        });
    }

    google.maps.event.addDomListener(window, 'load', showBroardwayMaps);

    // Mobile Height
    var winHeight = $(window).height();
    var menuHeight = (winHeight - 250);
    if ($(window).width() <= 768) {
        $('.section').css({
            minHeight: winHeight + 'px',
        });
        $('.inner-section').css({
            minHeight: winHeight + 'px',
        });
        $('.auto_section').css({
            minHeight: 'auto',
        });
        $('.full_height').css({
            minHeight: winHeight + 'px',
        });
        $('.slide_menu ul.menu_container').css({
            height: menuHeight + 'px',
        });
    }

    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.btn-nav').removeClass('animated');
            $('.menu_desktop').removeClass('is-active');
        }
    });

</script>

<!-- Booking -->
<style type="text/css">
    .row {
        margin-left: 0;
        margin-right: 0;
        padding-bottom: 10px;
    }

    .form-control {
        display: inline;
        height: 20px;
    }
</style>
<script src="datePicker/picker.js" type="text/javascript"></script>
<script src="datePicker/picker.date.js" type="text/javascript"></script>
<script src="datePicker/legacy.js" type="text/javascript"></script>


<?php include('inc/footer.php'); ?>