/**
 * Created by chawapon on 1/28/2017.
 */
$(document).ready(function(){
    $('.container')
        .load('inc/logo_pepper.php')
        .css({opacity:0}) /*set opacity to 0*/
        .delay(2E0) /*wait 2 seconds*/
        .animate({opacity:1},2000)
        .fadeOut(1000, function () {
            $('.container').load('inc/menu_pepper.php',function () {
                $(this).fadeIn(2000);
            });
        });
});
