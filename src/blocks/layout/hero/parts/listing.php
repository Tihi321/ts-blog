<?php
/**
 * Hero listing
 *
 * @package TS_Blog\Layout\Hero\Parts
 *
 * @since 1.0.0
 */

use TS_Blog\Plugins\Acf\Theme_Options;

$listing_type = get_field( Theme_Options::LISTING_HERO_TYPE, 'option' );
$hero_file    = ( $listing_type === 'lottie' ) ? get_field( Theme_Options::LISTING_LOTTIE, 'option' ) : get_field( Theme_Options::LISTING_IMAGE, 'option' );
$listing_tips = apply_filters( 'tsb_get_random_field', Theme_Options::LISTING_TIPS );


$class_name = 'hero';

$lottie_class_name = 'hero__listing-lottie';

?>
  <?php
  $hero_temaplate = ( $listing_type === 'lottie' ) ? locate_template( 'src/blocks/layout/hero/parts/lottie.php' ) : locate_template( 'src/blocks/layout/hero/parts/image.php' );

  if ( ! empty( $hero_temaplate ) ) {
    include $hero_temaplate;
  }
  ?>
<?php if ( $listing_tips ) { ?>
    <div class="<?php echo esc_attr( "{$class_name}__description js-{$class_name}-description" ); ?>">
      <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
        <div class="<?php echo esc_attr( "{$class_name}__content" ); ?>">
        <?php echo wp_kses_post( $listing_tips ); ?>
        </div>
      </div>
    </div>
<?php } ?>
