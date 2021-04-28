<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 2/3/2017
 * Time: 11:01 AM
 */
    include('header.php');
    include('connect.php');
    include('inc/admin/query_statement.php');
?>
<?php
    session_start();
    $chkPage='store-broardway-gallery';
    $_SESSION['currentPage'] = $chkPage;
    $isAdmin = $_SESSION['isAdmin'];

    $bgData = getBgByPage('bg_'.$chkPage);
    $slide = 'slide_broardway_Galleries_1';
    $slide1Data = getMediaActiveByPage('bg_'.$slide);
    $slide2 = 'slide_broardway_Galleries_2';
    $slide2Data= getMediaActiveByPage('bg_'.$slide2);
    $allSlide = 'slide_broardway_Galleries';
    $allSlideData = getSlideForGalleriesPage('bg_'.$allSlide);
?>
<body>
<script src="inc/js/jssor.slider-22.2.15.min.js"></script>
<script type="text/javascript">
        jssor_html5_AdWords_slider_init = function() {

            var jssor_html5_AdWords_SlideoTransitions = [
              [{b:-1,d:1,o:-1,rY:-120},{b:2600,d:500,o:1,rY:120,e:{rY:17}}],
              [{b:-1,d:1,o:-1},{b:1480,d:20,o:1},{b:1500,d:500,y:-20,e:{y:19}},{b:2300,d:300,x:-20,e:{x:19}},{b:3100,d:300,o:-1,sY:9}],
              [{b:-1,d:1,o:-1},{b:2300,d:300,x:20,o:1,e:{x:19}},{b:3100,d:300,o:-1,sY:9}],
              [{b:-1,d:1,sX:-1,sY:-1},{b:0,d:1000,sX:2,sY:2,e:{sX:7,sY:7}},{b:1000,d:500,sX:-1,sY:-1,e:{sX:16,sY:16}},{b:1500,d:500,y:20,e:{y:19}}],
              [{b:1000,d:1000,r:-30},{b:2000,d:500,r:30,e:{r:2}},{b:2500,d:500,r:-30,e:{r:3}},{b:3000,d:3000,x:70,y:40,rY:-20,tZ:-20}],
              [{b:-1,d:1,o:-1},{b:0,d:1000,o:1}],
              [{b:-1,d:1,o:-1,r:30},{b:1000,d:1000,o:1}],
              [{b:-1,d:1,o:-1},{b:2780,d:20,o:1},{b:2800,d:500,y:-70,e:{y:3}},{b:3300,d:1000,y:180},{b:4300,d:500,y:-40,e:{y:3}},{b:5300,d:500,y:-40,e:{y:3}},{b:6300,d:500,y:-40,e:{y:3}},{b:7300,d:500,y:-40,e:{y:3}},{b:8300,d:400,y:-30}],
              [{b:-1,d:1,c:{y:200}},{b:4300,d:4400,c:{y:-200},e:{c:{y:1}}}],
              [{b:-1,d:1,o:-1},{b:4300,d:20,o:1}],
              [{b:-1,d:1,o:-1},{b:5300,d:20,o:1}],
              [{b:-1,d:1,o:-1},{b:6300,d:20,o:1}],
              [{b:-1,d:1,o:-1},{b:7300,d:20,o:1}],
              [{b:-1,d:1,o:-1},{b:8300,d:20,o:1}],
              [{b:2000,d:1000,o:-0.5,r:180,sX:4,sY:4,e:{r:5,sX:5,sY:5}},{b:3000,d:1000,o:-0.5,r:180,sX:-4,sY:-4,e:{r:6,sX:6,sY:6}}],
              [{b:-1,d:1,o:-1,c:{m:-35.0}},{b:0,d:1500,x:150,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,c:{y:35.0}},{b:0,d:1500,x:-150,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1},{b:6500,d:2000,o:1}],
              [{b:-1,d:1,o:-1},{b:2000,d:1000,o:0.5,r:180,sX:4,sY:4,e:{r:5,sX:5,sY:5}},{b:3000,d:1000,o:0.5,r:180,sX:-4,sY:-4,e:{r:6,sX:6,sY:6}},{b:4500,d:1500,x:-45,y:60,e:{x:12,y:3}}],
              [{b:-1,d:1,o:-1},{b:4500,d:1500,o:1,e:{o:5}},{b:6500,d:2000,o:-1,r:10,rX:30,rY:20,e:{rY:6}}]
            ];

            var jssor_html5_AdWords_options = {
              $AutoPlay: true,
              $Idle: 1600,
              $SlideDuration: 400,
              $SlideEasing: $Jease$.$InOutSine,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_html5_AdWords_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $ChanceToShow: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $ActionMode: 2
              }
            };

            var jssor_html5_AdWords_slider = new $JssorSlider$("jssor_html5_AdWords", jssor_html5_AdWords_options);
           };
    </script>

    <style>
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('inc/img/store/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background: url('inc/img/store/a12.png') no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
        .jssora12l.jssora12lds { background-position: -16px -37px; opacity: .3; pointer-events: none; }
        .jssora12r.jssora12rds { background-position: -75px -37px; opacity: .3; pointer-events: none; }
    </style>
<div id="googlemaps" style="opacity: 0.5;"></div>
    <div class="left_content">
        <div class="content_aboutus">
            <?php include('inc/slide_menu.php'); ?>
        </div>
    </div>

    <div class="right_content">
        <div class="content_aboutus">
            <div id="contactform">
                <p class="contactform_title">BROARDWAY</p>
                <p class="contactform_address">Broardway Shop 221,</p>
                <p class="contactform_address">Level 2 Broardway,Sysney</p>
                <p class="contactform_detail">9212-7553</p>
                <p class="contactform_detail">OPENING TIMES:</p>
                <p class="contactform_detail">Everyday: 10am - 9am.</p>
            </div>
            <div id="directionlink1">
                <img src="inc/img/store/gal2.png" alt="">
            </div>
            <div id="directionlink2">
                <img src="inc/img/store/gal3.png" alt="">
            </div>
            <div id="directionlink3">
                <div id="jssor_html5_AdWords" style="position:relative;margin:0 auto;top:0px;left:0px;width:450px;height:300px;overflow:hidden;visibility:hidden;">
                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:450px;height:300px;overflow:hidden;">
                        <div data-p="68.75">
                            <img data-u="image" src="inc/img/store/gal2.png" />
                        </div>
                        <div data-p="68.75" data-po="70% 50%">
                            <img data-u="image" src="inc/img/store/gal3.png" />
                        </div>
                        <div data-p="68.75">
                            <img data-u="image" src="inc/img/store/gal2.png" />
                        </div>
                    </div>
                    <!-- Arrow Navigator -->
                    <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
                    <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
                </div>
                <script type="text/javascript">jssor_html5_AdWords_slider_init();</script>
            </div>
        </div>
    </div>
<?php include('inc/footer.php'); ?>
<style type="text/css">
    #googlemaps { 
  height: 100%; 
  width: 100%; 
  position:absolute; 
  top: 0; 
  left: 0; 
  z-index: 0; /* Set z-index to 0 as it will be on a layer below the contact form */
}

