<?php get_header(); ?>

<div id="category" class="container">
  <?php
    the_archive_title( '<h1>', '</h1>' );
    the_archive_description( '<div>', '</div>' );
  ?>
  <hr class="black thick">

  <?php if ( have_posts() ) : ?>

    <div class="row">
      <div id="post-content" class="col-sm-8 sm-heading content-left">
        <?php while ( have_posts() ) : the_post();  ?>
          <?php get_template_part( 'template-parts/post/content', 'right' ); ?>
        <?php endwhile; ?>
      </div>
      <div id="most-popular-sidebar" class="col-md-4 pull-right">
        <?php get_sidebar(); ?>
      </div>
    </div>

    <?php wpbeginner_numeric_posts_nav(); ?>

  <?php else : ?>

    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

  <?php endif; ?>

</div><!-- .wrap -->

<?php get_footer();