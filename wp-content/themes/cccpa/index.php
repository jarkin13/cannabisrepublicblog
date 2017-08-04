<?php get_header(); ?>
<div class="container">
  <?php if( is_category() ) : ?>
    <h1><?php single_cat_title(); ?></h1>
    <hr>
  <?php endif; ?>
  <?php  if ( have_posts() ) : ?>
    <div class="row">
    <?php $i['total'] = 0; ?>

    <div class="col-sm-7">
    <?php while ( have_posts() ) : the_post(); if( $i['total'] < 1 ) : ?>
      <?php get_template_part( 'template-parts/post/content', 'post' ); ?>
      <?php $i['total']++; ?>
    <?php endif; endwhile; ?>
    </div>

    <div class="col-sm-5">
    <?php while ( have_posts() ) : the_post(); if( $i['total'] < 3 ) : ?>
      <?php echo get_the_title(); ?><br>
      <?php $i['total']++; ?>
    <?php endif; endwhile; ?>
    </div>
  <?php endif; ?>
</div>
<?php get_footer(); ?>