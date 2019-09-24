<?php
/**
 * The Theme specific functionality.
 *
 * @since   1.0.0
 * @package TS_Blog\Theme
 */

namespace TS_Blog\Theme;

use Eightshift_Libs\Core\Service;
use Eightshift_Libs\Manifest\Manifest_Data;

/**
 * Class Theme
 *
 * @since 1.0.0
 */
class Theme implements Service {

  /**
   * Instance variable of manifest data.
   *
   * @var object
   *
   * @since 1.0.0
   */
  protected $manifest;

  /**
   * Create a new admin instance that injects manifest data for use in assets registration.
   *
   * @param Manifest_Data $manifest Inject manifest which holds data about assets from manifest.json.
   *
   * @since 1.0.0
   */
  public function __construct( Manifest_Data $manifest ) {
      $this->manifest = $manifest;
  }

  /**
   * Register all the hooks
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function register() {
    add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
    add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    add_filter( 'tsb_get_default_class', [ $this, 'get_default_class' ] );
  }

  /**
   * Returns default classes
   *
   * @param string $item Item class to return.
   *
   * @return string
   *
   * @since 1.0.0
   */
  public function get_default_class( $item ) : string {

    switch ( $item ) {
      case 'container':
            return 'tsb__container';
      default:
            return '';
    }

    return '';
  }

  /**
   * Register the Stylesheets for the theme area.
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function enqueue_styles() {

    // Main style file.
    \wp_register_style( TB_THEME_NAME . '-style', $this->manifest->get_assets_manifest_item( 'application.css' ), [], TB_THEME_VERSION );
    \wp_enqueue_style( TB_THEME_NAME . '-style' );

  }

  /**
   * Register the JavaScript for the theme area.
   *
   * First jQuery that is loaded by default by WordPress will be deregistered and then
   * 'enqueued' with empty string. This is done to avoid multiple jQuery loading, since
   * one is bundled with webpack and exposed to the global window.
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function enqueue_scripts() {

    // Main Javascript file.
    \wp_register_script( TB_THEME_NAME . '-scripts', $this->manifest->get_assets_manifest_item( 'application.js' ), [], TB_THEME_VERSION, true );
    \wp_enqueue_script( TB_THEME_NAME . '-scripts' );

    // Deregister then register react to frontend.
    wp_enqueue_script( 'wp-i18n' );
    wp_enqueue_script( 'react' );
    wp_enqueue_script( 'react-dom' );

    // Global variables for ajax and translations.
    \wp_localize_script(
      TB_THEME_NAME . '-scripts',
      'themeLocalization',
      [
        'headerEndpoint' => \esc_html( TB_THEME_NAME . '/' . API_VERSION . '/header' ),
        'restUrl' => \rest_url(),
        'ajaxurl' => \admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'wp_rest' ),
      ]
    );
  }

}
