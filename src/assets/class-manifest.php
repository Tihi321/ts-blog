<?php
/**
 * The Manifest data specific functionality.
 * Used in admin or theme side.
 *
 * @since   1.0.0
 * @package TS_Blog\Assets
 */

namespace TS_Blog\Assets;

use Eightshift_Libs\Assets\Manifest as LibManifest;
use Eightshift_Libs\Core\Service;

/**
 * Class Mainfest
 *
 * @since 1.0.0
 */
class Manifest extends LibManifest {

  /**
   * Get Assets Manifest global variable name.
   *
   * @return string
   *
   * @since 1.0.0
   */
  protected function get_global_variable_name() : string {
    return 'ES_ASSETS_MANIFEST';
  }
}
