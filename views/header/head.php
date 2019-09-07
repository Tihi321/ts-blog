<?php
/**
 * Head section for meta data
 *
 * @package TS_Blog\Views\Header\Head
 *
 * @since 1.0.0
 *
 * TODO: Add favicons.
 */

use TS_Blog\Assets\Manifest_Helper;

$logo_img = Manifest_Helper::get_assets_manifest_item( 'logo.svg' );
$favicon  = Manifest_Helper::get_assets_manifest_item( 'logo.svg' );

use TS_Blog\Plugins\Acf\Theme_Options;

$accent_color = get_field( Theme_Options::BLOG_ACCENT_COLOR_FILED, 'option' );
?>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!-- Responsive -->
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<!-- Remove IE's ability to use compatibility mode -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- Correct type -->
<meta http-equiv="Content-type" content="text/html; charset=utf-8">

<!-- Disable phone formatin on safari -->
<meta name="format-detection" content="telephone=no">

<!-- Speed up fetching of external assets -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//ajax.googleapis.com">
<link rel="dns-prefetch" href="//www.google-analytics.com">

<!-- Mobile chrome -->
<meta name="theme-color" content="#900000">

<!-- Win phone Meta -->
<meta name="application-name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>
<meta name="msapplication-TileColor" content="#900000"/>

<!-- Apple -->
<meta name="apple-mobile-web-app-title" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="#C3151B">
<link rel="apple-touch-startup-image" href="<?php echo esc_url( $logo_img ); ?>">

<!-- General -->
<link rel="shortcut icon" href="<?php echo esc_url( $favicon ); ?>" />

<style>
  :root {
    --accent-color: <?php echo esc_html( $accent_color ); ?>;
  }
</style>

<?php
get_template_part( 'views/tracking/head' );
