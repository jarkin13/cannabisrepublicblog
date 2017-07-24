<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form class="form-inline" role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="form-group">
    <input type="search" id="<?php echo $unique_id; ?>" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search California Cannabis CPA', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  </div>
  <button type="submit" class="search-submit pull-right"><i class="fa fa-search" aria-hidden="true"></i></span></button>
</form>
