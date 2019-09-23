<?php
/**
 * View for hero component
 *
 * @package TS_Blog\Layout\Hero
 *
 * @since 1.0.0
 */

use TS_Blog\Plugins\Acf\Theme_Options;

$class_name = 'hero';
$hero_file  = get_field( Theme_Options::PAGE_NOT_FOUND_ANIMATION, 'option' );

?>
<header class="<?php echo esc_attr( "{$class_name}__outer" ); ?>">
  <div class="<?php echo esc_attr( "{$class_name}__inner" ); ?>">
  <?php
  $hero_lottie_template = locate_template( 'src/blocks/layout/hero/parts/lottie.php' );

  if ( ! empty( $hero_lottie_template ) ) {
    include $hero_lottie_template;
  }
  ?>
  </div>
  <div class="<?php echo esc_attr( "{$class_name}__title-bar" ); ?>"></div>
</header>
