<?php

add_action('after_setup_theme', 'wpt_setup');
	if(!function_exists( 'wpt_setup' )):
		function wpt_setup(){
			register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
		} endif;

function wpt_register_js(){
	wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
	wp_enqueue_script('jquery.bootstrap.min');
}
add_action('init', 'wpt_register_js');
function wpt_register_css(){
	wp_register_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap.min');
}
add_action('wp_enqueue_scripts', 'wpt_register_css');
require_once('wp_bootstrap_navwalker.php');

// remove_menu_page("posts");

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

// check for a template type
if($template_file == 'TemplateTest_InfoPage.php'){
	add_filter( 'rwmb_meta_boxes', 'YOURPREFIX_register_meta_boxes' );
}

function YOURPREFIX_register_meta_boxes($meta_boxes){
	$prefix = 'rw_';

	// 1st meta box
	$meta_boxes[] = array(
		'id'       => 'infostuff',
		'title'    => 'Meta Data',
		'pages'    => array( 'post', 'page' ),
		'context'  => 'normal',
		'priority' => 'high',

		'fields' => array(
			array(
				'name'  => 'Banner Image',
				'desc'  => '',
				'id'    => $prefix . 'img',
				'type'  => 'image',
				'std'   => '',
				'class' => 'custom-class',
				'clone' => false,
			),
			array(
				'name'  => 'Banner Caption',
				'desc'  => '',
				'id'    => $prefix . 'caption',
				'type'  => 'text',
				'std'   => 'Im a Banner!',
				'class' => 'custom-class',
				'clone' => false,
			),
			array(
				'name'  => 'Title',
				'desc'  => '',
				'id'    => $prefix . 'title',
				'type'  => 'text',
				'std'   => 'Page Title',
				'class' => 'custom-class',
				'clone' => false,
			),
			array(
				'name'  => 'Subtitle',
				'desc'  => '',
				'id'    => $prefix . 'sub',
				'type'  => 'text',
				'std'   => 'Clever Subtitle',
				'class' => 'custom-class',
				'clone' => false,
			),
			
		)
	);

	//2nd meta box
	$meta_boxes[] = array(
		'id'       => 'contentstuff',
		'title'    => 'Page Content',
		'pages'    => array( 'post', 'page' ),
		'context'  => 'normal',
		'priority' => 'high',

		'fields' => array(
			array(
				'name'  => 'Text Body',
				'desc'  => '',
				'id'    => $prefix . 'textbody',
				'type'  => 'textarea',
				'std'   => 'I am a body of text!',
				'class' => 'custom-class',
				'clone' => false,
			),
		)
	);

	return $meta_boxes;
}

add_action("admin_menu", "setup_theme_admin_menus");
function setup_theme_admin_menus(){
	add_submenu_page('themes.php',
		'Navigation', 'Navigation', 'manage_options',
		'front-page-elements', 'theme_front_page_settings');

	add_submenu_page('themes.php',
		'Navigation2', 'Navigation Test', 'manage_options',
		'front-page-elements2', 'theme_front_page_settings');

	add_submenu_page(
		'post.php?post=5&action=edit',
		'Checkout',
		'Checkout',
		'edit_pages',
		'custom_parent_page',
		function(){
			echo "yo";
		}
	);
}

function theme_front_page_settings(){
	echo "Navigation Setup";
}



add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}