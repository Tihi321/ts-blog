<?php
/**
 * The class file that contains method for getting header info, menu position should be with - instead of _
 *
 * @since   1.0.0
 * @package TS_Blog\Routes
 */

namespace TS_Blog\Routes;

use Eightshift_Libs\Routes\Callable_Route;
use TS_Blog\Assets\Manifest_Helper;
use TS_Blog\Routes\Base_Route;
use TS_Blog\Admin\Menu\Menu;
use TS_Blog\Plugins\Acf\Theme_Options;

/**
 * Class Get_Header
 */
class Get_Header extends Base_Route implements Callable_Route {
  const ROUTE_NAME = '/header/(?P<menu_position>[a-zA-Z0-9-]+)';

  /**
   * Get callback arguments array
   *
   * @return array Either an array of options for the endpoint,
   */
  protected function get_callback_arguments() : array {
    return [
      'methods'             => static::READABLE,
      'callback'            => [ $this, 'route_callback' ],
      'args' => array(
        'menu_position' => array(
          'validate_callback' => function( $param, $request, $key ) {
            return is_string( $param );
          },
          'required' => true,
        ),
      ),
    ];
  }

  /**
   *
   * This callback is triggered when a front end app
   * goes to the @link https://API-URL/wp-json/a1-careers-page/v1/jobs/
   * endpoint.
   *
   * @api
   *
   * @throws \WP_Error Error if the token is missing or wrong or the password
   * is the same.
   * @param \WP_REST_Request $request Data got from enpoint url.
   * @return \WP_REST_Response|\WP_Error          Developer data array.
   *
   * @since 1.0.0
   */
  public function route_callback( \WP_REST_Request $request ) {

    $param         = $request->get_param( 'menu_position' );
    $menu_position = str_replace( '-', '_', $param );

    $custom_menu = new Menu();
    $menu_items  = $custom_menu->get_menu_by_position( $menu_position );

    // Social fields.
    $mail            = get_field( Theme_Options::MAIL_URL_FIELD, 'option' );
    $google_play_url = get_field( Theme_Options::GOOGLE_PLAY_URL_FIELD, 'option' );
    $linkedin_url    = get_field( Theme_Options::LINKEDIN_URL_FIELD, 'option' );
    $youtube_url     = get_field( Theme_Options::YOUTUBE_URL_FIELD, 'option' );
    $github_url      = get_field( Theme_Options::GITHUB_URL_FIELD, 'option' );

    $logo_url   = Manifest_Helper::get_assets_manifest_item( 'assets/logo.svg' );
    $disclaimer = get_field( Theme_Options::DISCLAIMER, 'option' );

    $blog_name        = get_bloginfo( 'name' );
    $blog_description = get_bloginfo( 'description' );
    $logo_info        = $blog_name . ' - ' . $blog_description;

    $output =
    [
      'home_url' => \esc_url( home_url() ),
      'blog_name' => \esc_attr( $blog_name ),
      'blog_info' => \esc_attr( $logo_info ),
      'logo' => \esc_url( $logo_url ),
      'menu' => $menu_items,
      'social' => [
        'mail' => \esc_html( $mail ),
        'google_play' => \esc_url( $google_play_url ),
        'linkedin' => \esc_url( $linkedin_url ),
        'youtube' => \esc_url( $youtube_url ),
        'github' => \esc_url( $github_url ),
      ],
      'disclaimer' => \esc_html( $disclaimer ),
    ];

    return \rest_ensure_response( $output );

  }

}
