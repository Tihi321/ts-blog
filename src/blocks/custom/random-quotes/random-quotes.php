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

?>

<div class="<?php echo esc_attr( "{$block_class} {$js_block_class}" ); ?>"></div>
