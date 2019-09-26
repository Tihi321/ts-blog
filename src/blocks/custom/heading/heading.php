<?php
/**
 * Template for the Heading Block view.
 *
 * @since 1.0.0
 * @package TS_Blog\Blocks.
 */

namespace TS_Blog\Blocks;

$this->render_block_view(
  '/components/heading/heading.php',
  [
    'blockClass' => $attributes['blockClass'] ?? '',
    'content' => $attributes['content'] ?? '',
    'level' => $attributes['level'] ?? '',
    'styleAlign' => $attributes['styleAlign'] ?? '',
    'styleSize' => $attributes['styleSize'] ?? '',
  ]
);
