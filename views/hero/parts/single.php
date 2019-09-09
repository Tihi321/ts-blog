<?php
/**
 * Hero single
 *
 * @package TS_Blog\Views\Hero\Parts
 *
 * @since 1.0.0
 */

use TS_Blog\Plugins\Acf\Theme_Options;

$listing_image     = get_field( Theme_Options::LISTING_IMAGE, 'option' );
$listing_image_url = $listing_image['url'] ?? '';

$class_name = 'hero';

?>
<div class="<?php echo esc_attr( "{$class_name}__background" ); ?>">
  <div class="<?php echo esc_attr( "{$class_name}__image" ); ?>" style="background-image: url(<?php echo esc_attr( $listing_image_url ); ?>);"></div>
</div>
<div class="<?php echo esc_attr( "{$class_name}__description js-{$class_name}-description" ); ?>">
  <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <?php the_title(); ?>
  </div>
</div>
