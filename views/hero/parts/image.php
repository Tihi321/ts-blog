<?php
/**
 * Hero single
 *
 * @package TS_Blog\Views\Hero\Parts
 *
 * @since 1.0.0
 */

$image_hero_url = $hero_file['url'] ?? '';

$image_class_name = 'hero';

?>
<div class="<?php echo esc_attr( "{$image_class_name}__background" ); ?>">
  <div class="<?php echo esc_attr( "{$image_class_name}__image" ); ?>" style="background-image: url(<?php echo esc_attr( $image_hero_url ); ?>);"></div>
</div>
