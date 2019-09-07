<?php
/**
 * The Menu specific functionality.
 *
 * @since   1.0.0
 * @package TS_Blog\Admin\Menu
 */

namespace TS_Blog\Admin\Menu;

use Eightshift_Libs\Core\Service;
use TS_Blog\Plugins\Acf\Menu_Options;

/**
 * Class Menu
 *
 * @since 1.0.0
 */
class Menu implements Service {

  /**
   * Register all the hooks
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function register() {
    add_action( 'after_setup_theme', [ $this, 'register_menu_positions' ], 11 );
  }

  /**
   * Register All Menu positions
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function register_menu_positions() {
    \register_nav_menus(
      $this->get_menu_positions()
    );
  }

  /**
   * Return array with all menus and their items.
   *
   * @return array Menu array styled for json-api.
   *
   * @since 1.0.0
   */
  public function get_menus() : array {
    $menu_positions = $this->get_menu_positions();

    $menu_output = array();
    foreach ( $menu_positions as $menu_position_key => $menu_position_value ) {

      $menu_output[] = array(
        'name'          => $this->get_assigned_menu_items( $menu_position_key, true ),
        'position_name' => $menu_position_value,
        'position'      => $menu_position_key,
        'items'         => $this->get_assigned_menu_items( $menu_position_key ),
      );
    }

    return $menu_output;
  }

  /**
   * Return menu with given name.
   *
   * @param string $menu_position    Menu location configured in get_menu_positions() function.
   * @return array Menu array styled for json-api.
   *
   * @since 1.0.0
   */
  public function get_menu_by_position( string $menu_position ) : array {

    $output       = [];
    $custom_menus = $this->get_menus();

    foreach ( $custom_menus as $index => $item ) {
      if ( $item['position'] === $menu_position ) {

        if ( empty( $item['name'] ) ) {
          break;
        }

        if ( empty( $item['items'] ) ) {
          break;
        }
        $output = $item;
      }
    }

    return $output;
  }

  /**
   * Return all menu poistions
   *
   * @return array Of menu positions with name and slug.
   *
   * @since 1.0.0
   */
  private function get_menu_positions() : array {
    return [
      'main_nav' => esc_html__( 'Main Menu', 'ts-blog' ),
      'footer_nav' => esc_html__( 'Footer Menu', 'ts-blog' ),
    ];
  }

    /**
     * Bem_menu returns an instance of the Bem_Menu_Walker class with the following arguments
     *
     * @param  string     $location            This must be the same as what is set in wp-admin/settings/menus for menu location and registrated in register_menu_positions function.
     * @param  string     $css_class_prefix    This string will prefix all of the menu's classes, BEM syntax friendly.
     * @param  arr|string $css_class_modifiers Provide either a string or array of values to apply extra classes to the <ul> but not the <li's>.
     * @param  bool       $echo                Echo the menu.
     * @return string                          Outputs html version of menu.
     *
     * @since 1.0.0
     */
  public function bem_menu( $location = 'main_menu', $css_class_prefix = 'main-menu', $css_class_modifiers = null, $echo = true ) {

    // Check to see if any css modifiers were supplied.
    if ( $css_class_modifiers ) {

      if ( is_array( $css_class_modifiers ) ) {
        $modifiers = implode( ' ', $css_class_modifiers );
      } elseif ( is_string( $css_class_modifiers ) ) {
        $modifiers = $css_class_modifiers;
      }
    } else {
      $modifiers = '';
    }

    $args = [
      'theme_location' => $location,
      'container'      => false,
      'items_wrap'     => '<ul class="' . $css_class_prefix . ' ' . $modifiers . '">%3$s</ul>',
      'echo'           => $echo,
      'walker'         => new Bem_Menu_Walker( $css_class_prefix ),
    ];

    if ( ! \has_nav_menu( $location ) ) {
      return '';
    }

    return \wp_nav_menu( $args );
  }


  /**
   * Return menu items assigned to menu locations
   * With changed url from absolute to relative path
   *
   * @param string $menu_location    Menu location configured in get_menu_positions() function.
   * @param bool   $output_menu_name If true it will return menu term name.
   * @return array Menu items styled for json-api.
   *
   * @since 1.0.0
   */
  private function get_assigned_menu_items( string $menu_location, bool $output_menu_name = false ) {
    if ( ! $menu_location ) {
      return false;
    }

    // Get menu locations and their IDs.
    $locations = get_nav_menu_locations();

    // Check if menu location provided exists.
    if ( ! $locations || ! isset( $locations[ $menu_location ] ) ) {
      return false;
    }

    // Get menu location data from menu location ID.
    $menu = get_term( $locations[ $menu_location ], 'nav_menu' );
    if ( \is_wp_error( $menu ) ) {
      return false;
    }

    if ( $output_menu_name === true ) {
      return $menu->name;
    }

    // Return menu items as object.
    $menu_items = wp_get_nav_menu_items( $menu->term_id );
    if ( ! isset( $menu_items ) || ! $menu_items ) {
      return false;
    }

    // Filter output to match requirements.
    $output = array();
    foreach ( $menu_items as $menu_item ) {
      $url = '/';

      // If is custom link just output url.
      if ( $menu_item->object === 'custom' ) {
        $url = $menu_item->url;
      } else {

        // If is home page output only slash.
        if ( $menu_item->url === home_url( '/' ) || $menu_item->url === home_url() ) {
          $url = '/';
        } else {
          $url = $this->trim_url( $menu_item->url );
        }
      }

      // Remove trashed items and empty URL's.
      if ( empty( $menu_item->url ) || strpos( $menu_item->url, '__trashed' ) !== false ) {
        continue;
      }

      // Get featured color.
      $featured_color = get_field( Menu_Options::FEATURED_COLOR_FILED, $menu_item );

      $output[] = array(
        'title'          => $menu_item->title,
        'id'             => $menu_item->ID,
        'url'            => $url,
        'featured_color' => $featured_color,
        'parent'         => (int) $menu_item->menu_item_parent,
      );

    }

    $temp_items = $this->build_tree_menu( $output );

    return $temp_items['children'];
  }

  /**
   * Return tree menu with children from flat menu that is returned by default.
   *
   * @param array $items menu items.
   * @param array $tree object tree.
   */
  private function build_tree_menu( array $items, array $tree = null ) : array {

    if ( ! isset( $tree ) ) {
      $tree = [ 'children' => [] ];
    } elseif ( ! isset( $tree['children'] ) ) {
      $tree['children'] = [];
    }

    foreach ( $items as $index => $item ) {
      if ( isset( $tree['id'] ) === false && $item['parent'] === 0 || isset( $tree['id'] ) && $item['parent'] === $tree['id'] ) {

        array_splice( $items, $index, 1 );
        $output = $this->build_tree_menu( $items, $item );
        array_push( $tree['children'], $output );
      }
    }

    return $tree;

  }

  /**
   * Trim urls to be relative for the frontend.
   *
   * @param string $link Url string.
   *
   * @return string
   *
   * @since 1.0.0
   */
  private function trim_url( string $link ) : string {

    if ( ! $link ) {
      return '';
    }

    $parse = \wp_parse_url( $link );
    $path  = $parse['path'] ?? '';
    $query = $parse['query'] ?? '';

    if ( ! empty( $query ) ) {
      return $query;
    }

    return \rtrim( $path, '/' );
  }
}