#contactform { 
  position: relative; 
  z-index: 1; /* The z-index should be higher than Google Maps */
  width: 300px;
  margin: 60px auto 0;
  padding: 10px;
  height: auto;
  color: white;
  position: fixed;
  bottom: 50px;
  left:30%;
  color:#000;
}
#contactform .contactform_title{
  font-family: "GothamBold";
  font-size: 24.49px;
}
#contactform .contactform_address{
  font-family: "GothamLight";
  font-size: 17px;
}
#contactform .contactform_detail{
    font-family: "GothamBook";
  font-size: 17.61px;
}
#directionlink1{
    z-index: 1; /* The z-index should be higher than Google Maps */
    width: auto;
    height: auto;
    position: fixed;
    height:54.2vh;
  top: 0;
  right: 0;
}
#directionlink1 img{
    height:100%;
}
#directionlink2{
    z-index: 1; /* The z-index should be higher than Google Maps */
    width: auto;
    height: auto;
    position: fixed;
    height:45.8vh;
  bottom: 0;
  right: 0;
}
#directionlink2 img{
    height:100%;
}
#directionlink3{
  display: none;
}
@media (max-width: 768px) {
    #contactform{
      /*display: none;*/
    }
    #directionlink1{
      display: none;
    }
    #directionlink2{
      display: none;
    }
    #directionlink3{
    display: block;
    z-index: 1; /* The z-index should be higher than Google Maps */
    width: auto;
    height: auto;
    position: fixed;
    /*height:45.8vh;*/
    bottom: 0;
    right: 0;
  }
    #directionlink1 img{
        max-width: 425px;
        max-height:346px;
    }
    #directionlink2 img {
        max-width: 425px;
        max-height:292px;
    }
}
</style>
<!-- Include the Google Maps API library - required for embedding maps -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?address=Pepper+Seeds+%22Boutique+Thai+Bites&sensor=false&key=AIzaSyAqT-kgE3jAmmJXoFabHExZUSHNtfr55iA">
</script>

<script type="text/javascript">

    // The latitude and longitude of your business / place
    var position = [-33.883611,151.1938708];
    // [-33.883611,151.1938708]  location broadway


    function showGoogleMaps() {

        var latLng = new google.maps.LatLng(position[0], position[1]);


        var mapOptions = {
            zoom: 21, // initialize zoom level - the max value is 21,
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

        map = new google.maps.Map(document.getElementById('googlemaps'),
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

    google.maps.event.addDomListener(window, 'load', showGoogleMaps);

</script>