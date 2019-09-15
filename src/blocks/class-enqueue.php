<?php
/**
 * Enqueue class used to define all script and style enqueues for Gutenberg blocks.
 *
 * @since   1.0.0
 * @package TS_Blog\Blocks
 */

namespace TS_Blog\Blocks;

use Eightshift_Blocks\Enqueue as Lib_Enqueue;
use Eightshift_Libs\Assets\Manifest_Data;

/**
 * Enqueue class.
 *
 * @since 1.0.0
 */
class Enqueue extends Lib_Enqueue {

  /**
   * Instance variable of manifest data.
   *
   * @var object
   *
   * @since 1.0.0 Init.
   */
  protected $manifest;

  /**
   * Create a new admin instance that injects manifest data for use in assets registration.
   *
   * @param Manifest_Data $manifest Inject manifest which holds data about assets from manifest.json.
   *
   * @since 1.0.0 Init.
   */
  public function __construct( Manifest_Data $manifest ) {
    $this->manifest = $manifest;
  }

  /**
   * Register all the hooks
   *
   * @since 1.0.0
   */
  public function register() {

    // Editor only script.
    add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_scripts' ] );

    // Editor only style.
    add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_styles' ], 50 );

    // Editor and frontend style.
    add_action( 'enqueue_block_assets', [ $this, 'enqueue_block_style' ], 50 );

    // Frontend only script.
    add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_block_script' ] );
  }


  /**
   * Register the Block Stylesheets for the admin area.
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function enqueue_block_styles() {

    $screen = get_current_screen();

    if ( $screen->id === 'post' || $screen->id === 'page' ) {
      $this->enqueue_block_editor_style();
    }

  }

  /**
   * Register the Block Scripts for the admin area.
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function enqueue_block_scripts() {

    $screen = get_current_screen();

    if ( $screen->id === 'post' || $screen->id === 'page' ) {
      $this->enqueue_block_editor_script();
    }

  }


  /**
   * Method to provide projects manifest array.
   * Using this manifest you are able to provide project specific implementation of assets locations.
   *
   * @return array
   *
   * @since 1.0.0
   */
  public function get_project_manifest() : array {
    return $this->manifest->get_decoded_manifest_data();
  }

  /**
   * Get project name used in enqueue methods for scripts and styles.
   *
   * @return string
   *
   * @since 1.0.0
   */
  protected function get_project_name() : string {
    return TB_THEME_NAME;
  }

  /**
   * Get project version used in enqueue methods for scripts and styles.
   *
   * @return string
   *
   * @since 1.0.0
   */
  protected function get_project_version() : string {
    return TB_THEME_VERSION;
  }
}
