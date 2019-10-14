<?php
/**
 * The class file that contains method for getting random quotes
 *
 * @since   1.0.0
 * @package TS_Blog\Routes
 */

namespace TS_Blog\Routes;

use Eightshift_Libs\Routes\Callable_Route;
use TS_Blog\Assets\Manifest_Helper;
use TS_Blog\Routes\Base_Route;
use TS_Blog\Plugins\Acf\Theme_Options;

/**
 * Class Get_Random_Quotes
 */
class Get_Random_Quotes extends Base_Route implements Callable_Route {
  const ROUTE_NAME = '/quotes/(?P<number>[0-9-]+)';

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
        'number' => array(
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
   * This callback returns random quotes
   * goes to the @link https://API-URL/wp-json/a1-careers-page/v1/jobs/
   * endpoint.
   *
   * @api
   *
   * @param \WP_REST_Request $request Data got from enpoint url.
   * @return \WP_REST_Response|\WP_Error          Developer data array.
   *
   * @since 1.0.0
   */
  public function route_callback( \WP_REST_Request $request ) {

    $number = (int) $request->get_param( 'number' );

    $quotes = get_field( Theme_Options::QUOTES_KEY, 'options' );
    shuffle( $quotes );

    $quotes_length = count( $quotes );

    $output = ( $number >= $quotes_length ) ? $quotes : array_slice( $quotes, 0, $number );

    return \rest_ensure_response( $output );

  }

}
