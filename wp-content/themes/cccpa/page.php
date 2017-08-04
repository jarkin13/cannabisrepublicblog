<!-- POSTS -->
<?php get_header(); ?>
<?php wpb_set_post_views($post->ID); ?>
<div id="single" class="container page">
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="row">
      <div id="post-content" class="col-xs-10 col-sm-10 col-md-8">
        <?php $categories = get_terms( 'category', array('parent' => 0, 'childless' => true) ); ?>
        <ul class="post-meta">
          <li>
            <?php foreach( $categories as $cat ) : ?>
              <a href="<?php echo get_category_link( $cat->term_id ) ;?>" class="category" alt="<?php echo get_category( $cat->term_id )->name;?>">
                <?php echo get_category( $cat->term_id )->name;?>
              </a>
            <?php endforeach; ?>
          </li>
        </ul>
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