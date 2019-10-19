<?php
/**
 * The Media specific functionality.
 *
 * @since   1.0.0
 * @package TS_Blog\Admin
 */

namespace TS_Blog\Admin;

use Eightshift_Libs\Core\Service;

/**
 * Class Media
 *
 * This class handles all media options. Sizes, Types, Features, etc.
 *
 * @since 1.0.0
 */
class Media implements Service {

  /**
   * Register all the hooks
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function register() {
    add_action( 'after_setup_theme', [ $this, 'add_theme_support' ], 11 );
    add_action( 'after_setup_theme', [ $this, 'add_custom_image_sizes' ], 11 );
    add_filter( 'tsb_get_post_image', [ $this, 'get_post_image' ], 10, 2 );
  }

  /**
   * Enable theme support
   * for full list check: https://developer.wordpress.org/reference/functions/add_theme_support/
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function add_theme_support() {
    \add_theme_support( 'title-tag' );
    \add_theme_support( 'html5' );
    \add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
  }

  /**
   * Create new image sizes
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function add_custom_image_sizes() {
    \add_image_size( 'card', 400, 250, true );
    \add_image_size( 'hero', 1440, 700, true );
  }

  /**
   * Ger featured image for specific post/page ID.
   *
   * @param  string  $size     Image size. Accepts any valid image size.
   * @param  integer $post_id  Post ID.
   * @return array             Array with image settings.
   *
   * @since 2.0.0
   */
  public function get_post_image( $size = 'thumbnail', $post_id = null ) {

    $image_array = [
      'url'   => '',
      'width'  => '',
      'height' => '',
    ];

    if ( ! $post_id ) {
      global $post;

      $post_id = $post->ID;
    }

    if ( has_post_thumbnail( $post_id ) ) {
      $attachemnt_id = get_post_thumbnail_id( $post_id );
      $image         = wp_get_attachment_image_src( $attachemnt_id, $size );

      $image_array = [
        'url'   => esc_url( $image[0] ),
        'width'  => esc_html( $image[1] ),
        'height' => esc_html( $image[2] ),
      ];
    }

    return $image_array;
  }
}
