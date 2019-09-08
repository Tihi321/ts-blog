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

?>
<div class="background-class">
  <div class="image-element" style="background-image: url(<?php echo esc_attr( $listing_image_url ); ?>);"></div>
</div>
<?php if ( $listing_description ) { ?>
    <div class="hero-description js-hero-description">
      <div class="container">
        <?php echo wp_kses_post( $listing_description ); ?>
      </div>
    </div>
<?php } ?>
