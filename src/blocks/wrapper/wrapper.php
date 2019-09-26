<?php
/**
 * Template for the Wrapping Advance block.
 *
 * @since 1.0.0
 * @package TS_Blog\Blocks.
 */

namespace TS_Blog\Blocks;

// Used to add or remove wrapper.
$has_wrapper = $attributes['hasWrapper'] ?? true;

if ( $has_wrapper ) {

  $id     = $attributes['id'] ?? '';
  $anchor = $attributes['anchor'] ?? '';

  $wrapper_main_class = 'wrapper';

  $style_background_color = isset( $attributes['styleBackgroundColor'] ) && ! empty( $attributes['styleBackgroundColor'] ) ? "{$wrapper_main_class}__bg-color--{$attributes['styleBackgroundColor']}" : '';

  // Desktop.
  $style_content_width     = isset( $attributes['styleContentWidth'] ) && ! empty( $attributes['styleContentWidth'] ) ? "{$wrapper_main_class}__content-width--{$attributes['styleContentWidth']}" : '';
  $style_spacing_top       = isset( $attributes['styleSpacingTop'] ) && ! empty( $attributes['styleSpacingTop'] ) ? "{$wrapper_main_class}__spacing-top--{$attributes['styleSpacingTop']}" : '';
  $style_spacing_bottom    = isset( $attributes['styleSpacingBottom'] ) && ! empty( $attributes['styleSpacingBottom'] ) ? "{$wrapper_main_class}__spacing-bottom--{$attributes['styleSpacingBottom']}" : '';
  $style_hide_block        = $attributes['styleHideBlock'] ? "{$wrapper_main_class}__hide-block" : '';
  $style_container_width   = isset( $attributes['styleContainerWidth'] ) && ! empty( $attributes['styleContainerWidth'] ) ? "{$wrapper_main_class}__container-width--{$attributes['styleContainerWidth']}" : '';
  $style_container_spacing = isset( $attributes['styleContainerSpacing'] ) && ! empty( $attributes['styleContainerSpacing'] ) ? "{$wrapper_main_class}__container-spacing--{$attributes['styleContainerSpacing']}" : '';
  $style_content_offset    = isset( $attributes['styleContentOffset'] ) && ! empty( $attributes['styleContentOffset'] ) ? "{$wrapper_main_class}__inner-offset--{$attributes['styleContentOffset']}" : '';

  // Tablet.
  $style_content_width_tablet     = isset( $attributes['styleContentWidthTablet'] ) && ! empty( $attributes['styleContentWidthTablet'] ) ? "{$wrapper_main_class}__content-width-tablet--{$attributes['styleContentWidthTablet']}" : '';
  $style_spacing_top_tablet       = isset( $attributes['styleSpacingTopTablet'] ) && ! empty( $attributes['styleSpacingTopTablet'] ) ? "{$wrapper_main_class}__spacing-top-tablet--{$attributes['styleSpacingTopTablet']}" : '';
  $style_spacing_bottom_tablet    = isset( $attributes['styleSpacingBottomTablet'] ) && ! empty( $attributes['styleSpacingBottomTablet'] ) ? "{$wrapper_main_class}__spacing-bottom-tablet--{$attributes['styleSpacingBottomTablet']}" : '';
  $style_hide_block_tablet        = $attributes['styleHideBlockTablet'] ? "{$wrapper_main_class}__hide-block-tablet" : '';
  $style_container_width_tablet   = isset( $attributes['styleContainerWidthTablet'] ) && ! empty( $attributes['styleContainerWidthTablet'] ) ? "{$wrapper_main_class}__container-width-tablet--{$attributes['styleContainerWidthTablet']}" : '';
  $style_container_spacing_tablet = isset( $attributes['styleContainerSpacingTablet'] ) && ! empty( $attributes['styleContainerSpacingTablet'] ) ? "{$wrapper_main_class}__container-spacing-tablet--{$attributes['styleContainerSpacingTablet']}" : '';
  $style_content_offset_tablet    = isset( $attributes['styleContentOffsetTablet'] ) && ! empty( $attributes['styleContentOffsetTablet'] ) ? "{$wrapper_main_class}__inner-offset-tablet--{$attributes['styleContentOffsetTablet']}" : '';

  // Mobile.
  $style_content_width_mobile     = isset( $attributes['styleContentWidthMobile'] ) && ! empty( $attributes['styleContentWidthMobile'] ) ? "{$wrapper_main_class}__content-width-mobile--{$attributes['styleContentWidthMobile']}" : '';
  $style_spacing_top_mobile       = isset( $attributes['styleSpacingTopMobile'] ) && ! empty( $attributes['styleSpacingTopMobile'] ) ? "{$wrapper_main_class}__spacing-top-mobile--{$attributes['styleSpacingTopMobile']}" : '';
  $style_spacing_bottom_mobile    = isset( $attributes['styleSpacingBottomMobile'] ) && ! empty( $attributes['styleSpacingBottomMobile'] ) ? "{$wrapper_main_class}__spacing-bottom-mobile--{$attributes['styleSpacingBottomMobile']}" : '';
  $style_hide_block_mobile        = $attributes['styleHideBlockMobile'] ? "{$wrapper_main_class}__hide-block-mobile" : '';
  $style_container_width_mobile   = isset( $attributes['styleContainerWidthMobile'] ) && ! empty( $attributes['styleContainerWidthMobile'] ) ? "{$wrapper_main_class}__container-width-mobile--{$attributes['styleContainerWidthMobile']}" : '';
  $style_container_spacing_mobile = isset( $attributes['styleContainerSpacingMobile'] ) && ! empty( $attributes['styleContainerSpacingMobile'] ) ? "{$wrapper_main_class}__container-spacing-mobile--{$attributes['styleContainerSpacingMobile']}" : '';
  $style_content_offset_mobile    = isset( $attributes['styleContentOffsetMobile'] ) && ! empty( $attributes['styleContentOffsetMobile'] ) ? "{$wrapper_main_class}__inner-offset-mobile--{$attributes['styleContentOffsetMobile']}" : '';


  $wrapper_class = implode(
    ' ',
    [
      $wrapper_main_class,

      $style_background_color,

      // Desktop.
      $style_content_width,
      $style_spacing_top,
      $style_spacing_bottom,
      $style_hide_block,

      // Tablet.
      $style_content_width_tablet,
      $style_spacing_top_tablet,
      $style_spacing_bottom_tablet,
      $style_hide_block_tablet,

      // Mobile.
      $style_content_width_mobile,
      $style_spacing_top_mobile,
      $style_spacing_bottom_mobile,
      $style_hide_block_mobile,
    ]
  );

  $wrapper_container_class = implode(
    ' ',
    [
      "{$wrapper_main_class}__container",

      // Desktop.
      $style_container_width,
      $style_container_spacing,

      // Tablet.
      $style_container_width_tablet,
      $style_container_spacing_tablet,

      // Mobile.
      $style_container_width_mobile,
      $style_container_spacing_mobile,
    ]
  );

  $wrapper_inner_class = implode(
    ' ',
    [
      "{$wrapper_main_class}__inner",

      // Desktop.
      $style_content_offset,

      // Tablet.
      $style_content_offset_tablet,

      // Mobile.
      $style_content_offset_mobile,
    ]
  );

  $wrapper_anchor_class = "{$wrapper_main_class}__anchor";

  ?>
  <div class="<?php echo esc_attr( $wrapper_class ); ?>" id="<?php echo esc_attr( $id ); ?>">
    <?php if ( ! empty( $anchor ) ) { ?>
      <div class="<?php echo esc_attr( $wrapper_anchor_class ); ?>" id="<?php echo esc_attr( $anchor ); ?>"></div>
    <?php } ?>
    <div class="<?php echo esc_attr( $wrapper_container_class ); ?>">
      <div class="<?php echo esc_attr( $wrapper_inner_class ); ?>">
        <?php
          $this->render_wrapper_view(
            $template_path,
            $attributes,
            $inner_block_content
          );
        ?>
      </div>
    </div>
  </div>
  <?php
} else {
  $this->render_wrapper_view(
    $template_path,
    $attributes,
    $inner_block_content
  );
}
