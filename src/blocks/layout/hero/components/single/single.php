<?php
/**
 * Hero single
 *
 * @package TS_Blog\Views\Hero\Parts
 *
 * @since 1.0.0
 */

use TS_Blog\Plugins\Acf\Page_Options;

$image = apply_filters( 'tsb_get_post_image', 'hero' );

$quote = get_field( Page_Options::QUOTE_KEY, get_the_ID() );

$class_name = 'hero';

?>
<div class="<?php echo esc_attr( "{$class_name}__background" ); ?>">
  <div class="<?php echo esc_attr( "{$class_name}__image" ); ?>" style="background-image: url(<?php echo esc_attr( $image['url'] ); ?>);"></div>
</div>
<div class="<?php echo esc_attr( "{$class_name}__description js-{$class_name}-description" ); ?>">
  <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <div class="<?php echo esc_attr( "{$class_name}__content" ); ?>">
      <?php echo wp_kses_post( $quote ); ?>
    </div>
  </div>
</div>
