<section class="sidebar most-popular rd rd-no-mobile">
  <div class="sidebar-title">Most Popular</div>
  <?php 
  $popularpost = new WP_Query( 
    array( 
      'posts_per_page' => 4, 
      'meta_key' => 'wpb_post_views_count', 
      'orderby' => 'meta_value_num', 
      'post__not_in' => array( $post->ID ),
      'order' => 'DESC'
      ) );
  while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
    <?php $mainCat = cccpa_get_main_category( $post->ID ); ?>
    <div class="row">
      <div class="col-sm-12 border"><hr></div>
      <a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo $post->post_title; ?>">
        <div class="col-sm-5 sidebar-post-image">
          <img src="<?php echo get_the_post_thumbnail_url( $post->ID ) ?>" alt="<?php echo get_the_title(); ?>">
        </div>
        <div class="col-sm-7 sidebar-post-content">
          <div class="post-meta">
            <span class="category"><?php echo get_category( $mainCat )->name; ?></span>
          </div>
          <h4><?php the_titlesmall('', '...', true, 40); ?></h4>
          <div class="post-meta">
            <span class="state"><?php cccpa_get_state( $post->ID ); ?></span>
          </div>
        </div>
      </a>
    </div>
  <?php endwhile; ?>
  <br>
  <?php if ( is_active_sidebar( 'sidebar-main' ) ) { ?>
    <div id="secondary" class="widget-area" role="complementary">
      <?php dynamic_sidebar( 'sidebar-main' ); ?>
    </div>
  <?php } ?>
</section>


