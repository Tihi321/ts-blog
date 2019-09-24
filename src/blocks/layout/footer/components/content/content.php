<?php
/**
 * Display footer content
 *
 * @package TS_Blog\Views\Footer
 *
 * @since 1.0.0
 */

$class_name = 'footer';

?>

<footer class="<?php echo esc_attr( $class_name ); ?>">
  <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <div class="<?php echo esc_attr( "{$class_name}__content" ); ?>">
      <div class="<?php echo esc_attr( "{$class_name}__copyright" ); ?>">
        <span>@<?php echo esc_html( date( 'Y' ) ); ?> Tihomir Selak</span>
      </div>
      <?php apply_filters( 'tsb_bem_menu', 'footer_nav', 'footer-nav' ); ?>
    </div>
  </div>
</footer>
