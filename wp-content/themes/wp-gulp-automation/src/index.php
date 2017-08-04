<?php get_header(); ?>
  <?php include(include_once('inc/settings.php')); ?>
  <div id="home" class="container sections">
    <!-- FEATURED POST -->
    <div class="row featured">
      <?php 
      if( get_field('featured_post', 'option') ) : 
        $featuredPost = get_field('featured_post', 'option');
      else:
        $id = wp_get_recent_posts( array( 'numberposts' => 1 ) )[0]['ID'];
        $featuredPost = get_post( $id );
      endif; ?>
      <div class="col-sm-3 col-md-4 text">
        <?php $mainCat = cccpa_get_main_category( $featuredPost->ID ); ?>
        <div class="post-meta">
          <h2 class="category large"><?php echo get_category( $mainCat )->name; ?></h2>
          <span class="state"><?php cccpa_get_state( $featuredPost->ID ); ?></span>
        </div>
        <h1><a href="<?php echo get_permalink( $featuredPost->ID ); ?>" title="<?php echo $featuredPost->post_title; ?>"><?php echo $featuredPost->post_title; ?></a></h1>
        <p><?php echo get_the_excerpt( $featuredPost->ID ); ?></p>
        <a href="<?php echo get_permalink( $featuredPost->ID ); ?>" role="button" class="btn btn-primary">Read More</a>
      </div>
      <div class="col-sm-8 col-md-7 pull-right image">
        <a href="<?php echo get_permalink( $featuredPost->ID ); ?>" title="<?php echo $featuredPost->post_title; ?>"><img src="<?php echo get_the_post_thumbnail_url( $featuredPost->ID ); ?>" alt="<?php echo $featuredPost->post_title; ?>"></a>
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
      ?>

      <?php foreach( $threePosts as $threePost ) : ?>
        <?php $mainCat = cccpa_get_main_category( $threePost['ID']); ?>
        <?php cccpa_get_main_category( $threePost['ID'] ); ?>
        <div class="col-sm-4">
          <a href="<?php echo get_permalink( $threePost['ID'] ); ?>" title="<?php echo $threePost['post_title']; ?>">
            <img src="<?php echo get_the_post_thumbnail_url( $threePost['ID'] ) ?>" alt="<?php echo $threePost['post_title']; ?>">
            <div class="post-meta">
              <h2 class="category"><?php echo get_category( $mainCat )->name; ?></h2>
              <span class="state"><?php cccpa_get_state( $threePost['ID'] ); ?></span>
            </div>
            <h1 class="small"><?php echo $threePost['post_title']; ?></h1>
          </a>
        </div>
        <?php $excludePostsIDs .= ', ' . $threePost['ID']; ?>
      <?php endforeach; ?>
    </div>

    <!-- TWO POSTS -->
    <div class="row">
      <?php 
        $twoPosts = wp_get_recent_posts( array(
          'numberposts' => 2,
          'exclude' => $excludePostsIDs
        )); 
      ?>

      <?php foreach( $twoPosts as $twoPost ) : ?>
        <?php cccpa_get_main_category( $twoPost['ID'] ); ?>
        <div class="col-sm-6">
          <a href="<?php echo get_permalink( $twoPost['ID'] ); ?>" title="<?php echo $twoPost['post_title']; ?>">
            <img src="<?php echo get_the_post_thumbnail_url( $twoPost['ID'] ) ?>" alt="<?php echo $twoPost['post_title']; ?>">
             <div class="post-meta">
              <h2 class="category"><?php echo get_category( $mainCat )->name; ?></h2>
              <span class="state"><?php cccpa_get_state( $twoPost['ID'] ); ?></span>
            </div>
            <h1 class="medium"><?php echo $twoPost['post_title']; ?></h1>
          </a>
        </div>
        <?php $excludePostsIDs .= ', ' . $twoPost['ID']; ?>
      <?php endforeach; ?>
    </div>

    <!-- CATEGORY POSTS -->
    <div class="row cat-posts-row">

      <!-- Finances -->
      <div class="col-sm-6 col-md-4">
        <div class="row header">
          <div class="col-sm-12">
            <h2>Money</h2>
            <hr/>
          </div>
        </div>

        <?php 
          $i = 0;
          $posts = wp_get_recent_posts( array(
            'numberposts' => 4,
            'category' => $money_cat_id, 
            'exclude' => $excludePostsIDs
          )); 
        ?>

        <?php foreach( $posts as $post ) : ?> 
          <?php $i++; ?>
          <?php if( $i == 1 ) : ?>
            <a href="<?php echo get_permalink( $post['ID'] ); ?>" title="<?php echo $post['post_title']; ?>">
              <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
              <h3><?php echo $post['post_title']; ?></h3>
              <div class="post-meta">
                <span class="state"><?php cccpa_get_state( $post['ID'] ); ?></span>
              </div>
            </a>
            <hr>
          <?php else : ?>
            <div class="row article">
              <a href="<?php echo get_permalink( $post['ID'] ); ?>" title="<?php echo $post['post_title']; ?>">
                <div class="col-sm-4">
                  <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
                </div>
                <div class="col-sm-8">
                  <h4><?php echo $post['post_title']; ?></h4>
                  <div class="post-meta">
                    <span class="state"><?php cccpa_get_state( $post['ID'] ); ?></span>
                  </div>
                </div>
              </a>
            </div>
            <hr>
          <?php endif; ?>
        <?php endforeach; ?>
      </div><!-- close finance col -->

      <!-- Compliance -->
      <div class="col-sm-6 col-md-4">
        <div class="row header">
          <div class="col-sm-12">
            <h2>Tax & Licenses</h2>
            <hr/>
          </div>
        </div>

        <?php 
          $i = 0;
          $posts = wp_get_recent_posts( array(
            'numberposts' => 4,
            'category' => $tax_and_licenses_cat_id, 
            'exclude' => $excludePostsIDs
          )); 
        ?>

        <?php foreach( $posts as $post ) : ?> 
          <?php $i++; ?>
          <?php if( $i == 1 ) : ?>
            <a href="<?php echo get_permalink( $post['ID'] ); ?>" title="<?php echo $post['post_title']; ?>">
              <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
              <h3><?php echo $post['post_title']; ?></h3>
              <div class="post-meta">
                <span class="state"><?php cccpa_get_state( $post['ID'] ); ?></span>
              </div>
            </a>
            <hr>
          <?php else : ?>
            <div class="row article">
              <a href="<?php echo get_permalink( $post['ID'] ); ?>" title="<?php echo $post['post_title']; ?>">
                <div class="col-sm-4">
                  <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
                </div>
                <div class="col-sm-8">
                  <h4><?php echo $post['post_title']; ?></h4>
                  <div class="post-meta">
                    <span class="state"><?php cccpa_get_state( $post['ID'] ); ?></span>
                  </div>
                </div>
              </a>
            </div>
            <hr>
          <?php endif; ?>
        <?php endforeach; ?>
      </div><!-- close compliance col -->

      <!-- Business -->
      <div class="col-sm-6 col-md-4">
        <div class="row header">
          <div class="col-sm-12">
            <h2>Business</h2>
            <hr/>
          </div>
        </div>

        <?php 
          $i = 0;
          $posts = wp_get_recent_posts( array(
            'numberposts' => 4,
            'category' => $business_cat_id,
            'exclude' => $excludePostsIDs
          )); 
        ?>

        <?php foreach( $posts as $post ) : ?> 
          <?php $i++; ?>
          <?php if( $i == 1 ) : ?>
            <a href="<?php echo get_permalink( $post['ID'] ); ?>" title="<?php echo $post['post_title']; ?>">
              <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
              <h3><?php echo $post['post_title']; ?></h3>
              <div class="post-meta">
                <span class="state"><?php cccpa_get_state( $post['ID'] ); ?></span>
              </div>
            </a>
            <hr>
          <?php else : ?>
            <div class="row article">
              <a href="<?php echo get_permalink( $post['ID'] ); ?>" title="<?php echo $post['post_title']; ?>">
                <div class="col-sm-4">
                  <img src="<?php echo get_the_post_thumbnail_url( $post['ID'] ) ?>">
                </div>
                <div class="col-sm-8">
                  <h4><?php echo $post['post_title']; ?></h4>
                  <div class="post-meta">
                    <span class="state"><?php cccpa_get_state( $post['ID'] ); ?></span>
                  </div>
                </div>
              </a>
            </div>
            <hr>
          <?php endif; ?>
        <?php endforeach; ?>
      </div><!-- close compliance col -->

    </div><!-- close cat-posts-row --> 

    <div class="row map">
      <div class="col-md-8">
        <div id="map"></div>
      </div>
      <div class="col-md-4 dropdown">
          <div class="post-meta">
            <h2 class="category large">Cannabis By State</h2>
          </div>
          <h1>Search articles by state</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim sapien, placerat eget imperdiet a, imperdiet ac nisi. </p>
          <?php $categories = get_terms( 'category', array('parent' => $states_cat_id, 'childless' => true) ); ?>
          <?php 
          /*$arr = ''; 
          foreach( $categories as $cat ) : 
             $arr .= "'" . $cat->name . "': '" . $cat->slug . "', "; 
          endforeach; 
          echo $arr; */?>
          <select class="cannabis-states">
            <?php foreach( $categories as $cat ) : ?>
              <option value="<?php echo get_category_link( $cat->term_id ) ?>"><?php echo $cat->name; ?></option>
            <?php endforeach; ?>
          </select>
      </div>
    </div>
  </div>
<?php get_footer(); ?>