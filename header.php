<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
<section id="branding">
<div id="site-title"><?php if ( ! is_singular() ) { echo '<h1>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'blankslate' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( ! is_singular() ) { echo '</h1>'; } ?></div>
<div id="site-description"><?php bloginfo( 'description' ); ?></div>
</section>

<nav class="navbar navbar-default" role="navigation"> 
<!-- Brand and toggle get grouped for better mobile display --> 
  <div class="navbar-header"> 
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
      <span class="sr-only">Toggle navigation</span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
    </button> 
    <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a> 
  </div> 
  <!-- Collect the nav links, forms, and other content for toggling --> 
  <div class="collapse navbar-collapse navbar-ex1-collapse"> 
    
		<?php /* Primary navigation */
		wp_nav_menu( array(
		  'menu' => 'top_menu',
		  'depth' => 2,
		  'container' => false,
		  'menu_class' => 'nav',
		  //Process nav menu using our custom nav walker
		  'walker' => new wp_bootstrap_navwalker())
		);
		?>

  </div>
</nav>

</header>
<div id="container">