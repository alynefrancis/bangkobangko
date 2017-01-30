<?php  

/**
 * Theme functions and definitions
 *
 *
 * @package bangkobangkoTheme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 * The $content_width variable is read by some plugins and is also used for media embedded in the site - essentially, it defines the maximum width of the content.
 *
 */
if ( ! isset( $content_width ) ) :
    $content_width = 600;
endif;

function bangko_theme_setup() {

	// Add default posts and comments RSS feed links to head.
	// add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'gallery-med', 500, 320, array( 'center', 'center' ) ); // Hard crop center


	add_theme_support( 'title-tag' );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 
		'aside', 
		'image', 
		'video', 
		'quote', 
		'link' 
	) );

	// Enable support for HTML5 markup.
	//Switch default core markup for search form, comment form, and comments to output valid HTML5.

	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

	add_theme_support( 'menus' );

	// Enable support for editable menus via Appearance > Menus
	register_nav_menus( 
		array(
		'primary-menu' => __( 'Primary Menu' ),
		'footer' => __( 'Footer Menu' )
	) );
}

add_action( 'after_setup_theme', 'bangko_theme_setup' );

//hide admin bar 
//add_filter('show_admin_bar', '__return_false');

add_filter(
  'wp_list_categories',
  function($str) {
    return str_replace('<br />','',$str);
  }
);

//Enqueue theme scripts and styles

function theme_scripts() {

	// Load Modernizr 
	wp_enqueue_script( 
		'modernizr_js', 
		get_template_directory_uri() . '/js/modernizr.custom.js', 
		'', 
		null, //version number
		false //load in footer 
		);

	//Load jQuery 2.0
	wp_deregister_script( 'jquery' );
	wp_register_script(
		'jquery', 
		"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js",
		false, //dependencies
		null, //version number
		true //load in footer
		);
	wp_enqueue_script( 'jquery' );

	// wp_enqueue_script( 
	// 	'', 
	// 	get_template_directory_uri() . '/js/jquery-1.11.3.min.js', 
	// 	array('jquery'), 
	// 	false, //dependencies
	// 	null, //version number
	// 	true //load in footer
	// 	); 

	wp_enqueue_script( 
		'isotope', 
		get_template_directory_uri() . '/js/isotope.pkgd.min.js', 
		array('jquery'), 
		null, //version number
		true //load in footer
		);  


	wp_enqueue_script(
		'photoswipe', 
		get_template_directory_uri() . '/js/photoswipe.min.js', 
		array('jquery'), 
		null, //version number
		true //load in footer
		);

	wp_enqueue_script(
		'photoswipe_default', 
		//not min version as changes have been made to hide some share buttons
		get_template_directory_uri() . '/js/photoswipe-ui-default.js', 
		array('jquery'), 
		null, //version number
		true //load in footer
		);
		

	wp_enqueue_script( 
		'images_loaded', 
		get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', 
		array('jquery'), 
		null, //version number
		true //load in footer
		);

	wp_enqueue_script( 
		'fitvids', 
		get_template_directory_uri() . '/js/jquery.fitvids.js', 
		array('jquery'), 
		null, //version number
		true //load in footer
		);


	wp_enqueue_script( 
		'theme_js', 
		get_template_directory_uri() . '/js/app.js', 
		array('jquery'), 
		null, //version number
		true //load in footer
		);
}

//don't want to call on the back-end of our site
if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// Load foundation CSS

function theme_styles() {

	wp_enqueue_style(
		'photoswipe', 
		get_template_directory_uri() . '/css/photoswipe.css'
		);

	// Skin CSS file (styling of UI - buttons, caption, etc.) In the folder of skin CSS file there are also:
   	// .png and .svg icons sprite, preloader.gif (for browsers that do not support CSS animations) 
	wp_enqueue_style( 
		'default-skin', 
		get_template_directory_uri() . '/css/default-skin/default-skin.css' 
		);	

	wp_enqueue_style( 
		'font-awesome', 
		get_template_directory_uri() . '/css/font-awesome.min.css'
		);
	wp_enqueue_style( 
		'googlefont_allura', 'https://fonts.googleapis.com/css?family=Allura'
		);
	wp_enqueue_style( 
		'googlefont_merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:300'
		);
	wp_enqueue_style( 
		'googlefont_raleway', 'https://fonts.googleapis.com/css?family=Raleway:300'
		);

	wp_enqueue_style( 
		'main', get_template_directory_uri() . '/style.css'
		);

	// threaded comments
	//no comments set for this theme
	   // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	   //     wp_enqueue_script( 'comment-reply' );
	   // }
}
add_action('wp_enqueue_scripts', 'theme_styles');





// widgets

function create_widget( $name, $id, $description) {
	$args = array(
		'name'          => __( $name ),
		'id'            => $id,
		'description'   => $description,  
		'before_widget' => '<div class = "widget">',
		'after_widget' => '</div>',
		'before_title'  => '<h4 class = "widget-title">',
		'after_title'   => '</h4>' 
	); 

	register_sidebar( $args );

};

create_widget( 'Stories Sidebar', 'stories', 'Displays on full page for each story');





/**
*
* Add SVG Support
*
**/
// Without this, SVG files will be rejected when attempting to upload them through the media uploader.
// https://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
*
* Customize the Excerpt
*
**/

function custom_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function new_excerpt_more($more){
	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) .'">' . __('[...]', 'bangko-theme') . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
*
* Enable ACF Options Page
*
**/

if(function_exists('acf_add_options_page')) { 
	acf_add_options_page('Theme Options');
}


/*
AFC Feature Image
*/




/* Utility helper functions */

/* pre_r() - makes for easy debugging. <?php pre_r($post); ?> */
function pre_r($obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

/* is_blog() - checks various conditionals to figure out if you are currently within a blog page */
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

/* get_post_parent() - Returns the current posts parent, if current post if top level, returns itself */
function get_post_parent($post) {
	if ($post->post_parent) {
		return $post->post_parent;
	}
	else {
		return $post->ID;
	}
}


// notice no closing php tag. This is an intentional omission, not an error. 