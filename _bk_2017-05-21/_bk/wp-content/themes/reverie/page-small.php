<?php
/*
Template Name: Small
*/
get_header(); ?>

<div class="row padding-top">
    <div class="large-2 columns">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="small-padding">
        <?php display_pepperseeds_navigation('side-nav'); ?>
    </div>
    <div class="large-3 columns">
        <div class="content big-height">
		<h1><?php echo $post->post_title ?></h1>
        <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post();
		
			the_content();
			
		endwhile; else: 
		
			?><p>Sorry, no posts matched your criteria.</p><?php
		
		endif; ?>
        </div>
    </div>
    <div class="large-7 columns">
        <?php display_pepperseeds_content_slogan(); ?>
    </div>
</div>
    
<?php
 
display_page_content2();

get_footer(); 

?>