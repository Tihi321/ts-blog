<?php
/**
 * Template for the Lists Block.
 *
 * @since 1.0.0
 * @package TS_Blog\Blocks.
 */

namespace TS_Blog\Blocks;

$this->render_block_view(
  '/components/lists/lists.php',
  [
    'blockClass' => $attributes['blockClass'] ?? '',
    'content'    => $attributes['content'] ?? '',
    'ordered'    => $attributes['ordered'] ?? '',
    'styleType'  => $attributes['styleType'] ?? '',
  ]
);
