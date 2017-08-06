<?php get_header(); ?>

<div id="category" class="container">
  <h1><?php single_cat_title(); ?></h1>
  <hr class="black thick">

  <?php if ( have_posts() ) : ?>
    <?php 
      $reset = 0;
      $i = (object) array(
        'counter' => 0,
        'total' => 0
      );
    ?>
hello

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

    <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
    <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

  <?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>

</div>
<?php get_footer();
