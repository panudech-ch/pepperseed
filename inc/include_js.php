<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 2/1/2017
 * Time: 3:43 PM
 */
?>
<script type="text/javascript" src="inc/js/jquery-1.12.4.min.js?v=1"></script>
<script type="text/javascript">
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>
<script type="text/javascript" src="colorbox/jquery.colorbox-min.js?v=1"></script>
<script type="text/javascript" src="inc/js/main.min.js?v=1"></script>
<script type="text/javascript" src="inc/bootstrap/js/bootstrap.min.js?v=1"></script>
