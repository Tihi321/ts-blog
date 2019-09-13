<?php
/**
 * Display consent no tracking message
 *
 * @package TS_Blog\Views\Tracking
 *
 * @since 1.0.0
 */

$class_name = 'consent';

use TS_Blog\Plugins\Acf\Theme_Options;

$accent_color = get_field( Theme_Options::BLOG_ACCENT_COLOR_FILED, 'option' );
$consent_msg  = get_field( Theme_Options::CONSENT_MESSAGE, 'option' );

?>

<div class="<?php echo esc_attr( "{$class_name} js-{$class_name}" ); ?>" style="background-color:<?php echo esc_attr( $accent_color ); ?>;">
  <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <div class="<?php echo esc_attr( "{$class_name}__content" ); ?>">
    <div class="<?php echo esc_attr( "{$class_name}__message" ); ?>"><?php echo esc_html( $consent_msg ); ?></div>
    <button class="<?php echo esc_attr( "{$class_name}__btn js-{$class_name}-btn" ); ?>" style="color:<?php echo esc_attr( $accent_color ); ?>;"><?php echo esc_html__( 'Ok', 'ts-blog' ); ?></button>
    </div>
  </div>
</div>
