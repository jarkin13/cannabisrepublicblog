<?php get_header(); ?>
<?php
  $catname = wp_title('', false);
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $query_args = array(
    'post_type' => 'post',
    'category_name' => $catname,
    'paged' => $paged,
    'page' => $paged
  );
?>
<div id="category" class="container">
  <h1><?php single_cat_title(); ?></h1>
  <hr class="black thick">
  
    <div class="row top">

      <?php 
      $exclude = []; $i = 0;
      $query_args['posts_per_page'] = 1;
      $the_query = new WP_Query( $query_args );
      ?>

      <?php if ( $the_query->have_posts() ) : ?>

        <div class="col-sm-6 md-heading">
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php get_template_part( 'template-parts/post/content', 'default' ); ?>
            <?php $exclude[$i] = $post->ID; ?>
            <?php $i++; ?>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

      <?php endif; ?>

      <?php 
      $query_args['posts_per_page'] = 2;
      $query_args['post__not_in'] = $exclude;
      $the_query = new WP_Query( $query_args );
      ?>

      <?php if ( $the_query->have_posts() ) : ?>

        <div class="col-sm-6 sm-heading content-right">
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php get_template_part( 'template-parts/post/content', 'left' ); ?>
            <?php $exclude[$i] = $post->ID; ?>
            <?php $i++; ?>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

      <?php endif; ?>

    </div>
    <div class="row top">

      <?php 
      $query_args['posts_per_page'] = 3;
      $query_args['post__not_in'] = $exclude;
      $the_query = new WP_Query( $query_args );
      ?>

      <?php if ( $the_query->have_posts() ) : ?>

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="col-sm-4 sm-heading">
            <?php get_template_part( 'template-parts/post/content', 'default' ); ?>
          </div>
        <?php endwhile; ?>

        <?php if ( $the_query->max_num_pages > 1 ) { // check if the max number of pages is greater than 1  ?>
          <nav class="prev-next-posts">
            <div class="prev-posts-link">
              <?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>
            </div>
            <div class="next-posts-link">
              <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
            </div>
          </nav>
        <?php } ?>

        <?php wp_reset_postdata(); ?>

      <?php endif; ?>

    </div>

</div>
<?php get_footer(); ?>