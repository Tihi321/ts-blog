<?php
/**
 * Main header bar
 *
 * @package TS_Blog\Views\Header
 *
 * @since 1.0.0
 */

use TS_Blog\Admin\Menu\Menu;
use TS_Blog\Assets\Manifest_Helper;

$main_menu        = new Menu();
$blog_name        = get_bloginfo( 'name' );
$blog_description = get_bloginfo( 'description' );
$header_logo_info = $blog_name . ' - ' . $blog_description;
$logo_img         = Manifest_Helper::get_assets_manifest_item( 'logo.svg' );

?>
<div class="header">
  <a class="header__logo-link" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $blog_name ); ?>">
    <img class="header__logo-img" src="<?php echo esc_url( $logo_img ); ?>" title="<?php echo esc_attr( $header_logo_info ); ?>" alt="<?php echo esc_attr( $header_logo_info ); ?>" />
  </a>
  <?php
    echo esc_html( $main_menu->bem_menu( 'main_nav', 'main-navigation' ) );

    get_template_part( 'views/header/search', 'form' );
  ?>
</div>
