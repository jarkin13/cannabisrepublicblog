<?php $mainCat = cccpa_get_main_category( $post->ID ); ?>
<div class="row">
  <div class="col-sm-5 image">
    <a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo get_the_title( $post->ID ); ?>">
      <img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" alt="<?php echo get_the_title( $post->ID ); ?>">
    </a>
  </div>
  <div class="col-sm-7 text">
    <div class="post-meta">
      <h2 class="category large"><?php echo get_category( $mainCat )->name; ?></h2>
      <span class="state"><?php cccpa_get_state( $post->ID ); ?></span>
    </div>
    <h1><a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo get_the_title( $post->ID ); ?>"><?php echo get_the_title( $post->ID ); ?></a></h1>
    <p><?php echo get_the_excerpt( $post->ID ); ?></p>
  </div>
</div>
<hr>