<?php
/**
 * Template for the Link Component.
 *
 * @since 1.0.0
 * @package TS_Blog\Blocks.
 */

namespace TS_Blog\Blocks;

$title     = $attributes['title'] ?? '';
$url       = $attributes['url'] ?? '';
$icon      = isset( $attributes['icon'] ) ? $attributes['icon'] : '';
$is_anchor = $attributes['isAnchor'] ?? false;

$component_class = 'link';
$block_class     = $attributes['blockClass'] ?? '';
$style_color     = isset( $attributes['styleColor'] ) ? "{$component_class}__color--{$attributes['styleColor']}" : '';
$style_align     = isset( $attributes['styleAlign'] ) ? "{$component_class}__align--{$attributes['styleAlign']}" : '';
$is_anchor       = ( $is_anchor === true ) ? 'js-scroll-to-anchor' : '';

$link_class = "
  {$component_class}
  {$style_color}
  {$style_align}
  {$is_anchor}
  {$block_class}__link
";

$icon_class = "{$component_class}__icon";
?>

<a
  href="<?php echo esc_url( $url ); ?>"
  class="<?php echo esc_attr( $link_class ); ?>"
  title="<?php echo esc_attr( $title ); ?>"
>
  <?php echo esc_html( $title ); ?>

  <?php if ( ! empty( $icon ) && $icon === 'arrow-right' ) { ?>
    <div class="<?php echo esc_attr( $icon_class ); ?>"></div>
  <?php } ?>
</a>
