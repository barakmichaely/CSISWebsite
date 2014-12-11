<?php get_header(); ?>
   <ul class="breadcrumb">
      <li><a href="#">Home</a> <span class="divider">/</span></li>
      <li><a href="#">Library</a> <span class="divider">/</span></li>
      <li class="active">Data</li>
   </ul>
<div class="row">
  <div class="span8">
 
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <p><em><?php the_time('l, F jS, Y'); ?></em></p>
 
        <?php the_content(); ?>
 
        <hr>
        <?php comments_template(); ?>
 
    <?php endwhile; else: ?>
        <p><?php _e('Sorry, this page does not exist.'); ?></p>
    <?php endif; ?>
 
  </div>
  <div class="span4">
    <?php get_sidebar(); ?>   
  </div>
</div>
 
<?php get_footer(); ?>
