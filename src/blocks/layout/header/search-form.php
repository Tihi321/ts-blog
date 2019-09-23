<?php
/**
 * Header Serch form
 *
 * @package TS_Blog\Views\Header
 *
 * @since 1.0.0
 */

 $class_name = 'hero-search';

?>

<form role="search" method="get" class="<?php echo esc_attr( "{$class_name}__form" ); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
  <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="<?php echo esc_attr( "{$class_name}__input" ); ?>" placeholder="<?php esc_html_e( 'Type in search', 'ts-blog' ); ?>" />
  <input type="hidden" name="post_type" value="post" />
  <input type="submit" class="<?php echo esc_attr( "{$class_name}__submit" ); ?>" value="<?php esc_html_e( 'Search', 'ts-blog' ); ?>" />
</form>
