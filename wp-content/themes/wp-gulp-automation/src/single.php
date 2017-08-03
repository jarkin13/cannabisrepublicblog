<!-- POSTS -->
<?php get_header(); ?>
<div id="single" class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php wpb_set_post_views($post->ID); ?>
    <div class="row">
      <div class="col-xs-2 col-sm-2">
        <h2>Share</h2>
      </div>
      <div class="col-xs-12 col-sm-10 col-md-6">
        <?php if( get_field('state') ) {
          $field = get_field_object('state');
          $value = $field['value'];
          $state = ' in ' . $field['choices'][ $value ];
        }; ?>
        <ul class="post-meta">
          <li><span class="category"><?php echo get_the_category( $post->ID )[0]->name;?></span> <?php echo $state; ?></li>
          <li><?php the_date(); ?></li>
        </ul>
        <h1><?php echo get_the_title(); ?></h1>
        <img src="<?php echo get_the_post_thumbnail_url( $post->ID ) ?>" alt="<?php echo get_the_title(); ?>">
        <div class="row">
          <div class="col-sm-12">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-4 pull-right">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-sm-12">
        <?php get_template_part( 'template-parts/post/content', 'footer' ); ?>
      </div>
    </div>
  <?php endwhile; // End of the loop. ?>
</div>
<?php get_footer(); ?>