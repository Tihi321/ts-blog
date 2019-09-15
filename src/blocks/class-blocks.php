<?php
/**
 * Blocks class used to define configurations for blocks.
 *
 * @since   1.0.0
 * @package TS_Blog\Blocks
 */

namespace TS_Blog\Blocks;

use Eightshift_Blocks\Blocks as Lib_Blocks;

/**
 * Blocks class.
 */
class Blocks extends Lib_Blocks {

  /**
   * Register all the hooks
   *
   * @since 1.0.0
   *
   * @return void
   */
  public function register() {
    parent::register();

    add_filter( 'allowed_block_types', [ $this, 'allowed_block_types' ], 9999, 2 );

  }

  /**
   * Allowed blocks
   *
   * @param array  $allowed_blocks Array of allowed blocks.
   * @param object $post Post object.
   * @since 1.0.0
   *
   * @return array
   */
  public function allowed_block_types( $allowed_blocks, $post ) {

    if ( $post->post_type === 'page' || $post->post_type === 'post' ) {

      return $this->get_all_blocks_list( $allowed_blocks );
    }

    return $allowed_blocks;

  }
}
