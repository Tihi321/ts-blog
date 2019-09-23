<?php
/**
 * Main header bar
 *
 * @package TS_Blog\Views\Header
 *
 * @since 1.0.0
 */

use TS_Blog\Plugins\Acf\Theme_Options;

$accent_color = get_field( Theme_Options::BLOG_ACCENT_COLOR_FILED, 'option' );

?>
<header class="header js-header" data-accent-color="<?php echo esc_attr( $accent_color ); ?>"></header>
