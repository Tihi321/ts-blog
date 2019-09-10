<?php
/**
 * 404 error page
 *
 * @package TS_Blog
 *
 * @since 1.0.0
 */

$class_name = 'page-not-found';

get_header();

$hero_template = locate_template( 'views/hero/404.php' );

if ( ! empty( $hero_template ) ) {
  include $hero_template;
}

?>
<div class="<?php echo esc_attr( $class_name ); ?>">
  <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <div class="<?php echo esc_attr( "{$class_name}__text" ); ?>">
      <?php esc_html_e( 'ERROR 404', 'ts-blog' ); ?>
    </div>
  </div>
</div>
<?php

get_footer();
