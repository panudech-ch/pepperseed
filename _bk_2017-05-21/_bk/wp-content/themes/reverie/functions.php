<?php
/*
Author: Besthemoth

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
    - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here
/*
2. lib/enqueue-sass.php or enqueue-css.php
    - enqueueing scripts & styles for Sass OR CSS
    - please use either Sass OR CSS, having two enabled will ruin your weekend
*/
require_once('lib/enqueue-sass.php'); // do all the cleaning and enqueue if you Sass to customize Reverie
//require_once('lib/enqueue-css.php'); // to use CSS for customization, uncomment this line and comment the above Sass line
/*
3. lib/foundation.php
	- add pagination
	- custom walker for top-bar and related
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
**********************/
function reverie_theme_support() {
	// Add language supports. Please note that Reverie does not include language files, not yet
	load_theme_textdomain('reverie', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Navigation', 'reverie'),
		'utility' => __('Utility Navigation', 'reverie')
	));
	
	// Add custom background support
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

function redirect_after_comment($location)
{
	return $_SERVER["HTTP_REFERER"];
}
add_filter('comment_post_redirect', 'redirect_after_comment');

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
	echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

function get_images_from_media_library() {
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' =>'image',
        'post_status' => 'inherit',
        'orderby' => 'rand',
		's' => 'random-image-'
    );
    $query_images = new WP_Query( $args );
    $images = array();
    foreach ( $query_images->posts as $image) {
        $images[] = $image->guid;
		break;
    }
	
	if(count($images) == 0){
		return get_template_directory_uri().'/img/no_image.gif';
	}
	
    return $images[0];
}

function display_random_image_from_media_library() {

	$imgs = get_images_from_media_library();
	$html .= '<img src="'. $imgs .'"/>';
	
	return $html;

}

function display_pepperseeds_navigation($classname)
{
	wp_nav_menu(
		array (
			'menu'            => 'main-menu',
			'container'       => FALSE,
			'container_id'    => FALSE,
			'menu_class'      => '',
			'menu_id'         => FALSE,
			'depth'           => 1,
			'items_wrap'      => '<div class="'.$classname.'">%3$s</div>',
			'walker'          => new Description_Walker
		)
	);
}

function display_pepperseeds_content_slogan()
{
	?>
    <div class="naming-home">
      <p><?php bloginfo('description'); ?></p>
    </div>
    <?php
}

function display_pepperseeds_contact()
{
	$page = get_page_by_title('Contact');
	$content = apply_filters('the_content', $page->post_content);
	
	echo $content;
}

function display_pepperseeds_map()
{
	$page = get_page_by_title('Map');
	$content = apply_filters('the_content', $page->post_content);
	
	echo $content;
}

function display_pepperseeds_latest_feedback()
{
	
	$recent_comments = get_comments( array(
		'number'    => 10,
		'post_name' => 'Feedback',
		'order' => 'DESC'
	) );
	
	?>
    <h1>Feedback</h1>
    <div class="feedback">
    <ul>
    
    <?php
	foreach($recent_comments as $comment) :
		echo '<li><b>' . $comment->comment_author . '</b> ' . $comment->comment_content . '<br/> ' . get_comment_date( 'j/n/Y', $comment->comment_ID ) . '</li>';
	endforeach;
	?>
    
    </ul>
    </div>
    <?php
}

function display_pepperseeds_latest_post()
{
	$catID = get_cat_ID('news');
	
	$args = array(
    'numberposts' => 1,
    'offset' => 0,
    'category' => $catID,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'draft, publish, future, pending, private',
    'suppress_filters' => true );

    $recent_posts = wp_get_recent_posts( $args, $output = ARRAY_A );
	$latestPost = $recent_posts[0];
	?>
    <h1>NEWS / PROMOTION</h1>
    <div class="row news" style="background:url(<?php echo get_field( "image", $latestPost["ID"] );  ?>);">
      <div class="small-4 columns">
      &nbsp;
      </div>
      <div class="small-8 columns news-content">
          <h1><?php echo $latestPost["post_title"]; ?></h1>
          <p>
          <?php echo get_field( "sub-heading", $latestPost["ID"] );  ?>
          </p>
      </div>
    </div>
    <?php
}

function display_pepperseeds_about() {
	
	$page = get_page_by_title('About Us');
	
	$sitetitle = get_bloginfo('name');
	$content = apply_filters('the_content', $page->post_content);
	
	?>
    <div class="wording-home">
        <h1><?php echo $sitetitle; ?></h1>
        <p><?php echo $content; ?></p>
    </div>
    <?php
}

function display_page_content1() {
	?>
	<div class="row padding-top">
        <div class="large-5 columns">
            <div class="content">
            <?php echo display_random_image_from_media_library(); ?>
            </div>
        </div>
        <div class="large-5 columns">
        <div class="content normal-height">
            <?php echo display_pepperseeds_contact(); ?>
        </div>
        </div>
        <div class="large-2 columns">
            <div class="content normal-height">
            <?php echo display_pepperseeds_map(); ?>
            </div>
        </div>
    </div>
    <?php
}

function display_page_content2() {
	?>
	<div class="row padding-top">
		<div class="large-2 columns">
			<div class="content normal-height">
			<?php echo display_pepperseeds_latest_feedback(); ?>
			</div>
		</div>
		<div class="large-5 columns">
			<div class="content">
			<?php echo display_pepperseeds_latest_post(); ?>
			</div>
		</div>
		<div class="large-5 columns">
		<div class="content normal-height">
			<?php echo display_facebook_page(); ?>
		</div>
		</div>
	</div>
    <?php
}

function display_facebook_page() {
	?>
	<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpepperseedsthai&amp;width=358&amp;height=325&amp;show_faces=false&amp;colorscheme=light&amp;stream=true&amp;border_color=%23ffffff&amp;header=true&amp;appId=624840540864299" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:358px; height:325px;" allowTransparency="true"></iframe>
    <?php
}

function disable_html_in_comments()
{
    global $allowedtags;
    $allowedtags = array();
}

class Description_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth, $args)
    {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = 'menu-item';
		
		$class_names .= in_array("current_page_item", $item->classes) ? ' active' : '';

        ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before
            . "<a $attributes>"
            . "<div id='menu-item-$item->ID' $class_names>"
            . $title
			. "</div>"
            . '</a> ';

        $output .= $item_output;
    }
}

?>