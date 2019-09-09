<?php
/**
 * Display footer content
 *
 * @package TS_Blog\Views\Footer
 *
 * @since 1.0.0
 */

?>

<footer class="footer">
  <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <span><?php echo esc_html( date( 'Y' ) ); ?> Tihomir Selak</span>
  </div>
</footer>
