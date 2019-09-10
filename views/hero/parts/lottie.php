<?php
/**
 * Hero single
 *
 * @package TS_Blog\Views\Hero\Parts
 *
 * @since 1.0.0
 */

use TS_Blog\Plugins\Acf\Theme_Options;

$animation_file     = get_field( Theme_Options::PAGE_NOT_FOUND_ANIMATION, 'option' );
$animation_file_url = $animation_file['url'] ?? '';

$lottie_class_name = 'hero__lottie';

?>
<div class="<?php echo esc_attr( "{$lottie_class_name}-outer" ); ?>">
  <div class="<?php echo esc_attr( "{$lottie_class_name}-inner js-hero-lottie" ); ?>" data-src="<?php echo esc_attr( $animation_file_url ); ?>"></div>
</div>
