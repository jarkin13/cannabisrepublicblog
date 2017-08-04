<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />  
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php bloginfo('name'); ?><?php if(is_front_page()) { echo ''; } else { echo ' | '; wp_title(''); } ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
  <script src="https://use.fontawesome.com/bbf9204074.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Old+Standard+TT:400,700" rel="stylesheet">
  <?php wp_head(); ?>
  <?php if( is_single() ) : ?>
    <meta property="og:url"           content="<?php echo get_permalink( $post->ID ); ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php bloginfo( 'name' ); ?>" />
    <meta property="og:description"   content="<?php echo get_the_excerpt( $post->ID); ?>" />
    <meta property="og:image"         content="<?php echo get_the_post_thumbnail_url( $post->ID ) ?>" />
  <?php endif; ?>
</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="0">            
  <div id="page" class="hfeed site">
  <header>
    <nav class="navbar">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="California Cannabis CPA"></a>
        <div id="navbar">
          <?php wp_nav_menu( array('menu' => 'header', 'container_class' => 'collapse navbar-collapse', 'menu_class' => 'nav navbar-nav navbar-right') ); ?>
        </div>
      </div>

    </nav>
  </header>