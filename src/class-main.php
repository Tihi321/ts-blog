<?php
/**
 * The file that defines the main start class.
 *
 * A class definition that includes attributes and functions used across both the
 * theme-facing side of the site and the admin area.
 *
 * @since   1.0.0
 * @package TS_Blog\Core
 */

namespace TS_Blog\Core;

use Eightshift_Libs\Core\Main as LibMain;

use TS_Blog\Admin;
use TS_Blog\Manifest;
use TS_Blog\General;
use TS_Blog\Blocks;
use TS_Blog\Admin\Menu;
use TS_Blog\Theme;
use TS_Blog\Plugins;
use TS_Blog\Routes;
use TS_Blog\Utils;

/**
 * The main start class.
 *
 * This is used to define admin-specific hooks, and
 * theme-facing site hooks.
 *
 * Also maintains the unique identifier of this theme as well as the current
 * version of the theme.
 *
 * @since 1.0.0
 */
class Main extends LibMain {

  /**
   * Get the list of services to register.
   *
   * A list of classes which contain hooks.
   *
   * @return array<string> Array of fully qualified class names.
   *
   * @since 1.0.0
   */
  protected function get_service_classes() : array {
    return [

      // Assets.
      Manifest\Manifest::class,

      // Admin.
      Admin\Admin::class => [ Manifest\Manifest::class ],
      Admin\Login::class,
      Admin\Media::class,
      Admin\Excerpt::class,

      // Menu.
      Menu\Menu::class,

      // Blocks.
      Blocks\Enqueue::class => [ Manifest\Manifest::class ],
      Blocks\Blocks::class,

      // Theme.
      Theme\Theme::class => [ Manifest\Manifest::class ],

      // Plugins.
      Plugins\Acf\Theme_Options::class,
      Plugins\Acf\Menu_Options::class,

      // Rest.
      Routes\Get_Header::class,

      // Utils.
      Utils\String_Utils::class,
    ];
  }
}
