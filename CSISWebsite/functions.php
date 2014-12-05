<?php 

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

function register_my_menus() {
  register_nav_menus(
    array(
      'header' => __( 'Header Menu' ),
      'footer' => __( 'Footer Menu'),
      'primary'  => __('Primary Menu')
    )
  );
}
add_action( 'init', 'register_my_menus' );

?>



