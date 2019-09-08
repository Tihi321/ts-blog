<?php
/**
 * Class that adds theme options capability.
 *
 * @since   1.0.0
 * @package TS_Blog\Plugins\Acf
 */

namespace TS_Blog\Plugins\Acf;

use Eightshift_Libs\Core\Service;

/**
 * Class Theme Options
 */
class Theme_Options implements Service {

  /**
   * Theme options api page slug
   *
   * @var string
   *
   * @since 1.0.0
   */
  const THEME_OPTIONS_SLUG = 'ts-blog-options';

  /**
   * Blog logo
   *
   * @var string
   *
   * @since 1.0.0
   */
  const BLOG_LOGO = 'blog_logo';

  /**
   * Blog favicon
   *
   * @var string
   *
   * @since 1.0.0
   */
  const BLOG_FAVICON = 'blog_favicon';

  /**
   * Blog accent color
   *
   * @var string
   *
   * @since 1.0.0
   */
  const BLOG_ACCENT_COLOR_FILED = 'blog_accent_color';

  /**
   * Theme options mail url
   *
   * @var string
   *
   * @since 1.0.0
   */
  const MAIL_URL_FIELD = 'mail_url_field';

  /**
   * Theme options google play url
   *
   * @var string
   *
   * @since 1.0.0
   */
  const GOOGLE_PLAY_URL_FIELD = 'google_play_url_field';

  /**
   * Theme options linkedin url
   *
   * @var string
   *
   * @since 1.0.0
   */
  const LINKEDIN_URL_FIELD = 'linkedin_url_field';

  /**
   * Theme options youtube url
   *
   * @var string
   *
   * @since 1.0.0
   */
  const YOUTUBE_URL_FIELD = 'youtube_url_field';

  /**
   * Theme options github url
   *
   * @var string
   *
   * @since 1.0.0
   */
  const GITHUB_URL_FIELD = 'github_url_field';

  /**
   * Theme options page description
   *
   * @var string
   *
   * @since 1.0.0
   */
  const DISCLAIMER = 'disclaimer';

  /**
   * Theme options listing description
   *
   * @var string
   *
   * @since 1.0.0
   */
  const LISTING_DESCRIPTION = 'listing_description';

  /**
   * Theme options listing image
   *
   * @var string
   *
   * @since 1.0.0
   */
  const LISTING_IMAGE = 'listing_image';

  /**
   * Theme options footer copyright
   *
   * @var string
   *
   * @since 1.0.0
   */
  const FOOTER_COPYRIGHT = 'footer_copyright';

  /**
   * Register all the hooks
   *
   * @since 1.0.0
   */
  public function register() : void {
    add_action( 'acf/init', [ $this, 'create_theme_options_page' ] );
    add_action( 'acf/init', [ $this, 'register_theme_options' ] );
  }

  /**
   * Create Options page in sidebar
   *
   * @since 1.0.0
   */
  public function create_theme_options_page() : void {
    if ( function_exists( 'acf_add_options_page' ) ) {
      acf_add_options_page(
        array(
          'page_title' => esc_html__( 'General Settings', 'ts-blog' ),
          'menu_title' => esc_html__( 'Theme Options', 'ts-blog' ),
          'menu_slug'  => static::THEME_OPTIONS_SLUG,
          'capability' => 'edit_theme_options',
          'redirect'   => false,
          'icon_url'   => 'dashicons-welcome-view-site',
        )
      );
    }
  }

  /**
   * Populate Options page
   *
   * @since 1.0.0
   */
  public function register_theme_options() : void {
    if ( function_exists( 'acf_add_options_page' ) ) {
      acf_add_local_field_group(
        array(
          'key'                   => 'group_59b6769d4340b',
          'title'                 => 'Options',
          'fields'                => array(
            array(
              'key' => 'field_59fddad7t652b',
              'label' => 'Blog',
              'name' => '',
              'type' => 'tab',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'placement' => 'top',
              'endpoint' => 0,
            ),
            array(
              'key' => 'field_5d72d32287543',
              'label' => 'Logo',
              'name' => static::BLOG_LOGO,
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'array',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_5d72d32327543',
              'label' => 'Favicon',
              'name' => static::BLOG_FAVICON,
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'array',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_5d72ewea4f489',
              'label' => 'Accent Color',
              'name' => static::BLOG_ACCENT_COLOR_FILED,
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
            array(
              'key' => 'field_59eddad7t652b',
              'label' => 'Header',
              'name' => '',
              'type' => 'tab',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'placement' => 'top',
              'endpoint' => 0,
            ),
            array(
              'key' => 'field_4d44343ref1b2',
              'label' => 'Mail',
              'name' => static::MAIL_URL_FIELD,
              'type' => 'email',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => 'Mail',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_5d4965tt2f1b2',
              'label' => 'Github',
              'name' => static::GITHUB_URL_FIELD,
              'type' => 'url',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => 'Url',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_5d44343t2f1b2',
              'label' => 'Linkedin',
              'name' => static::LINKEDIN_URL_FIELD,
              'type' => 'url',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => 'Url',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_5d4435tt2f1b2',
              'label' => 'Youtube',
              'name' => static::YOUTUBE_URL_FIELD,
              'type' => 'url',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => 'Url',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_4d44343t2f1b2',
              'label' => 'Google Play',
              'name' => static::GOOGLE_PLAY_URL_FIELD,
              'type' => 'url',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => 'Url',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_4d4434542f1b2',
              'label' => 'Disclaimer',
              'name' => static::DISCLAIMER,
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => 'Text',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_59eread7t652b',
              'label' => 'Listing',
              'name' => '',
              'type' => 'tab',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'placement' => 'top',
              'endpoint' => 0,
            ),
            array(
              'key' => 'field_5d72d2c287543',
              'label' => 'Hero image',
              'name' => static::LISTING_IMAGE,
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'array',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
            array(
              'key' => 'field_5d72d28b87542',
              'label' => 'Description',
              'name' => static::LISTING_DESCRIPTION,
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
              'delay' => 0,
            ),
            array(
              'key' => 'field_59eddadff652b',
              'label' => 'Footer',
              'name' => '',
              'type' => 'tab',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'placement' => 'top',
              'endpoint' => 0,
            ),
            array(
              'key' => 'field_5d49trtt2f1b2',
              'label' => 'Copyright',
              'name' => static::FOOTER_COPYRIGHT,
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
          ),
          'location'              => array(
            array(
              array(
                'param'    => 'options_page',
                'operator' => '==',
                'value'    => static::THEME_OPTIONS_SLUG,
              ),
            ),
          ),
          'menu_order'            => 0,
          'position'              => 'normal',
          'style'                 => 'default',
          'label_placement'       => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen'        => '',
          'active'                => 1,
          'description'           => '',
        )
      );
    }
  }
}
