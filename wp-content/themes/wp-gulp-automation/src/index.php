<?php get_header(); ?>
<div id="blogs" class="container">
  <?php if( is_category() ) : ?>
    <h1><?php single_cat_title(); ?></h1>
    <hr class="black thick">
  <?php endif; ?>
  <?php  if ( have_posts() ) : ?>
    <div class="row top">
      <?php 
      $i = 0;
      $c = ( object ) array(
        'counter' => 0,
        'total'     => 0
      ); ?>
      <div class="col-sm-6 md-heading">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php if( $i < 1 ) : ?>
          <?php get_template_part( 'template-parts/post/content', 'default' ); ?>
          <?php $i++; $c->counter++; ?>
        <?php endif; ?>
      <?php endwhile; ?>
      </div>

      <?php $i = 0; $c->total = $c->counter; ?>
      <div class="col-sm-6 sm-heading content-right">
      <?php while ( have_posts() ) : the_post(); if( $i <= $c->total + 2 ) : ?>
        <?php if( $i > $c->total ) : ?>
          <?php get_template_part( 'template-parts/post/content', 'left' ); ?>
          <?php $c->counter++;?>
        <?php endif; ?>
        <?php $i++; ?>
      <?php endif; endwhile; ?>
      </div>
    </div>

    <div class="row top">
      <?php $i = 0; $c->total = $c->counter; ?>
      <?php while ( have_posts() ) : the_post(); if( $i <= $c->total + 3 ) : ?>
        <?php if( $i > $c->total ) : ?>
          <div class="col-sm-4 sm-heading">
            <?php get_template_part( 'template-parts/post/content', 'default' ); ?>
          </div>
          <?php $c->counter++;?>
        <?php endif; ?>
        <?php $i++; ?>
      <?php endif; endwhile; ?>
    </div>    
  <?php endif; ?>
</div>
<?php get_footer(); ?>