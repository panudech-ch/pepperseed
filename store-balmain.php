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
    $chkPage='store-balmain';
    $_SESSION['currentPage'] = $chkPage;
    $isAdmin = $_SESSION['isAdmin'];

    $bgData = getBgByPage('bg_'.$chkPage);
?>
<body>
<div id="googlemaps" style="opacity: 0.5;"></div>
    <div class="left_content">
        <div class="content_aboutus">
            <?php include('inc/slide_menu.php'); ?>
        </div>
    </div>

    <div class="right_content">
        <div class="content_aboutus">
            <div id="contactform">
                  <p class="contactform_title">BALMAIN</p>
                  <p class="contactform_address">10/418 Darling Street</p>
                  <p class="contactform_address">Balmain, Sydney</p>
                  <p class="contactform_detail">9212-7553</p>
                  <p class="contactform_detail">OPENING TIMES:</p>
                  <p class="contactform_detail">Everyday: 5pm.-10pm.</p>
            </div>
            <div id="directionlink">
                <a href="https://maps.google.com/maps?ll=-33.856198,151.173802&z=18&t=m&hl=th-TH&gl=AU&mapclient=embed&daddr=Pepper%20Seeds%20%22Boutique%20Thai%20Bites%22%2010%2F418%20Darling%20St%20Balmain%20NSW%202041@-33.8561621,151.1745952">
                    <span><img src="inc/img/icon/icon-get-direction.png" alt="">&nbsp;<span>Get direction</span>
                    <img class="responsive" src="<?php echo $bgData != null ? $bgData['img_path'] : "inc/img/map-balmain.jpg";?>" alt="">
                </a>
                <?php if($isAdmin){?>
                    <div id="modify_bg" style="float: left; color: black">
                        Edit Image<a href="inc/admin/edit_bg.php?page=<?php echo $chkPage; ?>" class='bg'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
                    </div>
                <?php }?>
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
#directionlink{
    position: relative;
    z-index: 1; /* The z-index should be higher than Google Maps */
    width: 300px;
    margin: 60px auto 0;
    padding: 10px;
    height: auto;
    position: fixed;
  bottom: 50px;
  right: 15%;
}
#directionlink a{
    font-family: "GothamBold";
    font-size: 14px;
    color: #000 !important;
}
</style>
<!-- Include the Google Maps API library - required for embedding maps -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?address=Pepper+Seeds+%22Boutique+Thai+Bites&sensor=false&key=AIzaSyAqT-kgE3jAmmJXoFabHExZUSHNtfr55iA">
</script>

<script type="text/javascript">

// The latitude and longitude of your business / place
var position = [-33.8561621,151.1745952]; // location balmain
               // [-33.883611,151.1938708]  location broadway


function showGoogleMaps() {

    var latLng = new google.maps.LatLng(position[0], position[1]);


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