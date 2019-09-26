<?php
/**
 * Template for the Paragraph Block.
 *
 * @since 1.0.0
 * @package TS_Blog\Blocks.
 */

namespace TS_Blog\Blocks;

$this->render_block_view(
  '/components/paragraph/paragraph.php',
  [
    'blockClass'  => $attributes['blockClass'] ?? '',
    'content'     => $attributes['content'] ?? '',
    'styleAlign'  => $attributes['styleAlign'] ?? '',
    'styleColor'  => $attributes['styleColor'] ?? '',
    'styleSize'   => $attributes['styleSize'] ?? '',
    'removeStyle' => $attributes['removeStyle'] ?? '',
  ]
);
