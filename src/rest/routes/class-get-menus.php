<?php
/**
 * The class file that contains method for getting menus, menu position should be with - instead of _
 *
 * @since   1.0.0
 * @package TS_Blog\Routes
 */

namespace TS_Blog\Routes;

use Eightshift_Libs\Routes\Callable_Route;
use TS_Blog\Routes\Base_Route;
use TS_Blog\Admin\Menu\Menu;

/**
 * Class Get_Menus
 */
class Get_Menus extends Base_Route implements Callable_Route {
  const ROUTE_NAME = '/menus/(?P<menu_position>[a-zA-Z0-9-]+)';

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

    $output =
    [
      'menu' => $menu_items,
    ];

    return \rest_ensure_response( $output );

  }

}
