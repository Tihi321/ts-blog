<?php
/**
 * Single page for Posts
 *
 * @package TS_Blog
 *
 * @since 1.0.0
 */

get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    the_title();
    the_content();
  }

  require locate_template( 'views/parts/google-rich-snippets.php' );
}

get_footer();
