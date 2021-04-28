<?php get_header(); ?>

<?php
 
/**
 * Template Name: Feedback
 */
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$labelWidth = 2;
$textboxWidth = 5;


$fields =  array(
    'author' => '<div class="row"><div class="small-'.$labelWidth.' columns"><label for="author" class="inline">' 
				. __( 'Name' ) . ' <span class="required">(required)</span></label></div>' .
				'<div class="small-'.$textboxWidth.' columns">'.
        		'<input id="author" name="author" type="text" size="30"' . $aria_req . ' /></div>'
				.'<div class="small-'.(12 - $textboxWidth - $labelWidth).' columns"></div></div>',
				
    'email'  => '<div class="row">
				<div class="small-2 columns">
                	<label for="email" class="inline">Email <span class="required">(required)</span></label>
                </div>
                <div class="small-5 columns">
                	<input id="email" name="email" type="text"  size="30"' . $aria_req . ' />
				</div>
                <div class="small-5 columns">
                </div>
				</div>',
				
	'redirect_to' => '<input type="hidden" name="redirect_to" value="'.get_permalink().'"/>'
);

$comments_args = array(
    'fields' =>  $fields,
    'title_reply'=>'',
    'label_submit' => 'Submit',
	'comment_notes_after' => '<br/>',
	'comment_notes_before' => '',
	
	'comment_field'  => '<div class="row">
				<div class="small-2 columns">
                	<label for="comment" class="inline">Comment</label>
                </div>
                <div class="small-8 columns">
                	<textarea id="comment" name="comment" rows="50"></textarea>
				</div>
                <div class="small-2 columns">
                </div>
				</div>'
);

disable_html_in_comments();

get_header(); ?>


<div class="row padding-top">
    <div class="large-2 columns">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="small-padding">
        <?php display_pepperseeds_navigation('side-nav'); ?>
    </div>
    <div class="large-10 columns">
        <div class="content feedback-field">
		<h1><?php echo $post->post_title ?></h1>
        
        <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post();
		
			the_content();
			
		endwhile; else: 
		
			?><p>Sorry, no posts matched your criteria.</p><?php
		
		endif; ?>
        
		<?php comment_form($comments_args); ?>
        </div>
    </div>
</div>
    
<?php
 
display_page_content2();

get_footer(); 

?>