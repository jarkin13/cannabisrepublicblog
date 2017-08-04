<div class="sidebar share sticky">
  <div class="sticky-container">
    <div class="sidebar-title">Share</div>
    <div class="row">
      <div class="col-sm-12 border"><hr></div>
      <a href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>&title=<?php echo get_the_title(); ?>" class="facebook" target="_blank">
        <div class="col-sm-5">
          <i class="fa fa-facebook-official" aria-hidden="true"></i>
        </div>
        <div class="col-sm-7 post-meta">
          <p>Share</p>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-sm-12 border"><hr></div>
      <a href="http://twitter.com/home?status=<?php echo get_permalink(); ?>+<?php echo get_the_title(); ?>" class="twitter"target="_blank">
        <div class="col-sm-5">
          <i class="fa fa-twitter-square" aria-hidden="true"></i>
        </div>
        <div class="col-sm-7 post-meta">
          <p>Tweet</p>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-sm-12 border"><hr></div>
      <?php $body = 'Check out this great article I read on ' . get_bloginfo( 'name' ) . ' -  ' . get_permalink(); ?>
      <a href="mailto:?subject=<?php get_bloginfo( 'name' ); ?> - <?php echo get_the_title(); ?>&body=<?php echo $body; ?>" class="email">
        <div class="col-sm-5">
          <i class="fa fa-envelope-o" aria-hidden="true"></i>
        </div>
        <div class="col-sm-7 post-meta">
          <p>Email</p>
        </div>
      </a>
    </div>
  </div>
</div>