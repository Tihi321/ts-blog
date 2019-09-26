<?php
/**
 * Template for the Link Block view.
 *
 * @since 1.0.0
 * @package TS_Blog\Blocks.
 */

namespace TS_Blog\Blocks;

$this->render_block_view(
  '/components/link/link.php',
  [
    'blockClass' => $attributes['blockClass'] ?? '',
    'title' => $attributes['title'] ?? '',
    'url' => $attributes['url'] ?? '',
    'styleColor' => $attributes['styleColor'] ?? '',
    'styleAlign' => $attributes['styleAlign'] ?? '',
    'icon' => $attributes['icon'] ?? '',
    'isAnchor' => $attributes['isAnchor'] ?? false,
  ]
);
