<?php
/**
 * Template for the Button Block view.
 *
 * @since 1.0.0
 * @package TS_Blog\Blocks.
 */

namespace TS_Blog\Blocks;

$this->render_block_view(
  '/components/button/button.php',
  [
    'blockClass' => $attributes['blockClass'] ?? '',
    'title' => $attributes['title'] ?? '',
    'url' => $attributes['url'] ?? '',
    'styleColor' => $attributes['styleColor'] ?? '',
    'styleSize' => $attributes['styleSize'] ?? '',
    'styleSizeWidth' => $attributes['styleSizeWidth'] ?? '',
  ]
);
