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
   * Accent link color
   *
   * @var string
   *
   * @since 1.0.0
   */
  const CUSTOM_ACCENT_COLOR_KEY = 'field_5d73ac53a7bdc';

  /**
   * Accent link color
   *
   * @var string
   *
   * @since 1.0.0
   */
  const CUSTOM_ACCENT_COLOR_FILED = 'custom_accent_color';

  /**
   * Accent link color
   *
   * @var string
   *
   * @since 1.0.0
   */
  const ACCENT_COLOR_FILED = 'accent_color';

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
          'title' => 'Accent Color',
          'fields' => array(
            array(
              'key' => static::CUSTOM_ACCENT_COLOR_KEY,
              'label' => 'Custom Accent Color',
              'name' => static::CUSTOM_ACCENT_COLOR_FILED,
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5d72ddea4f489',
              'label' => 'Accent Color',
              'name' => static::ACCENT_COLOR_FILED,
              'type' => 'color_picker',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => array(
                array(
                  array(
                    'field' => static::CUSTOM_ACCENT_COLOR_KEY,
                    'operator' => '==',
                    'value' => '1',
                  ),
                ),
              ),
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
