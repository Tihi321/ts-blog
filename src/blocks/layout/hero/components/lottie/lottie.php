<?php
/**
 * Hero single
 *
 * @package TS_Blog\Views\Hero\Parts
 *
 * @since 1.0.0
 */

$animation_file_url = $hero_file['url'] ?? '';

$lottie_class_name = $lottie_class_name ?? 'hero__lottie';

?>
<div class="<?php echo esc_attr( "{$lottie_class_name}-outer" ); ?>">
  <div class="<?php echo esc_attr( "{$lottie_class_name}-inner js-hero-lottie" ); ?>" data-src="<?php echo esc_attr( $animation_file_url ); ?>"></div>
</div>
