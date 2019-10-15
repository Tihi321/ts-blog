<?php
/**
 * Template for the Leader Image Block view.
 *
 * @since 1.0.0
 * @package TS_Blocks\Blocks.
 */

namespace TS_Blocks\Blocks;

$block_class    = $attributes['blockClass'] ?? '';
$js_block_class = $attributes['blockJsClass'] ?? 'js-code-block';
$quotes_number  = $attributes['quotes'] ?? '1';
$interval       = $attributes['interval'] ?? '2000';

?>

<div class="<?php echo esc_attr( "{$block_class} {$js_block_class}" ); ?>" data-quotes-number="<?php echo esc_attr( $quotes_number ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"></div>
