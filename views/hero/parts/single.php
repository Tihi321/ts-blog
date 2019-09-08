<?php
/**
 * Hero single
 *
 * @package TS_Blog\Views\Hero\Parts
 *
 * @since 1.0.0
 */

use TS_Blog\Plugins\Acf\Theme_Options;

$listing_image = get_field( Theme_Options::LISTING_IMAGE, 'option' );

$listing_image_url = $listing_image['url'] ?? '';

?>
<div class="background-class">
  <div class="image-element" style="background-image: url(<?php echo esc_attr( $listing_image_url ); ?>);"></div>
</div>
<div class="hero-description js-hero-description">
  <div class="container">
    <?php the_title(); ?>
  </div>
</div>
