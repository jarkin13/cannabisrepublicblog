<?php $mainCat = cccpa_get_main_category( $post->ID ); ?>
<a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo get_the_title( $post->ID ); ?>">
  <img src="<?php echo get_the_post_thumbnail_url( $post->ID ) ?>" alt="<?php echo get_the_title( $post->ID ); ?>">
  <div class="post-meta">
    <h2 class="category"><?php echo get_category( $mainCat )->name; ?></h2>
    <span class="state"><?php cccpa_get_state( $post->ID ); ?></span>
  </div>
  <h1><?php echo get_the_title( $post->ID ); ?></h1>
</a>