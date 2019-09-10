<?php
/**
 * The Excerpt specific functionality.
 *
 * @since   1.0.0
 * @package TS_Blog\Admin
 */

namespace TS_Blog\Admin;

use Eightshift_Libs\Core\Service;

/**
 * Class Media
 *
 * This class handles all content options.
 *
 * @since 1.0.0
 */
class Excerpt implements Service {

  /**
   * Register all the hooks
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function register() {
    add_filter( 'tsb_get_excerpt', [ $this, 'get_excerpt' ], 10, 1 );
  }

  /**
   * Custom Excerpt to set word limit
   *
   * @param integer $limit  Number of characters to trim.
   * @return string         Trimmed excerpt.
   *
   * @since 2.0.0
   */
  public function get_excerpt( $limit = null ) {

    if ( empty( $limit ) ) {
      $limit = 140;
    }

    $excerpt = get_the_excerpt();

    if ( empty( $excerpt ) ) {
      $excerpt = $this->get_content();
    }

    // Remove shortcode.
    $output = preg_replace( ' (\[.*?\])', '', $excerpt );
    $output = strip_shortcodes( $output );

    // Remove html tags.
    $output = wp_strip_all_tags( $output );

    // Reduce string to limit.
    $output = substr( $output, 0, $limit );

    // Remove any whitespace character.
    $output = trim( preg_replace( '/\s+/', ' ', $output ) );

    // Check if strings are equal if not remove text until first space.
    if ( strcmp( $excerpt, $output ) !== 0 ) {
      $output = substr( $output, 0, strripos( $output, ' ' ) );
    }

    $output = $output . '...';
    return $output;
  }

  /**
   * It post has no excerpt, get all paragraph block content.
   *
   * @return string         Trimmed excerpt.
   *
   * @since 2.0.0
   */
  public function get_content() {

    $block_content = parse_blocks( get_the_content() );

    $content_filtered = array_filter( $block_content, [ $this, 'get_paragraphs' ] );
    $content_array    = array_map( [ $this, 'get_paragraph_content' ], $content_filtered );

    return implode( '. ', $content_array );
  }

  /**
   * Filter blocks paragraph from content.
   *
   * @param array $content  Blocks content.
   * @return bool
   *
   * @since 2.0.0
   */
  private function get_paragraphs( $content ) {
    $name_array = explode( '/', $content['blockName'] )[1] ?? ''; // return any block name.
    return $name_array === 'paragraph';
  }

  /**
   * Get content from paragraphs.
   *
   * @param array $content  Blocks content.
   * @return string
   *
   * @since 2.0.0
   */
  private function get_paragraph_content( $content ) {
    return $content['attrs']['content'];
  }
}
