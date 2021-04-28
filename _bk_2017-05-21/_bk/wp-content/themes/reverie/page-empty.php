<?php
/*
Template Name: Empty
*/
get_header(); ?>

<div class="row padding-top">
    <div class="large-2 columns">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="small-padding">
        <?php display_pepperseeds_navigation('side-nav'); ?>
    </div>
    <div class="large-10 columns">
        <div class="content">
        <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post();
		
			the_content();
			
		endwhile; else: 
		
			?><p>Sorry, no posts matched your criteria.</p><?php
		
		endif; ?>
        </div>
    </div>
</div>
    
<?php
 
display_page_content2();

get_footer(); 

?>