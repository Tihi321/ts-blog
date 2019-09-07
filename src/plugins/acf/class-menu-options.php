<?php
/**
 * Class that adds featured color to menu items.
 *
 * @since   1.0.0
 * @package TS_Blog\Plugins\Acf
 */

namespace TS_Blog\Plugins\Acf;

use Eightshift_Libs\Core\Service;

/**
 * Class Menu Options
 */
class Menu_Options implements Service {

  /**
   * Featured link color
   *
   * @var string
   *
   * @since 1.0.0
   */
  const FEATURED_COLOR_FILED = 'featured_color';

  /**
   * Register all the hooks
   *
   * @since 1.0.0
   */
  public function register() : void {
    add_action( 'acf/init', [ $this, 'register_menu_items_options' ] );
  }

  /**
   * Populate Options for menu items
   *
   * @since 1.0.0
   */
  public function register_menu_items_options() : void {
    if ( function_exists( 'acf_add_options_page' ) ) {
      acf_add_local_field_group(
        array(
          'key' => 'group_5d72dde11ab61',
          'title' => 'Color',
          'fields' => array(
            array(
              'key' => 'field_5d72ddea4f489',
              'label' => 'Featured color',
              'name' => static::FEATURED_COLOR_FILED,
              'type' => 'color_picker',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
            ),
          ),
          'location' => array(
            array(
              array(
                'param' => 'nav_menu_item',
                'operator' => '==',
                'value' => 'location/main_nav',
              ),
            ),
          ),
          'menu_order' => 0,
          'position' => 'normal',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => '',
          'active' => true,
          'description' => '',
        )
      );
    }
  }
}
