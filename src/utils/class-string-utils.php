<?php
/**
 * String Utility class.
 *
 * @since   1.0.0
 * @package TS_Blog\Admin
 */

namespace TS_Blog\Utils;

use Eightshift_Libs\Core\Service;

/**
 * Class String_Utils
 *
 * This class handles srtings.
 *
 * @since 1.0.0
 */
class String_Utils implements Service {

  /**
   * Register all the hooks
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function register() {
    add_filter( 'tsb_trim_url', [ $this, 'trim_url' ] );
    add_filter( 'tsb_is_valid_xml', [ $this, 'is_valid_xml' ] );
  }

  /**
   * Trim urls to be relative for the frontend.
   *
   * @param string $link Url string.
   *
   * @return string
   *
   * @since 1.0.0
   */
  public function trim_url( string $link ) : string {

    if ( ! $link ) {
      return '';
    }

    $parse = \wp_parse_url( $link );
    $path  = $parse['path'] ?? '';
    $query = $parse['query'] ?? '';

    if ( ! empty( $query ) ) {
      return $query;
    }

    return \rtrim( $path, '/' );
  }

  /**
   * Check if XML is valid file used for svg.
   *
   * @param xml $xml Full xml document.
   * @return boolean
   *
   * @since 1.0.0
   */
  public function is_valid_xml( $xml ) {
    libxml_use_internal_errors( true );
    $doc = new \DOMDocument( '1.0', 'utf-8' );
    $doc->loadXML( $xml );
    $errors = libxml_get_errors();
    return empty( $errors );
  }
}
