<?php
/**
 * The object helper specific functionality for errors.
 *
 * @since   1.0.0
 * @package TS_Blog\Helpers
 */

namespace TS_Blog\Helpers;

/**
 * Error logger trait.
 *
 * @since 1.0.0
 */
trait Error_Logger {

  /**
   * Error handler helper
   *
   * Returns array with the error code and reason of the error.
   *
   * @param string $status      Status description.
   * @param string $message     Optional error message.
   * @param string $data        Optional data content.
   *
   * @return \WP_Error          \WP_Error instance with error message and status.
   *
   * @since 1.0.0
   */
  public function error_handler( string $status, string $message = null, $data = null ) {

    switch ( $status ) {
      case 'failed_nonce':
          $error_message = esc_html__( 'Check your nonce!', 'ts-blog' );
          $code          = 400;
            break;
    }

    $output_message = ( $message ) ? $message : $error_message;

    return new \WP_Error(
      esc_html( $status ),
      $output_message,
      [
        'status' => (int) $code,
        'data' => $data,
      ]
    );
  }

  /**
   * Ensure correct error response for rest using error handler function.
   *
   * @param string       $status  Status description.
   * @param string       $message Optional error message.
   * @param array/object $data    Optional error data response.
   *
   * @return \WP_Error \WP_Error instance with error message and status.
   *
   * @since 1.0.0
   */
  public function rest_error_handler( string $status = '', string $message = null, $data = null ) {
    return \rest_ensure_response( $this->error_handler( $status, $message, $data ) );
  }
}
