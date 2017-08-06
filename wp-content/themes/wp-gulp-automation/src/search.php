<?php get_header(); ?>

<div id="search" class="post-container container">

  <header>
    <?php if ( have_posts() ) : ?>
      <h1 class="title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
      <hr class="black thick">
    <?php else : ?>
      <h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
    <?php endif; ?>
  </header><!-- .page-header -->

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

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

    <?php endwhile; ?>
  <?php else : ?>

    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
    <?php get_search_form(); ?>

  <?php endif; ?>

</div><!-- .wrap -->

<?php get_footer();
