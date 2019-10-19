<?php
/**
 * Class that adds fields to posts and pages.
 *
 * @since   1.0.0
 * @package TS_Blog\Plugins\Acf
 */

namespace TS_Blog\Plugins\Acf;

use Eightshift_Libs\Core\Service;

/**
 * Class Theme Options
 */
class Page_Options implements Service {

  /**
   * Theme options api page slug
   *
   * @var string
   *
   * @since 1.0.0
   */
  const QUOTE_KEY = 'post_quote_key';

  /**
   * Register all the hooks
   *
   * @since 1.0.0
   */
  public function register() : void {
    add_action( 'acf/init', [ $this, 'register_page_options' ] );
  }

  /**
   * Populate Options page
   *
   * @since 1.0.0
   */
  public function register_page_options() : void {
    if ( function_exists( 'acf_add_options_page' ) ) {
      acf_add_local_field_group(
        array(
          'key' => 'group_5dab54481d3f7',
          'title' => 'Quote',
          'fields' => array(
            array(
              'key' => 'field_5dab54dce2160',
              'label' => 'Quote',
              'name' => static::QUOTE_KEY,
              'type' => 'wysiwyg',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'tabs' => 'all',
              'toolbar' => 'basic',
              'media_upload' => 0,
              'delay' => 1,
            ),
          ),
          'location' => array(
            array(
              array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
              ),
            ),
            array(
              array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
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
