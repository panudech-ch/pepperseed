<?php get_header(); ?>

<div class="row padding-top">
    <div class="large-2 columns">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="small-padding">
        <?php display_pepperseeds_navigation('side-nav'); ?>
    </div>
    <div class="large-7 columns">
        <?php display_pepperseeds_content_slogan(); ?>
    </div>
    <div class="large-3 columns">
        <?php display_pepperseeds_about(); ?>
    </div>
</div>
		
<?php

display_page_content1();

display_page_content2();

get_footer(); 

?>