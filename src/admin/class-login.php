<?php
/**
 * The login page specific functionality.
 *
 * @since   1.0.0
 * @package TS_Blog\Admin
 */

namespace TS_Blog\Admin;

use Eightshift_Libs\Core\Service;

/**
 * Class Login
 *
 * This class handles all login page options.
 *
 * @since 1.0.0
 */
class Login implements Service {

  /**
   * Register all the hooks
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function register() {
    add_filter( 'login_headerurl', [ $this, 'custom_login_header_url' ] );
    add_filter( 'login_url', [ $this, 'custom_login_url' ], 10, 3 );
  }

  /**
   * Change default logo link with home url.
   *
   * @return string
   *
   * @since 1.0.0
   */
  public function custom_login_header_url() : string {
    return \home_url( '/' );
  }

  /**
   * Change default logo link with home url.
   *
   * @param string $login_url old login url.
   * @param string $redirect old login url.
   * @param bool   $force_reauth old login url.
   * @return string
   *
   * @since 1.0.0
   */
  public function custom_login_url( $login_url, $redirect, $force_reauth ) : string {
    return \home_url( '/' );
  }
}
