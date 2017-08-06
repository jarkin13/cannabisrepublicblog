<?php get_header(); ?>

<div id="category" class="post-container container">
  <h1 class="title"><?php single_cat_title(); ?></h1>
  <hr class="black thick">

  <?php if ( have_posts() ) : ?>
    <?php 
      $reset = 0;
      $i = (object) array(
        'counter' => 0,
        'total' => 0
      );
    ?>
    <?php if( !is_paged() ) : ?>
      <div class="row top">

        <div class="col-sm-6 md-heading">
          <?php while ( have_posts() ) : the_post();  ?>
            <?php if( $i->counter < 1 ) : ?>
              <?php get_template_part( 'template-parts/post/content', 'default' ); ?>
              <?php $i->counter++; ?>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>

        <?php $i->total = $i->counter; ?>
        <div class="col-sm-6 sm-heading content-right">
          <?php while ( have_posts() ) : the_post();  ?>
            <?php $reset++; ?>
            <?php if( $reset > $i->total && $reset < $i->total + 3 ) : ?>
              <?php get_template_part( 'template-parts/post/content', 'left' ); ?>
              <?php $i->counter++; ?>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>

      </div>

      <?php $i->total = $i->counter; $reset = 0;?>
      <div class="row top">
        <?php while ( have_posts() ) : the_post();  ?>
          <?php $reset++; ?>
          <?php if( $reset > $i->total && $reset < $i->total + 4 ) : ?>
            <div class="col-sm-4 sm-heading">
              <?php get_template_part( 'template-parts/post/content', 'default' ); ?>
            </div>
            <?php $i->counter++; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
    <?php else : ?>
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
    <?php endif; ?>
    <hr class="black thick">
      <?php wpbeginner_numeric_posts_nav(); ?>
      <hr class="black thick">
  <?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>

</div>
<?php get_footer();
