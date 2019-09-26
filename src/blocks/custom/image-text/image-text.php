<?php
/**
 * Template for the Image Text block.
 *
 * @since 1.0.0
 * @package TS_Blog\Blocks.
 */

namespace TS_Blog\Blocks;

$block_class    = $attributes['blockClass'] ?? '';
$block_js_class = $attributes['blockJsClass'] ?? '';

$media_type     = $attributes['mediaType'] ?? '';
$media_url      = $attributes['mediaUrl'] ?? '';
$heading        = $attributes['heading'] ?? '';
$paragraph      = $attributes['paragraph'] ?? '';
$image_position = $attributes['imagePosition'] ?? '';

$component_class  = "
  {$block_class}
  {$block_class}__media-position--{$image_position}
  {$block_js_class}
";
$media_wrap_class = "{$block_class}__media-wrap";
$img_class        = "{$block_class}__img";
$lottie_class     = "
  {$block_class}__lottie
  {$block_js_class}-lottie
";
$wrap_class       = "{$block_class}__wrap";
$heading_class    = "{$block_class}__heading";
$content_class    = "{$block_class}__paragraph";

?>

<div class="<?php echo esc_attr( $component_class ); ?>">

  <div class="<?php echo esc_attr( $media_wrap_class ); ?>">

    <?php if ( $media_type === 'lottie' ) { ?>
      <div class="<?php echo esc_attr( $lottie_class ); ?>" data-animation="<?php echo esc_url( $media_url ); ?>"></div>
    <?php } ?>

    <?php
    if ( $media_type === 'image' ) {
        $media = \wp_get_attachment_image(
          $attributes['mediaId'] ?? null,
          $attributes['mediaSize'] ?? 'large',
          '',
          [ 'class' => $img_class ]
        );
      ?>
      <img class="<?php echo esc_attr( $img_class ); ?>" src="<?php echo esc_url( $media ); ?>" />
    <?php } ?>
  </div>

  <div class="<?php echo esc_attr( $wrap_class ); ?>">

    <?php if ( ! empty( $heading ) ) { ?>
      <div class="<?php echo esc_attr( $heading_class ); ?>">
        <?php echo wp_kses_post( $heading ); ?>
      </div>
    <?php } ?>

    <?php if ( ! empty( $paragraph ) ) { ?>
      <div class="<?php echo esc_attr( $content_class ); ?>">
        <?php echo wp_kses_post( $paragraph ); ?>
      </div>
    <?php } ?>

  </div>
</div>


