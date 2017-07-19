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
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="0">
<?php echo wp_title(); ?>
  <div id="page" class="hfeed site">
    <header>
      <div class="navbar-wrapper">
        <div class="container">
          <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#ourStory">Our Story</a></li>
                  <li><a href="#details">Details</a></li>
                  <li><a href="#accomodations">Accomodations</a></li>
                  <li><a href="#sights">Sights</a></li>
                  <li><a href="#registry">Registry</a></li>
                  <li><a href="#weddingParty">Wedding Party</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <section id="home" class="intro-section vertical-center">
        <div class="section-text">
          <img src="<?php echo get_template_directory_uri(); ?>/images/header-text.jpg">
        </div>
      </section>
    </header>
