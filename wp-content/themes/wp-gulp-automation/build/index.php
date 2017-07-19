<?php get_header(); ?>
  <div class="container sections">

    <!-- FEATURED POST -->
    <div class="row featured">
      <?php 
      if( get_field('featured_post', 'option') ) : 
        $featuredPost = get_field('featured_post', 'option');
      else:
        $id = wp_get_recent_posts( array( 'numberposts' => 1 ) )[0]['ID'];
        $featuredPost = get_post( $id );
      endif; ?>
      <div class="col-md-4 text">
        <h2 class="category large"><?php echo get_the_category( $featuredPost->ID )[0]->name; ?></h2>
        <h1><a href="<?php echo $featuredPost->guid ?>" title="<?php echo $featuredPost->post_title; ?>"><?php echo $featuredPost->post_title; ?></a></h1>
        <p><?php echo get_the_excerpt( $featuredPost->ID ); ?></p>
        <a href="<?php echo $featuredPost->guid ?>" role="button" class="btn btn-primary">Read More</a>
      </div>
      <div class="col-md-7 pull-right image">
        <a href="<?php echo $featuredPost->guid ?>" title="<?php echo $featuredPost->post_title; ?>"><img src="<?php echo get_the_post_thumbnail_url( $featuredPost->ID ) ?>" alt="<?php echo $featuredPost->post_title; ?>"></a>
      </div>
    </div>

    <!-- 3 POSTS -->
    <div class="row">
      <?php 
      $excludePostsIDs = $featuredPost->ID;
      $threePosts = wp_get_recent_posts( array(
        'numberposts' => 3,
        'exclude' => $featuredPost->ID
      )); 

      foreach( $threePosts as $threePost ) : ?>
        <div class="col-sm-4">
          <a href="<?php echo $threePost['guid']; ?>" title="<?php echo $threePost['post_title']; ?>">
            <img src="<?php echo get_the_post_thumbnail_url( $threePost['ID'] ) ?>" alt="<?php echo $threePost['post_title']; ?>">
            <h2 class="category"><?php echo get_the_category( $threePost['ID'] )[0]->name; ?></h2>
            <h1 class="small"><?php echo $threePost['post_title']; ?></h1>
          </a>
          <?php $excludePostsIDs .= ', ' . $threePost['ID']; ?>
        </div>
      <?php endforeach ?>
    </div>

    <!-- TWO POSTS -->
    <div class="row">
      <?php 
      $twoPosts = wp_get_recent_posts( array(
        'numberposts' => 2,
        'exclude' => $excludePostsIDs
      )); 

      foreach( $twoPosts as $twoPost ) : ?>
        <div class="col-sm-6">
          <a href="<?php echo $twoPosts['guid']; ?>" title="<?php echo $twoPost['post_title']; ?>">
            <img src="<?php echo get_the_post_thumbnail_url( $twoPost['ID'] ) ?>" alt="<?php echo $twoPost['post_title']; ?>">
            <h2 class="category medium"><?php echo get_the_category( $twoPost['ID'] )[0]->name; ?></h2>
            <h1 class="medium"><?php echo $twoPost['post_title']; ?></h1>
          </a>
          <?php $excludePostsIDs .= ', ' . $twoPost['ID']; ?>
        </div>
      <?php endforeach; ?>
    </div>


    <!-- CATEGORY POSTS -->
    <div class="row">

      <!-- Finances -->
      <div class="col-sm-6 col-md-4">
        <div class="row">
          <div class="col-sm-12">
            <h2>Finances</h2>
            <hr/>
          </div>
        </div>
        <?php 
        $i = 0;
        $posts = wp_get_recent_posts( array(
          'numberposts' => 4,
          'category' => 3, 
          'exclude' => $excludePostsIDs
        )); 

        foreach( $posts as $post ) : ?> 
          <?php $i++; ?>
          <?php if( $i == 1 ) : ?>
            <a href="<?php echo $post['guid']; ?>" title="<?php echo $post['post_title']; ?>">
              <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
              <h3><?php echo $post['post_title']; ?></h3>
            </a>
          <?php else : ?>
            <div class="row">
              <a href="<?php echo $post['guid']; ?>" title="<?php echo $post['post_title']; ?>">
                <div class="col-sm-4">
                  <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
                </div>
                <div class="col-sm-8">
                  <h4><?php echo $post['post_title']; ?></h4>
                </div>
              </a>
            </div><br>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <!-- COMPLIANCE -->
      <div class="col-sm-6 col-md-4">
        <div class="row">
          <div class="col-sm-12">
            <h2>Compliance</h2>
            <hr/>
          </div>
        </div>
        <?php 
        $i = 0;
        $posts = wp_get_recent_posts( array(
          'numberposts' => 4,
          'category' => 4, 
          'exclude' => $excludePostsIDs
        )); 

        foreach( $posts as $post ) : ?> 
          <?php $i++; ?>
          <?php if( $i == 1 ) : ?>
            <a href="<?php echo $post['guid']; ?>" title="<?php echo $post['post_title']; ?>">
              <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
              <h3><?php echo $post['post_title']; ?></h3>
            </a>
          <?php else : ?>
            <div class="row">
              <a href="<?php echo $post['guid']; ?>" title="<?php echo $post['post_title']; ?>">
                <div class="col-sm-4">
                  <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
                </div>
                <div class="col-sm-8">
                  <h4><?php echo $post['post_title']; ?></h4>
                </div>
              </a>
            </div><br>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <!-- BUSINESS -->
      <div class="col-sm-6 col-md-4">
        <div class="row">
          <div class="col-sm-12">
            <h2>Business</h2>
            <hr/>
          </div>
        </div>
        <?php 
        $i = 0;
        $posts = wp_get_recent_posts( array(
          'numberposts' => 4,
          'category' => 5, 
          'exclude' => $excludePostsIDs
        )); 

        foreach( $posts as $post ) : ?> 
          <?php $i++; ?>
          <?php if( $i == 1 ) : ?>
            <a href="<?php echo $post['guid']; ?>" title="<?php echo $post['post_title']; ?>">
              <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
              <h3><?php echo $post['post_title']; ?></h3>
            </a>
          <?php else : ?>
            <div class="row">
              <a href="<?php echo $post['guid']; ?>" title="<?php echo $post['post_title']; ?>">
                <div class="col-sm-4">
                  <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
                </div>
                <div class="col-sm-8">
                  <h4><?php echo $post['post_title']; ?></h4>
                </div>
              </a>
            </div><br>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
<?php get_footer(); ?>