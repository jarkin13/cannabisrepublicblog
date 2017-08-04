<section class="most-popular rd rd-mobile">
  <div class="sidebar-title">Most Popular</div>
  <?php 
  $popularpost = new WP_Query( 
    array( 
      'posts_per_page' => 4, 
      'meta_key' => 'wpb_post_views_count', 
      'orderby' => 'meta_value_num', 
      'exclude' => $post->ID,
      'order' => 'DESC'  
      ) );
  while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
    <div class="row">
      <a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo $post->post_title; ?>">
        <div class="col-sm-5">
          <img src="<?php echo get_the_post_thumbnail_url( $post->ID ) ?>" alt="<?php echo get_the_title(); ?>">
        </div>
        <div class="col-sm-7">
          <?php echo get_the_category()[0]->name; ?>
          <?php the_titlesmall('', '...', true, 70); ?>
        </div>
      </a>
    </div>
  <?php endwhile; ?>
</section>