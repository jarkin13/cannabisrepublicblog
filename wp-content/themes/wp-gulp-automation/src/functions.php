<?php // ==== FUNCTIONS ==== //

// Load the configuration file for this installation; all options are set here
if ( is_readable( trailingslashit( get_stylesheet_directory() ) . 'functions-config.php' ) )
  require_once( trailingslashit( get_stylesheet_directory() ) . 'functions-config.php' );

// Load configuration defaults for this theme; anything not set in the custom configuration (above) will be set here
require_once( trailingslashit( get_stylesheet_directory() ) . 'functions-config-defaults.php' );

// An example of how to manage loading front-end assets (scripts, styles, and fonts)
require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/assets.php' );

// Required to demonstrate WP AJAX Page Loader (as WordPress doesn't ship with even simple post navigation functions)
require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/navigation.php' );

// Only the bare minimum to get the theme up and running
function voidx_setup() {

  add_theme_support( 'post-thumbnails' ); 

  // HTML5 support; mainly here to get rid of some nasty default styling that WordPress used to inject
  add_theme_support( 'html5', array( 'search-form', 'gallery' ) );

  // Automatic feed links
  add_theme_support( 'automatic-feed-links' );

  // $content_width limits the size of the largest image size available via the media uploader
  // It should be set once and left alone apart from that; don't do anything fancy with it; it is part of WordPress core
  global $content_width;
  $content_width = 960;

  // Register header and footer menus
  register_nav_menu( 'header', __( 'Header menu', 'voidx' ) );
  register_nav_menu( 'footer', __( 'Footer menu', 'voidx' ) );

  add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'voidx_setup', 11 );

// Sidebar declaration
function voidx_widgets_init() {
  if ( function_exists('register_sidebar') ) {
    register_sidebar( array(
      'name'          => __( 'Main sidebar', 'voidx' ),
      'id'            => 'sidebar-main',
      'description'   => __( 'Appears to the right side of most posts.', 'voidx' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ) );

    register_sidebar( array(
      'name'          => __( 'Share sidebar', 'voidx' ),
      'id'            => 'sidebar-share',
      'description'   => __( 'Appears to the left side of most posts.', 'voidx' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ) );
  }
}
add_action( 'widgets_init', 'voidx_widgets_init' );


if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

}

function wpb_set_post_views( $postID ) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views( $post_id ) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views( $postID ){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if( $count=='' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return "0 View";
    }
    return $count.' Views';
}

function the_titlesmall($before = '', $after = '', $echo = true, $length = false) { 
    $title = get_the_title();
    if( strlen($title) <= $length )
         $after = '';
    if ( $length && is_numeric($length) ) {
        $title = substr( $title, 0, $length );
    }

    if ( strlen($title)> 0 ) {
        $title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
        if ( $echo )
            echo $title;
        else
            return $title;
    }
}

function cccpa_get_main_category( $post_id ) {
  $arr = array( 'parent' => 0, 'childless' => true );
  
  return wp_get_post_categories( $post_id , $arr )[0];
}

function cccpa_get_state( $post_id ) {
  $arr = array( 
    'parent' => 6, 
    'number' => 1
  );
  $state = wp_get_post_categories( $post_id , $arr )[0];
  echo get_category( $state )->name;
}