<?php
/**
 * Theme Name: TS Blog
 * Description: Tihomir Selak Blog Page
 * Author: Team Eightshift
 * Author URI:
 * Version: 1.0
 * Text Domain: ts-blog
 *
 * @package TS_Blog
 *
 * @since 1.0.0
 */

namespace TS_Blog;

/**
 * If this file is called directly, abort.
 *
 * @since 1.0.0
 */
if ( ! \defined( 'WPINC' ) ) {
  die;
}

/**
 * Global variable defining theme name generally used for naming assets handlers.
 *
 * @since 1.0.0
 */
\define( 'TB_THEME_NAME', 'ts-blog' );

/**
 * Global variable defining rest api version name generally used for naming assets handlers.
 *
 * @since 1.0.0
 */
define( 'API_VERSION', 'v1' );

/**
 * Global variable defining theme version generally used for versioning assets handlers.
 *
 * @since 1.0.0
 */
\define( 'TB_THEME_VERSION', '1.0.0' );

/**
 * Include the autoloader so we can dynamically include the rest of the classes.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/vendor/autoload.php';

/**
 * Begins execution of the theme.
 *
 * Since everything within the theme is registered via hooks,
 * then kicking off the theme from this point in the file does
 * not affect the page life cycle.
 *
 * @since 1.0.0
 */
( new Core\Main() )->register();
