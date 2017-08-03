<!-- POSTS -->
<?php get_header(); ?>
<?php $mainCat = cccpa_get_main_category( $post->ID ); ?>
<div id="single" class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php wpb_set_post_views($post->ID); ?>
    <div class="row">
      <div class="col-xs-2 col-sm-2 rd rd-no-mobile">
        <div class="sidebar-title">Share</div>
        <?php if ( is_active_sidebar( 'sidebar-share' ) ) { ?>
          <div id="secondary" class="widget-area" role="complementary">
            <!-- Your share button code -->
            <div class="fb-share-button" 
              data-href="<?php bloginfo( 'name' ); ?>" 
              data-layout="button_count">
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6">
        <ul class="post-meta">
          <li>
            <a href="<?php echo get_category_link( $mainCat ) ;?>" class="category" alt="<?php echo get_category( $mainCat )->name;?>">
              <?php echo get_category( $mainCat )->name;?>
            </a>
          </li>
          <li><?php the_date(); ?></li>
        </ul>
        <h1><?php echo get_the_title(); ?></h1>
        <img src="<?php echo get_the_post_thumbnail_url( $post->ID ) ?>" alt="<?php echo get_the_title(); ?>" class="post-image">
        <div class="row">
          <div class="col-xs-2 col-sm-2 rd rd-mobile">
            <div class="sidebar-title">Share</div>
          </div>
          <div class="col-xs-10 col-sm-10 col-md-12">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-4 pull-right">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-sm-12">
        <?php get_template_part( 'template-parts/post/content', 'footer' ); ?>
      </div>
    </div>
  <?php endwhile; // End of the loop. ?>
</div>
<?php get_footer(); ?>