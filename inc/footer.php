        <!--<div id="TA_cdsratingsonlynarrow197" class="TA_cdsratingsonlynarrow" align="center">
        <ul id="KBaUas08C" class="TA_links YoOfpzs">
        <li id="M5sxzzd" class="lQgRh7Tyu">
        <a target="_blank" href="https://www.tripadvisor.com.au/"><img src="https://www.tripadvisor.com.au/img/cdsi/img2/branding/tripadvisor_logo_transp_340x80-18034-2.png" alt="TripAdvisor"/></a>
        </li>
        </ul>
        </div>
        <script src="https://www.jscache.com/wejs?wtype=cdsratingsonlynarrow&amp;uniq=197&amp;locationId=3761569&amp;lang=en_AU&amp;border=true&amp;display_version=2"></script>
        <div id="footer" align="center">
         All right reserved 2013 © <a href="http://www.pepperseeds.com.au/" target="_blank" style="color:#000;"><b>PEPPERSEEDS</b></a>  [ <?php if($_SESSION['sessionLogin']!="admin"){?>
                <a href="login.php" style="color:#000;">Login</a>
            <?php } else {?>
                <a href="logout.php" style="color:#000;">Logout</a>
            <?php } ?>  ]<br />
        www.pepperseeds.com.au <?php /*if(($FB!='') or ($TW!='') or ($IS!='') or ($YT!='')){*/?>
            <span class="navLR"><img src="images/spacer.gif" width="1" height="1" /></span>Find Us On <?php /*if($FB!=''){*/?><a href="<?php /*echo $FB; */?>" target="_blank"><img src="images/icoFB.png" border="0" align="absmiddle" /></a><?php /*} */?>
            <?php /*if($TW!=''){*/?><a href="<?php /*echo $TW; */?>" target="_blank"><img src="images/icoTW.png" border="0" align="absmiddle" /></a><?php /*} */?>
            <?php /*if($IS!=''){*/?><a href="<?php /*echo $IS; */?>" target="_blank"><img src="images/icoIS.png" border="0" align="absmiddle" /></a><?php /*} */?>
            <?php /*if($YT!=''){*/?><a href="<?php /*echo $YT; */?>" target="_blank"><img src="images/icoYT.png" border="0" align="absmiddle" /></a><?php /*} */?>
            <?php /*} */?>
        </div>-->

        <div class="footer_pepper">
             <div class="footer_custom">
                &copy;2017 PEPPER SEEDS
                <hr class="peper_footer_line">
                 <div class="footer_icon">
                     <a href="https://www.instagram.com/pepperseedsthai" target="_blank">
                         <img class="icon_pep" src="inc/img/icon/icon-pepper-ig.png" alt="">
                     </a>
                     <a href="https://www.facebook.com/pepperseedsthai" target="_blank" style="margin-left: 2px">
                         <img class="icon_pep" src="inc/img/icon/icon-pepper-fb.png" alt="">
                     </a>
                     <a href="mailto:eat@pepperseeds.com.au" target="_top" style="margin-left: 2px">
                         <img class="icon_pep" src="inc/img/icon/icon-pepper-mail.png" alt="">
                     </a>
                 </div>
            </div>
        </div>
        <script>
        $(window).load(function() {
            $(".btn-nav").on("click tap", function() {
                var onepage = $('#onepage');
                if (onepage.length) {
                    $(".nav-container").toggleClass("showNav hideNav").removeClass("hidden");
                    $(this).toggleClass("animated");
                    $(".nav-container").css("opacity","1");
                    $('.menu_desktop.is_new').toggleClass('is-active');
                } else {
                    $(".nav-container").toggleClass("showNav hideNav").removeClass("hidden");
                    $(this).toggleClass("animated");
                    $(".nav-container").css("opacity","1");
                    if($('.nav-container').hasClass('showNav'))
                    {
                        $(".owl-carousel").css("display","none");
                        $("#directionlink").css("display","none");
                        $("#directionlink3").css("display","none");
                        $("#directionlink").css("display","none");
                        $("#contactform").css("position","inherit");
                        $(".slocan").css("z-index","0");
                        $("#directionlink3").css("display","none");
                        $(".booking_table").css("display","none");

                    }else {
                        $(".owl-carousel").css("display","block");
                        $("#directionlink").css("display","block");
                        $("#directionlink3").css("display","block");
                        $("#contactform").css("position","fixed");
                        $("#directionlink").css("display","block");
                        $(".slocan").css("z-index","1");
                        $("#directionlink3").css("display","block");
                        $(".booking_table").css("display","block");
                    }
                }
                
            });
        });
        </script>
    </body>
</html>