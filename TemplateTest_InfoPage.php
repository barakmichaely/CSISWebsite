<?php
	/* Template Name: Info Page */
	$title = rwmb_meta( "rw_title", $args = array());
	$subtitle = rwmb_meta( "rw_sub", $args = array());
	$url;
	$imagecaption = rwmb_meta( "rw_caption", $args = array());
	$files = rwmb_meta( 'rw_img', 'type=plupload_image' );
	foreach ($files as $info){ $url = $info['url']; }
	$imgstyle = "min-width:200px;min-height:200px;max-width:200px;background-image:url('" . $url . "');background-size:cover";
?>
<html>
	<br>
	<div style= <?php echo $imgstyle; ?> >
		<p style="color:green; text-align:center; padding-top:170px" > <?php echo $imagecaption; ?> </p>
	</div>
	<h1><?php echo $title; ?> </h1>
	<h3><?php echo $subtitle; ?> </h3>
</html>