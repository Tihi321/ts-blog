<?php
/**
 * Hero listing
 *
 * @package TS_Blog\Views\Hero\Parts
 *
 * @since 1.0.0
 */

use TS_Blog\Plugins\Acf\Theme_Options;

$listing_image       = get_field( Theme_Options::LISTING_IMAGE, 'option' );
$listing_description = get_field( Theme_Options::LISTING_DESCRIPTION, 'option' );

$listing_image_url = $listing_image['url'] ?? '';

$class_name = 'hero';

?>
<div class="<?php echo esc_attr( "{$class_name}__background" ); ?>">
  <div class="<?php echo esc_attr( "{$class_name}__image" ); ?>" style="background-image: url(<?php echo esc_attr( $listing_image_url ); ?>);"></div>
</div>
<?php if ( $listing_description ) { ?>
    <div class="<?php echo esc_attr( "{$class_name}__description js-{$class_name}-description" ); ?>">
      <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
        <div class="<?php echo esc_attr( "{$class_name}__content" ); ?>">
        <?php echo wp_kses_post( $listing_description ); ?>
        </div>
      </div>
    </div>
<?php } ?>
