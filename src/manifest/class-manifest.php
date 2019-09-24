<?php
/**
 * The Manifest data specific functionality.
 * Used in admin or theme side.
 *
 * @since   1.0.0
 * @package TS_Blog\Manifest
 */

namespace TS_Blog\Manifest;

use Eightshift_Libs\Manifest\Manifest as LibManifest;
use Eightshift_Libs\Core\Service;

/**
 * Class Mainfest
 *
 * @since 1.0.0
 */
class Manifest extends LibManifest implements Service {

  /**
   * Get Assets Manifest global variable name.
   *
   * @return string
   *
   * @since 1.0.0
   */
  protected function get_manifest_item_filter_name() : string {
    return 'tsb_manifest_item';
  }

  /**
   * Get Assets Manifest global variable name.
   *
   * @return string
   *
   * @since 1.0.0
   */
  protected function get_global_variable_name() : string {
    return 'TSB_ASSETS_MANIFEST';
  }
}
