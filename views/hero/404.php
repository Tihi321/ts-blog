<?php
/**
 * View for hero component
 *
 * @package TS_Blog\Views\Hero
 *
 * @since 1.0.0
 */

 $class_name = 'hero';

?>
<header class="<?php echo esc_attr( "{$class_name}__outer" ); ?>">
  <div class="<?php echo esc_attr( "{$class_name}__inner" ); ?>">
  <?php
  $hero_lottie_template = locate_template( 'views/hero/parts/lottie.php' );

  if ( ! empty( $hero_lottie_template ) ) {
    include $hero_lottie_template;
  }
  ?>
  </div>
  <div class="<?php echo esc_attr( "{$class_name}__title-bar" ); ?>"></div>
</header>
