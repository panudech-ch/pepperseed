/**
 * SiteShow
 * by Elin Ewald 2015
 */
$(document).ready(function() {

    (function ($) {
        $.fn.SiteShow = function (options) {
            options = $.extend({}, $.fn.SiteShow.defaults, options);

            /**
             * Initiate slideshow
             *
             */
            var initSlideshow = function () {

                // sets custom colors
                $('#logo').css({
                    'background-color': options.logo_background_color
                });

                $('#nav-menu').css({
                    'background-color': options.menu_background_color,
                    'color': options.menu_font_color
                });

                $('#music-control').css({
                    'color': options.menu_font_color
                });

                $('.content').css({
                    'background': options.content_background_color,
                    'color': options.content_font_color
                });

                $('.heading').css({
                    'background': options.content_background_color,
                    'color': options.content_font_color
                });

                $('.slide').css({
                    'background-color': options.slide_background_color
                });


                // gets current window height/width
                var windowHeight = window.innerHeight || $(window).height(), // make it work on ipad & android
                    windowWidth = window.innerWidth || $(window).width();

                // sets slides width/height
                $('.slide').css('height', windowHeight + 'px');
                $('.slide').css('width', windowWidth - 200 + 'px');

                // hides gallery black background
                $('#bkg').hide();

                var totalSlides = $('.slide').length; // counts amount of slides
                var currentSlide = 1; // set current slide to 1
                var nextSlide;
                var i;

                console.log('Number of slides: ' + totalSlides);


                for (i = 1; i <= totalSlides; i++) {

                    // Creates menu
                    $('#nav-menu').append('<div id="nav-' + i + '" class="navs">' + $('#slide-' + i + ' h1').text() + '</p>');

                    // Creates slide background image
                    if (($('#slide-' + i).attr('data-src')) == '') {
                    } else {
                        var bkg_img = $('#slide-' + i).attr('data-src');
                        $('#slide-' + i).css({
                            'background-image': 'url("' + bkg_img + '")'
                        });
                    }

                    // counts ampunt of images in gallery
                    var totalImages = $('.image').length;
                    var w;

                    // Creates gallery
                    for (w = 1; w <= totalImages; w++) {
                        var img_img = $('#image-' + i + '-' + w).attr('data-src');
                        console.log(img_img);
                        $('#image-' + i + '-' + w).css({
                            'background-image': 'url("' + img_img + '")'
                        });

                    }
                }


                // Marks current slide in menu
                $('#nav-1').css('background-color', options.menu_current_color);

                /**
                 * Change slides
                 *
                 */
                var changeSlide = function (nextSlide) {

                    // gets current window height/width
                    var windowHeight = window.innerHeight || $(window).height(),
                        windowWidth = window.innerWidth || $(window).width();

                    // Marks slide in menu
                    $('.navs').css('background-color', 'inherit');
                    $('#nav-' + nextSlide).css('background-color', options.menu_current_color);

                    // Next slide
                    if (nextSlide > currentSlide) {
                        var difference1 = nextSlide - currentSlide;
                        var topSlide = $('.slide').offset().top;

                        $('.slide').animate({top: (topSlide - (windowHeight * difference1)) + 'px'}, 500);

                        currentSlide = nextSlide;
                    }

                    //Previous slide
                    if (nextSlide < currentSlide) {
                        var difference2 = currentSlide - nextSlide;
                        var topSlide = $('.slide').offset().top;

                        $('.slide').animate({top: (topSlide + (windowHeight * difference2)) + 'px'}, 500);

                        currentSlide = nextSlide;
                    }

                }; // end of changeSlide function


                /**
                 * Click function, go to slide
                 *
                 */
                $('.navs').click(function () {

                    // prevents animation from fire before other is done
                    if ($(':animated').length) {
                        return false;
                    }

                    var navID = $(this).attr('id'); // gets the id
                    var navNUM = navID.substr(4); // gets the number of the id

                    changeSlide(navNUM); // uses number to get to specific slide

                }); // end of click function


                /**
                 * Toggle function, content open or close
                 *
                 */
                $('.heading').toggle(function () {

                        // gets current window height
                        var windowHeight = window.innerHeight || $(window).height(); // make it work on ipad & android
                        // sets content height
                        var contentHeight = windowHeight - 90 + 'px';

                        $('.heading').animate({bottom: contentHeight}, 500);
                        $('.content').animate({height: contentHeight}, 500);
                        $('.open').attr({src: 'img/close.png'});

                    },
                    // back to normal
                    function () {

                        $('.heading').animate({bottom: '0px'}, 500);
                        $('.content').animate({height: '0px'}, 500);
                        $('.open').attr({src: 'img/open.png'});

                    }); // end of toggle function


                /**
                 * Click function, turn on and off the music
                 *
                 */
                $("#music-control").click(function () {

                    //gets html5 element
                    var music = document.getElementById("music");

                    if (music.paused) {
                        $('#music-control img').attr({src: 'img/volume-on.png'});
                        music.play();
                    } else {
                        $('#music-control img').attr({src: 'img/volume-off.png'});
                        music.pause();
                    }

                }); // end of click function


                /**
                 * Scroll function, change slide up and down
                 *
                 */
                $(window).bind('mousewheel', function (event) {

                    // prevents animation from fire before other is done
                    if ($(':animated').length) {
                        return false;
                    }

                    if ((event.originalEvent.wheelDelta >= 0)) {
                        console.log('Scroll up');

                        if (currentSlide > 1) {
                            changeSlide(parseInt(currentSlide) - 1);
                        }
                    } else {
                        console.log('Scroll down');

                        if (currentSlide < totalSlides) {
                            changeSlide(parseInt(currentSlide) + 1);
                        }
                    }
                }); // end of scroll function


                /**
                 * Key function, change slide up and down
                 *
                 */
                window.addEventListener("keyup", checkKeyPressed, false);

                function checkKeyPressed(e) {

                    // prevents animation from fire before other is done
                    if ($(':animated').length) {
                        return false;
                    }

                    if (e.keyCode == "38") {

                        if (currentSlide > 1) {
                            changeSlide(parseInt(currentSlide) - 1);
                        }

                        console.log('Arrow up was pressed');

                    } else if (e.keyCode == "40") {

                        if (currentSlide < totalSlides) {
                            changeSlide(parseInt(currentSlide) + 1);
                        }

                        console.log('Arrow down was pressed');
                    }
                } // end of key function


                /**
                 * Toggle function, gallery lightbox
                 *
                 */
                $('.image').toggle(function () {

                        // gets current window height/width
                        var windowHeight = window.innerHeight || $(window).height(), // make it work on ipad & android
                            windowWidth = window.innerWidth || $(window).width();

                        // Create new offscreen image to get width/height from
                        var theImage = new Image();
                        theImage.src = $(this).attr('data-src');

                        // Get accurate width/height
                        var imageWidth = theImage.width;
                        var imageHeight = theImage.height;

                        // Image is not allowed to be wider than window
                        if (imageWidth > windowWidth) {
                            imageWidth = windowWidth - 30;
                        }

                        // Image is not allowed to be higher than window
                        if (imageHeight > windowHeight) {
                            imageHeight = windowHeight - 30;
                        }

                        // center image
                        var imageLeft = (windowWidth - imageWidth) / 2;
                        var imageTop = (windowHeight - imageHeight) / 2;

                        $(this).css({
                            'position': 'fixed',
                            'height': imageHeight,
                            'width': imageWidth,
                            'z-index': '310',
                            'left': imageLeft + 'px',
                            'top': imageTop + 'px',
                            'margin': '0px'
                        });

                        $('#bkg').fadeIn();

                    },
                    // back to normal
                    function () {

                        $(this).css({
                            'width': '150px',
                            'height': '150px',
                            'background-size': 'cover',
                            'background-repeat': 'no-repeat',
                            'margin': '5px',
                            'left': 'auto',
                            'top': 'auto',
                            'position': 'static'
                        });

                        // $('.image').removeAttr('style');

                        $('#bkg').hide();

                    }
                ); // end of toggle function

                /**
                 * Click function, logo
                 *
                 */
                $('#logo').click(function () {
                    // reload page when clicked
                    location.reload();
                }); // end of toggle function


            }; // end of initSlideshow function


            initSlideshow();
            console.log("Slideshow was initiated.");

        }; // end of SiteShow function


        /**
         * Option defaults
         *
         */
        $.fn.SiteShow.defaults = {
            'menu_background_color': '#112835',
            'menu_font_color': '#ede6cc',
            'menu_current_color': '#284e63',
            'logo_background_color': '#eae3c9',
            'content_background_color': 'rgba(234,230,213,0.9)',
            'content_font_color': 'black',
            'slide_background_color': 'gray'
        };


    })(jQuery);
});

/**
 * Created by PUM on 15/4/2560.
 */
