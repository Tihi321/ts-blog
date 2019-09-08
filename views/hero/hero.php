<?php
/**
 * Main header bar
 *
 * @package TS_Blog\Views\Hero
 *
 * @since 1.0.0
 */

use TS_Blog\Plugins\Acf\Theme_Options;

$listing_image       = get_field( Theme_Options::LISTING_IMAGE, 'option' );
$listing_description = get_field( Theme_Options::LISTING_DESCRIPTION, 'option' );

$listing_image_url = $listing_image['url'] ?? '';

?>
    <header class="hero-class" >
      <button class="hide-description-class" >
        <span class="hide-description-text-class"><?php esc_html_e( 'Backdrop', 'ts-blog' ); ?></span>
        <svg class="hide-description-icon-class" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50" /></svg>
      </button>
      <?php
      if ( is_single() ) {
        ?>
        <div class="hero-class">
        <?php
        $hero_single_template = locate_template( 'views/hero/parts/single.php' );

        if ( ! empty( $hero_single_template ) ) {
          include $hero_single_template;
        }
        ?>
        </div>
        <?php
        $post_categories = locate_template( 'views/hero/parts/post-categories.php' );

        if ( ! empty( $post_categories ) ) {
          include $post_categories;
        }
      } else {
        ?>
        <div class="hero-class">
        <?php
        $hero_listing_template = locate_template( 'views/hero/parts/listing.php' );

        if ( ! empty( $hero_listing_template ) ) {
          include $hero_listing_template;
        }
        ?>
        </div>
        <?php
        $category_menu_template = locate_template( 'views/category/menu.php' );

        if ( ! empty( $category_menu_template ) ) {
          include $category_menu_template;
        }
      }
      ?>
    </header>
