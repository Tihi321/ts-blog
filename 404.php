<?php
/**
 * 404 error page
 *
 * @package TS_Blog
 *
 * @since 1.0.0
 */

$page_class_name = 'page-not-found';

get_header();

$hero_template = locate_template( 'src/blocks/layout/hero/404.php' );

if ( ! empty( $hero_template ) ) {
  include $hero_template;
}

?>
<div class="<?php echo esc_attr( $page_class_name ); ?>">
  <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <div class="<?php echo esc_attr( "{$page_class_name}__text" ); ?>">
      <?php esc_html_e( '404 - page not found', 'ts-blog' ); ?>
    </div>
  </div>
</div>
<?php

get_footer();
