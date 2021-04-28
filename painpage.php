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

// modify at 2021.04
$balmainDetail  = getBranchById(1);
$broadwayDetail = getBranchById(2);
$SouthEveleighDetail   = getBranchById(3);

if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) { ?>
  <link href="datePicker/css/default.css" rel="stylesheet" type="text/css" />
  <link href="datePicker/css/default.date.css" rel="stylesheet" type="text/css" />
<?php } else { ?>
  <link href="datePicker/css/classic.css" rel="stylesheet" type="text/css" />
  <link href="datePicker/css/classic.date.css" rel="stylesheet" type="text/css" />
<?php }
?>

<!--body modify at 2021.04-->

<body>

  <!-- new design -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="newdesign/css/style.css">

  <!-- end new design -->

  <!-- Home -->
  <input type="hidden" id="is-onepage" data-value="true">
  <div id="onepage" style="display: none;"></div>

  <div class="wrapper d-flex align-items-stretch sidenav">
    <?php include('newdesign/sidebar.php'); ?>
    <!-- <nav id="sidebar_new" class="active">
        <div>
            <a href="index.html" class="logo"><img src="newdesign/images/logo.png" height="40px;"></a>
            <div class="btn-group dropright">
              <button type="button" id="sidebarCollapse" class="btn dropdown-toggle" style="color: #a89968; font-size: 1.5rem;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
              </button>
              <div class="dropdown-menu">
                <a href="#menu" class="pl-2"><button class="dropdown-item sidebar_dropdown" type="button">Menu & Cours</button></a>
                <a href="#promotion" class="pl-2"><button class="dropdown-item sidebar_dropdown" type="button">Promotions</button></a>
                <a href="#location" class="pl-2"><button class="dropdown-item sidebar_dropdown" type="button">Branch</button></a>
                <a href="#our_story" class="pl-2"><button class="dropdown-item sidebar_dropdown" type="button">Our Story</button></a>
              </div>
            </div>           
        </div>        
        <div>
            <ul class="list-unstyled components mb-5 ul_menu_bt">
                <li>
                    <span class="fa fa-facebook-f" onclick="goto('https://www.facebook.com/pepperseedsthai','blank')"></span>
                </li>
                <li>
                    <span class="fa fa-instagram" onclick="goto('https://www.instagram.com/pepperseedsthai','blank')"></span>
                </li>
                <li>
                    <span class="fa fa-envelope" onclick="goto('mailto:eat@pepperseeds.com.au','blank')"></span>
                </li>
            </ul>
        </div>       
    </nav>       -->
  </div>


  <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-end p-0 mb-0">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link navbar-gold" href="#select_area">Order Online</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-gold" href="#booking">Book a table!</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-gold mt-2" href="#"><i class="fa fa-shopping-bag"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="home" class="bg">
    <?php if ($isAdmin) { ?>
      <div id="modify_bg" style="float: right">
        Edit Background<a href="inc/admin/edit_bg.php?page=home" class='example6'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
      </div>
    <?php } ?>
    <div class="container">
      <!--JavaScript-->
    </div>
  </section>


  <!-- Service Area -->
  <section id="select_area" class="bg-2 section_area pb-3">
    <div class="section_header">
      <?php if ($headerAreaServiceData['firstpage'] != null) {
        echo $headerAreaServiceData['firstpage'];
      } else { ?> Choose you area! <?php } ?>
      <?php if ($isAdmin) { ?>
        <a href="admin/edit_firstpage.php?id=<?php echo $headerAreaServiceData['id']; ?>" class="example6">
          <img src="images/bt-edit.png" border="0" align="absmiddle" />
        </a>
      <?php } ?>
    </div>
    <div class="row justify-content-center">
      <div class="col-10 col-md-4 branch_bt div_branch section_area_div" onclick="goto('order_online_item.php?branch_id=3','self')">
        <div class="row">
          <div class="col col-3 section_area_rednew pr-5">
            <span style="bottom:0;position:absolute;">New</span>
          </div>
          <div class="col col-9 select_area_brn_name">
            South Eveleigh
          </div>
        </div>
        <div class="row">
          <div class="col col-12 section_area_address">
            <?php
            $SouthEveleighDetail = getBranchById(3);
            ?>
            <?= $SouthEveleighDetail['opentime'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col col-12 section_area_address">
            <?php $SouthEveleighAreaData = getAllActiveDeliveryArea(1);
            $num_rows = mysql_num_rows($SouthEveleighAreaData);
            $i = 0;
            while ($rsSouthEveleigh = mysql_fetch_assoc($SouthEveleighAreaData)) { ?>
              <?php
                $i++;
                echo $i == ($num_rows) ? $rsSouthEveleigh['area'] . '' : $rsSouthEveleigh['area'] . ','; ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-10 col-md-4 branch_bt div_branch section_area_div" onclick="goto('order_online_item.php?branch_id=1','self')">
        <div class="row">
          <div class="col col-3 section_area_rednew">
            <span style="bottom:0;position:absolute;"></span>
          </div>
          <div class="col col-6 select_area_brn_name">
            Balmain
          </div>
          <div class="col col-3 section_area_openhour"></div>
        </div>
        <div class="row">
          <div class="col col-12 section_area_address">
            <?= $balmainDetail['opentime'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col col-12 section_area_address">
            <?php $balmainAreaData = getAllActiveDeliveryArea(1);
            $num_rows = mysql_num_rows($balmainAreaData);
            $i = 0;
            while ($rsBalmain = mysql_fetch_assoc($balmainAreaData)) { ?>
              <?php
                $i++;
                echo $i == ($num_rows) ? $rsBalmain['area'] . '' : $rsBalmain['area'] . ','; ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-10 col-md-4 branch_bt div_branch section_area_div" onclick="goto('https://www.ubereats.com/au/sydney/food-delivery/pepper-seeds-thai-broadway/DM-namjGQfSlUB98SUSiqQ','blank')">
        <div class="row">
          <div class="col col-3" style="font-family: 'Twilight Script';color:red;font-size:1.5rem;padding-right:5px;padding-left:0px;">
            <span style="bottom:0;position:absolute;"></span>
          </div>
          <div class="col col-6 select_area_brn_name">
            Broadway
          </div>
          <div class="col col-3 section_area_openhour"></div>
        </div>
        <div class="row">
          <div class="col col-12 section_area_address">
            <?= $broadwayDetail['opentime'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col col-12 section_area_address">
            <?php $broardwayAreaData = getAllActiveDeliveryArea(2);
            $num_rows = mysql_num_rows($broardwayAreaData);
            $i = 0;
            while ($rsBroardway = mysql_fetch_assoc($broardwayAreaData)) { ?>
              <?php
                $i++;
                echo $i == ($num_rows) ? $rsBroardway['area'] . '' : $rsBroardway['area'] . ','; ?>
            <?php } ?>
            <!-- BALMAIN • BALMAIN EAST • ROZELLE • DRUMMOYNE <br> 
              LILYFIELD • BIRCHGROVE • CHISWICK    <br>
              ABBOTSFORD -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- section booking -->

  <section id="booking" class="bg-2 ">
    <form id="booking-form">

      <section id="booking_header" class="bg-booking section_area">
        <div class="pt-4">
          <span style="font-family: 'Enrique-BoldRound';font-size:1.2rem;">
            Now Open 7 day
          </span><br>
          <span style="font-family:'Twilight Script';color:red;font-size:1.2rem;padding-right:5px;padding-left:0px;line-height: 1rem;">new</span>
          <span style="font-family: 'Enrique-Round';font-size:1rem;">South Eveleigh</span>
          <span style="font-family: 'Enrique-LightRound';font-size:1rem;padding-left:10px;">5pm - 10pm</span><br>
          <span style="font-family: 'Enrique-Round';font-size:1rem;">Balmain</span>
          <span style="font-family: 'Enrique-LightRound';font-size:1rem;padding-left:10px;">5pm - 10pm</span><br>
          <span style="font-family: 'Enrique-Round';font-size:1rem;">Broadway</span>
          <span style="font-family: 'Enrique-LightRound';font-size:1rem;padding-left:10px;">10am - 9pm</span>
        </div>
      </section>

      <section id="booking_02" class="section_area">
        <div class="row pt-3">
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-vanue tab_active" onclick="select_branch(3)" id="btn_booking_venue_3">
              <span style="font-family:'Thirsty Script Extrabold Demo';color:red;font-size:0.8rem;padding-right:5px;padding-left:0px;line-height: 0.2rem;">new</span>
              <span style="line-height: 0.5rem;">South Eveleigh</span>
            </button>
            <button type="button" class="btn btn-vanue" onclick="select_branch(1)" id="btn_booking_venue_1">Balmain</button>
            <button type="button" class="btn btn-vanue" onclick="select_branch(2)" id="btn_booking_venue_2">Broadway</button>
          </div>
        </div>
        </div>
        <div class="pt-3" style="font-family: 'Enrique-Round';">
          <input type="hidden" id="book_venue" name="book_venue" value="3">
          <div class="row">
            <div class="col-10 col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1" style="color: #a89968;font-size: 1rem;">Number of people:</label>
                <input id="book_numP" name="book_numP" type="number" class="form-control" min="1" max="99" class="long-book-num form-control" />
              </div>
            </div>
            <div class="col-5 col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1" style="color: #a89968;font-size: 1rem;">Date:</label>
                <input id="book_date" name="book_date" type="text" class="form-control" style="width:90%;" />
              </div>
            </div>
            <div class="col-5 col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1" style="color: #a89968;font-size: 1rem;">Time:</label>
                <select id="timepicker1" name="timepicker1" class="form-control" style="width: 90%; padding-top: 0px; padding-bottom: 0px; text-align-last: center;">
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-10">
              <div class="input-group mb-2">
                <div class="input-group-prepend" style="background-color: #ffffff !important;">
                  <div class="input-group-text"><span style="color: #a89968;">Booking name</span>&nbsp;<span style="color: red;">*</span></div>
                </div>
                <input id="book_name" name="book_name" type="text" class="form-control" value="<?php echo $name; ?>" />
                <span style="color: red"><?php echo $err_name; ?></span>
              </div>
            </div>
            <div class="col-10">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><span style="color: #a89968;">Contact Number</span>&nbsp;<span style="color: red;">*</span></div>
                </div>
                <input id="book_contact" name="book_contact" type="tel" class="form-control" value="<?php echo $contact; ?>" />
                <span style="color: red"><?php echo $err_contact; ?></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-10">
              <div class="input-group mb-2">
                <div class="input-group-prepend" style="background-color: #ffffff !important;">
                  <div class="input-group-text"><span style="color: #a89968;">Email</span>&nbsp;<span style="color: red;">*</span></div>
                </div>
                <input id="book_email" name="book_email" type="email" class="form-control" value="<?php echo $email; ?>" />
                <span style="color: red"><?php echo $err_email; ?></span>
              </div>
            </div>
            <div class="col-10">
              <div class="input-group mb-2">
                <div class="input-group-prepend" style="background-color: #ffffff !important;">
                  <div class="input-group-text"><span style="color: #a89968;">Require</span></div>
                </div>
                <input type="text" class="form-control" id="book_note" name="book_note">
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="width: 100%">
          <div class="col-12">
            <button type="button" onclick="submitBooking()" id="submitBooking2" class="btn btn-success mt-3" style="font-family: 'Bebas Neue Pro Bold';font-size: 1.5rem;">RESERVE NOW</button>
          </div>
          <div style="color: #183029;" class="col-12 mt-3">
            <span style="font-size: 0.8rem;">For booking and other inquiries</span> <br>
            <span style="font-family:'Thirsty Script Extrabold Demo';color:red;font-size:0.5rem;padding-right:5px;padding-left:0px;line-height: 0.2rem;">new</span>
            <span style="font-size: 0.8rem;font-family: 'Enrique-Round';">South Eveleigh | 02-0000-0000<br>
              BALMAIN | 02-9555-5248<br>
              BROADWAY | 02-9212-7553</span>
          </div>
        </div>
        </div>
      </section>


      <section id="booking_03" class="section_area">
        <button type="button" onclick="bookMore()" class="btn btn-success mt-3" style="font-family: 'Bebas Neue Pro Bold';font-size: 1.5rem;">BOOK MORE</button>

        <div class="pt-3" style="font-family: 'Enrique-Round';">
          <input type="hidden" id="book_venue" name="book_venue" value="3">
          <div class="row">
            <div class="col-10 col-md-6">
              <div class="cart-data" style="background-color: white;">
                <div class="cart-data-layout" style="padding: 30px">
                  <div style="color: black; font-size: large; font-family: 'GothamBold';">Booking Successes.</div>
                  <hr class="line_cart" />
                  <div class="Gotham12" style="color: black; font-size: large;"><span class="msg"></span></div>
                  <p>
                    <div style="color: black; font-size: large; text-align: right;font-family: 'GothamBold'"><span class="msgthk"></span></div>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </form>
  </section>
  <!-- end section booking -->

  <!-- section menu -->
  <section id="menu" class="bg-2">
    <div class="section_area pt-3">
      <div class="row">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-vanue tab_active" onclick="showMenu(3)" id="btn_venue_3">
            <span style="font-family:'Thirsty Script Extrabold Demo';color:red;font-size:0.8rem;padding-right:5px;padding-left:0px;line-height: 0.2rem;">new</span>
            <span style="line-height: 0.5rem;">South Eveleigh</span>
          </button>
          <button type="button" class="btn btn-vanue" onclick="showMenu(1)" id="btn_venue_1">Balmain</button>
          <button type="button" class="btn btn-vanue" onclick="showMenu(2)" id="btn_venue_2">Broadway</button>
        </div>
      </div>
    </div>
    <div class="section_area" id="menu_pdf_3">
      <!-- menu South Eveleigh    -->
      <embed src="SouthEveleigh.pdf" width="55%" height="450px">
    </div>
    <div class="section_area" id="menu_pdf_1">
      <!-- menu Balmain -->
      <embed src="Balmain.pdf" width="55%" height="450px">
    </div>
    <div class="section_area" id="menu_pdf_2">
      <!-- menu Broadway -->
      <span style="font-size: 1.5rem;font-family: 'Enrique-Round';">Unavailable</span>
    </div>
  </section>
  <!-- end section menu -->

  <!-- Promotion -->
  <section id="promotion" class="bg-2">
    <?php if ($isAdmin) { ?>
      <div id="modify_bg" style="float: right">
        Edit Background
        <a href="inc/admin/edit_bg.php?page=promotion" class='example6'>
          <img src="images/bt-edit.png" border="0" align="absmiddle" />
        </a>
      </div>
    <?php } ?>
    <div class="section_area">
      <h1 style="font-family: 'Bebas Neue Pro Bold';">
        <?php if ($headerPromotionData['firstpage'] != null) {
          echo $headerPromotionData['firstpage'];
        } else { ?> PROMOTIONS <?php } ?>
      </h1>
    </div>
    <?php
    $promotionData = getPromotionIsActive(); ?>
    <?php while ($rs = mysql_fetch_assoc($promotionData)) { ?>
      <div class="row section_area">
        <div class="col-4"><img style="width:75%" src="<?php echo str_replace('../', '', $rs['pic_path']); ?>" /></div>
        <div class="col-8">
          <div class="row promo_header"><span><?= $rs['name'] ?></span></div>
          <div class="row promo_detail"></div>
        </div>
      </div>
    <?php } ?>
  </section>

  <!-- locations -->
  <section id="location" class="bg-2">
    <div class="row section_area">
      <div class="col-12 col-sm-4">
        <div class="row justify-content-center ml-0" style="width: 85%">
          <span class="location_brn_name">South EveleighDetail</span>
        </div>
        <div class="card border_redius_20" style="width: 85%;">
          <img src="newdesign/images/pic_coogee.png" class="card-img-top border_redius_20" alt="...">
          <div class="card-body">
            <div class="row">
              <div class="col-2 location_icon"><i class="fa fa-phone"></i></div>
              <div class="col-10 location_detail"><?= $SouthEveleighDetail['tel'] ?></div>
            </div>
            <div class="row">
              <div class="col-2 location_icon"><i class="fa fa-envelope"></i></div>
              <div class="col-10 location_detail"><?= $SouthEveleighDetail['email'] ?></div>
            </div>
            <div class="row">
              <div class="col-2"></div>
              <div class="col-10 location_detail"><?= $SouthEveleighDetail['addr'] ?></div>
            </div>
            <div class="row">
              <div class="col-2"></div>
              <div class="col-10 location_detail">Google Map
                <a href="https://goo.gl/maps/6CKtrmejoimv2kiZ7" target="_blank">
                  <i class="fa fa-location-arrow ml-2 text-info"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-4">
        <div class="row justify-content-center ml-0" style="width: 85%">
          <span class="location_brn_name">Balmain</span>
        </div>
        <div class="card border_redius_20" style="width: 85%">
          <img src="newdesign/images/pic_coogee.png" class="card-img-top border_redius_20" alt="...">
          <div class="card-body">
            <div class="row">
              <div class="col-2 location_icon"><i class="fa fa-phone"></i></div>
              <div class="col-10 location_detail"><?= $balmainDetail['tel'] ?></div>
            </div>
            <div class="row">
              <div class="col-2 location_icon"><i class="fa fa-envelope"></i></div>
              <div class="col-10 location_detail"><?= $balmainDetail['email'] ?></div>
            </div>
            <div class="row">
              <div class="col-2"></div>
              <div class="col-10 location_detail"><?= $balmainDetail['addr'] ?></div>
            </div>
            <div class="row">
              <div class="col-2"></div>
              <div class="col-10 location_detail">Google Map
                <a href="https://maps.google.com/maps?ll=-33.856198,151.173802&z=18&t=m&hl=th-TH&gl=AU&mapclient=embed&daddr=Pepper%20Seeds%20%22Boutique%20Thai%20Bites%22%2010%2F418%20Darling%20St%20Balmain%20NSW%202041@-33.8561621,151.1745952" target="_blank">
                  <i class="fa fa-location-arrow ml-2 text-info"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-4">
        <div class="row justify-content-center ml-0" style="width: 85%">
          <span class="location_brn_name">Broadway</span>
        </div>
        <div class="card border_redius_20" style="width: 85%">
          <img src="newdesign/images/pic_coogee.png" class="card-img-top border_redius_20" alt="...">
          <div class="card-body">
            <div class="row">
              <div class="col-2 location_icon"><i class="fa fa-phone"></i></div>
              <div class="col-10 location_detail"><?= $broadwayDetail['tel'] ?></div>
            </div>
            <div class="row">
              <div class="col-2 location_icon"><i class="fa fa-envelope"></i></div>
              <div class="col-10 location_detail"><?= $broadwayDetail['email'] ?></div>
            </div>
            <div class="row">
              <div class="col-2"></div>
              <div class="col-10 location_detail"><?= $broadwayDetail['addr'] ?></div>
            </div>
            <div class="row">
              <div class="col-2"></div>
              <div class="col-10 location_detail">Google Map
                <a href="https://maps.google.com/maps?ll=-33.883611,151.193871&z=18&t=m&hl=th-TH&gl=TH&mapclient=embed&daddr=Pepper%20Seeds%20Thai%20Broadway%20Shopping%20Centre%2090%2F86%20Bay%20St%20Glebe%20NSW%202037%20%E0%B8%AD%E0%B8%AD%E0%B8%AA%E0%B9%80%E0%B8%95%E0%B8%A3%E0%B9%80%E0%B8%A5%E0%B8%B5%E0%B8%A2@-33.8836106,151.1938708" target="_blank">
                  <i class="fa fa-location-arrow ml-2 text-info"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="our_story" class="bg-2 section_area">
    <div>
      <h1 style="font-family: 'Bebas Neue Pro Bold';">OUR STORY</h1>
    </div>
    <div class="justify-content-center section_area" style="font-family: 'Bebas Neue Pro';font-size: 1.8rem;color: #183029;">
      <p class="text-center m-5">
        It’s been a while! In 2012, we opened Pepper Seeds with our custom menu, Focusing on Boutique Thai dining,<br> we carefully chose dishes to please the Balmainian's fine tastebuds, because we value your love of Thai food. This inspires our creativitygrowth and strive for
        perfection on every plate. It's all in how we combine and layer
        the spices, cooking technique that marry perfectly with
        fresh Australian produce.
      </p>
      <p class="text-center m-5">
        PEPPER SEEDS’s BROADWAY is our second restaurant, <br>which opened
        in August 2016. We decided to open a type of Thai restaurant Broadway hadn’t seen before; our relaxed, informal Pepper Seeds’s Boutique Thai. Just like our other restaurants, Pepper Seeds’s Broadway serves boutique Thai cuisine with a modern
        twist in a shopping center environment. Perfect for taking a break from shopping,
        sightseeing and working,
        it’s a place to relax and watch the world go by.
      </p>
      <p class="text-center m-5">
        </pclass><img src="newdesign/images/pic-owner.png" alt="Avatar" class="pic_round"></p>
    </div>
    <div id="footer">
      <div class="row footer_text">
        <div class="col-6">SYDNEY, AUSTRALIA</div>
        <div class="col-6 text-right pr-5">&copysr;PEPPERSEEDS, 2021</div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="ModalAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content" style="color: black;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Infomation</h4>
        </div>
        <div class="modal-body">
          <p><span class="topic"></span></p>
          <p><span class="balmain"></span></p>
          <p><span class="broadway"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" style="text-align: center;" data-dismiss="modal" aria-label="Close">CLOSE</button>
        </div>
      </div>
    </div>
  </div>

  <!-- New design -->
  <script src="newdesign/js/jquery.min.js"></script>
  <script src="newdesign/js/popper.js"></script>
  <script src="newdesign/js/bootstrap.min.js"></script>
  <script src="newdesign/js/main.js"></script>
  <script>
    function goto(page, fn) {
      if (fn == 'blank') {
        window.open(page, '_blank');
      } else {
        window.location.href = page;
      }
    }
  </script>
  <!-- End New design -->
  <script src="inc/js/jquery.mousewheel-3.0.4.pack.js?v=56682" charset="utf-8"></script>
  <script type="text/javascript" src="inc/js/index.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?address=Pepper+Seeds+%22Boutique+Thai+Bites&sensor=false&key=AIzaSyAb5FG7j3FNNJvUR2xA7jvYvAYkUXAys2U"></script>
  <script>
    // Scroll
    // $('.navtop').addClass('is-hide');
    // $(window).scroll(function () {
    //     var windscroll = $(window).scrollTop();
    //     $('section.section').each(function (i) {
    //         if ($(this).position().top - 20 <= windscroll) {
    //             $('.slide_menu ul .menu_item.is-active').removeClass('is-active');
    //             $('.slide_menu ul .menu_item').eq(i - 1).addClass('is-active');
    //         } else {
    //             $('.slide_menu ul .menu_item').eq(i - 1).removeClass('is-active');
    //         }
    //     });
    //     $('.inner-section').each(function (i) {
    //         if ($(this).offset().top - 20 <= windscroll) {
    //             $('#sub_menus .sub_item.is-active').removeClass('is-active');
    //             $('#sub_menus .sub_item').eq(i).addClass('is-active');
    //         } else {
    //             $('#sub_menus .sub_item').eq(i).removeClass('is-active');
    //         }
    //     });
    //     var sectionAbout = $('.section#aboutus').offset().top;
    //     if (windscroll > 1) {
    //         $('.left_content.is-menu').addClass('is-active');

    //         $('.navtop').removeClass('is-hide');
    //     } else {
    //         $('.left_content.is-menu').removeClass('is-active');

    //         $('.navtop').addClass('is-hide');
    //     }
    // }).scroll();

    // Print
    function printIt() {
      var wnd = window.open('inc/pdf/menu.pdf');
      wnd.print();
    }


    // Booking
    function bookMore() {
      $("#booking_03").hide();
      $("#booking_02").show();
      document.getElementById("booking-form").reset();
    }

    function submitBooking() {


      document.getElementById("submitBooking2").disabled = true;
      $.ajax({
        type: 'POST',
        url: "booking_sys.php",
        data: $('#booking-form').serialize(),
        cache: false,
        success: function(msg) {
          console.log(msg);
          if (msg.trim() == "OK" || msg.trim() == "Saved") {
            $("#booking_02").hide();
            $("#booking_03").show();
            var msg = "Thank you for your booking, one of our staff will contact you back shortly to confirm.";
            var msgthk = "PEPPER SEEDS TEAM.";
            $(".msg").html(msg);
            $(".msgthk").html(msgthk);
            // alert("Thank you for your booking, one of our staff will contact you back shortly to confirm.");
          } else {

            alert(msg.trim());

            //$('#showData').html(msg);
          }
          document.getElementById("submitBooking2").disabled = false;
        }
      });

    }
    $(document).ready(function() {
      select_branch(3);
      $("#booking_03").hide();
      $("#booking_02").show();
      // $('div[id^="menu_pdf_"]').each(function () {
      //     console.log(this.id);
      //     if(this.id != id){
      //         $(this).hide();                
      //     }
      // });
      $('#menu_pdf_1').hide();
      $('#menu_pdf_2').hide();
      $('#menu_pdf_3').show();

      var $input = $('#book_date').pickadate({
        formatSubmit: 'yyyy-mm-dd',
        min: true,
        //container: '#container',
        // editable: true,
        closeOnSelect: true,
        closeOnClear: false,
        today: '',
        clear: '',
        close: ''
      });

      $('#book_date').on('change', function() {
        var selectdate = $(this).pickadate('picker').get('select', 'dd/mm/yyyy');

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
          dd = '0' + dd
        }

        if (mm < 10) {
          mm = '0' + mm
        }

        var hour = today.getHours();

        today = dd + '/' + mm + '/' + yyyy;
        console.log(selectdate);
        console.log(today);
        console.log(hour);
        if (selectdate == today && hour > 15) {
          console.log("เข้ามา");
          $('#ModalAlert').find('.topic').html("Today booking please contact us by phone.");
          $('#ModalAlert').find('.balmain').html("BALMAIN 9555-5248");
          $('#ModalAlert').find('.broadway').html("BROADWAY 9212-7553");
          $('#ModalAlert').modal('show');
          document.getElementById('book_date').value = '';
        }

      });

      var picker = $input.pickadate('picker');

      $('#book_venue').on('click', function() {
        $(this).find("option[value*='0']").prop("disabled", true);
      });
      $('#book_numP').on('click', function() {
        $(this).find("option[value*='0']").prop("disabled", true);
      });
    });

    function populateTime(value) {
      if (value == 1) {
        $('#timepicker1 option').each(function() {
          $(this).remove();
        });
        $('#timepicker1')
          .append('<option value="5:30pm">5:30pm</option>')
          .append('<option value="5:45pm">5:45pm</option>')
          .append('<option value="6:00pm">6:00pm</option>')
          .append('<option value="6:15pm">6:15pm</option>')
          .append('<option value="6:30pm">6:30pm</option>')
          .append('<option value="6:45pm">6:45pm</option>')
          .append('<option value="7:00pm">7:00pm</option>')
          .append('<option value="7:15pm">7:15pm</option>')
          .append('<option value="7:30pm">7:30pm</option>')
          .append('<option value="7:45pm">7:45pm</option>')
          .append('<option value="8:00pm">8:00pm</option>')
          .append('<option value="8:15pm">8:15pm</option>')
          .append('<option value="8:30pm">8:30pm</option>')
          .append('<option value="8:45pm">8:45pm</option>')
          .append('<option value="9:00pm">9:00pm</option>');
      } else if (value == 2) {
        $('#timepicker1 option').each(function() {
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

    var theToggle = document.getElementById('sidebarCollapse');

    // based on Todd Motto functions
    // https://toddmotto.com/labs/reusable-js/

    // hasClass
    function hasClass(elem, className) {
      return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
    }
    // addClass
    function addClass(elem, className) {
      if (!hasClass(elem, className)) {
        elem.className += ' ' + className;
      }
    }
    // removeClass
    function removeClass(elem, className) {
      var newClass = ' ' + elem.className.replace(/[\t\r\n]/g, ' ') + ' ';
      if (hasClass(elem, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0) {
          newClass = newClass.replace(' ' + className + ' ', ' ');
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
      }
    }
    // toggleClass
    function toggleClass(elem, className) {
      var newClass = ' ' + elem.className.replace(/[\t\r\n]/g, " ") + ' ';
      if (hasClass(elem, className)) {
        while (newClass.indexOf(" " + className + " ") >= 0) {
          newClass = newClass.replace(" " + className + " ", " ");
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
      } else {
        elem.className += ' ' + className;
      }
    }

    theToggle.onclick = function() {
      toggleClass(this, 'on');
      return false;
    }

    function showMenu(branch_id) {
      $('div[id^="menu_pdf_"]').each(function() {
        console.log(this.id);
        if (this.id != branch_id) {
          $(this).hide();
        }
      });
      $('#menu_pdf_' + branch_id).show();

      $('button[id^="btn_venue_"]').each(function() {
        $(this).removeClass("tab_active")
      });

      $('#btn_venue_' + branch_id).addClass("tab_active")
    }

    function select_branch(value) {
      console.log(value);
      if (value == 1 || value == 3) {
        console.log(" เข้า 1" + value);
        // $('#ModalAlert').find('.topic').html("Due to new restrictions we will be opening a limited number of tables for dinner booking");
        //     $('#ModalAlert').find('.balmain').html("Please note for dinner seating times will only be either <b> 6:00 pm-7:30 pm </b> or <b> 7:30 pm-9:00 pm </b> <br> We thank you for your understanding during these difficult times.");
        //     $('#ModalAlert').modal('show');
        $('#timepicker1 option').each(function() {
          $(this).remove();
        });
        $('#timepicker1')
          .append('<option value="5:00pm">5:00pm</option>')
          .append('<option value="5:30pm">5:30pm</option>')
          .append('<option value="5:45pm">5:45pm</option>')
          .append('<option value="6:00pm">6:00pm</option>')
          .append('<option value="6:15pm">6:15pm</option>')
          .append('<option value="6:30pm">6:30pm</option>')
          .append('<option value="6:45pm">6:45pm</option>')
          .append('<option value="7:00pm">7:00pm</option>')
          .append('<option value="7:15pm">7:15pm</option>')
          .append('<option value="7:30pm">7:30pm</option>')
          .append('<option value="7:45pm">7:45pm</option>')
          .append('<option value="8:00pm">8:00pm</option>')
          .append('<option value="8:15pm">8:15pm</option>')
          .append('<option value="8:30pm">8:30pm</option>')
          .append('<option value="8:45pm">8:45pm</option>')
          .append('<option value="9:00pm">9:00pm</option>');
        //.append('<option value="9:30pm">9:30pm</option>');
      } else if (value == 2) {
        console.log(" เข้า 2" + value);
        $('#timepicker1 option').each(function() {
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

      $('button[id^="btn_booking_venue_"]').each(function() {
        $(this).removeClass("tab_active")
      });
      $('#btn_booking_venue_' + value).addClass("tab_active");
      $('#book_venue').val(value);

    }
  </script>

  <!-- old Booking -->
  <!-- <style type="text/css">
    .row {
        margin-left: 0;
        margin-right: 0;
        padding-bottom: 10px;
    }

    .form-control {
        display: inline;
        height: 20px;
    }
</style> -->
  <script src="datePicker/picker.js" type="text/javascript"></script>
  <script src="datePicker/picker.date.js" type="text/javascript"></script>
  <script src="datePicker/legacy.js" type="text/javascript"></script>


  <?php //include('inc/footer.php'); 
  ?>