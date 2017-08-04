<!-- POSTS -->
<?php get_header(); ?>
<?php $mainCat = cccpa_get_main_category( $post->ID ); ?>
<div id="single" class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php wpb_set_post_views($post->ID); ?>
    <div class="row">
      <div id="share-sidebar" class="col-xs-2 col-sm-2 rd rd-no-mobile">
        <?php get_template_part( 'template-parts/post/content', 'share' ); ?>
      </div> 
      <div id="post-content" class="col-xs-12 col-sm-12 col-md-6">
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
            <?php get_template_part( 'template-parts/post/content', 'share' ); ?>
          </div>
          <div class="col-xs-10 col-sm-10 col-md-12">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <div id="most-popular-sidebar" class="col-md-4 pull-right">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-sm-12">
        <?php get_template_part( 'template-parts/post/content', 'footer' ); ?>
      </div>
    </div>
  <?php endwhile; // End of the loop. ?>
</div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php get_footer(); ?>