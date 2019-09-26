<?php
/**
 * Template for the Heading Component view.
 *
 * @since 1.0.0
 * @package TS_Blog\Blocks.
 */

namespace TS_Blog\Blocks;

$content = $attributes['content'] ?? '';
$level   = isset( $attributes['level'] ) ? "h{$attributes['level']}" : 'h2';

$component_class = 'heading';
$block_class     = $attributes['blockClass'] ?? '';
$style_align     = isset( $attributes['styleAlign'] ) ? "{$component_class}__align--{$attributes['styleAlign']}" : '';
$style_size      = isset( $attributes['styleSize'] ) ? "{$component_class}__size--{$attributes['styleSize']}" : '';

$heading_class = "
  {$component_class}
  {$style_size}
  {$style_align}
  {$block_class}__heading
";

$highlight_class = 'heading__highlight';

$sender_name = '';
if ( isset( $_GET['senderName'] ) && ! empty( $_GET['senderName'] ) ) { // WPCS: CSRF ok.
  $sender_name = sanitize_text_field( wp_unslash( $_GET['senderName'] ) ); // WPCS: CSRF ok.
}
?>

<<?php echo esc_attr( $level ); ?> class="<?php echo esc_attr( $heading_class ); ?>">
  <?php if ( ! empty( $sender_name ) ) { ?>
    <span class="<?php echo esc_attr( $highlight_class ); ?>"><?php echo esc_html( ucwords( $sender_name ) ); ?></span>
  <?php } ?>
  <?php echo wp_kses_post( $content ); ?>
</<?php echo esc_attr( $level ); ?>>
