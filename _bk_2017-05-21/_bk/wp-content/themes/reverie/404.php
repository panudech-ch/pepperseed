<?php get_header(); ?>

<div class="row padding-top">
    <div class="large-2 columns">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="small-padding">
        <?php display_pepperseeds_navigation('side-nav'); ?>
    </div>
    <div class="large-10 columns">
        <div class="content feedback-field normal-height">
		<h1>PAGE NOT FOUND</h1>
		<p class="padding-bottom-big">We could not find the page you requested.</p>
        </div>
    </div>
</div>
    
<?php
 
display_page_content1();

get_footer(); 

?>