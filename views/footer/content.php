<?php
/**
 * Display footer content
 *
 * @package TS_Blog\Views\Footer
 *
 * @since 1.0.0
 */

$class_name  = 'footer';
$footer_menu = apply_filters( 'tsb_bem_menu', 'footer_nav', 'footer-nav' );

?>

<footer class="<?php echo esc_attr( $class_name ); ?>">
  <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <div class="<?php echo esc_attr( "{$class_name}__copyright" ); ?>">
      <span>@<?php echo esc_html( date( 'Y' ) ); ?> Tihomir Selak</span>
    </div>
    <div class="<?php echo esc_attr( "{$class_name}__menu" ); ?>">
    <?php
      echo esc_html( $footer_menu );
    ?>
    </div>
  </div>
</footer>
