<!-- POSTS -->
<?php get_header(); ?>
<?php $mainCat = cccpa_get_main_category( $post->ID ); ?>
<div id="single" class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="row">
      <div id="post-content" class="col-xs-10 col-sm-10 col-md-8">
        <h1><?php echo get_the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
      <div id="most-popular-sidebar" class="col-md-4 pull-right">
        <?php get_sidebar(); ?>
      </div>
    </div>
  <?php endwhile; // End of the loop. ?>
</div>
<?php get_footer(); ?>