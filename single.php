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
  $hero_template = locate_template( 'views/hero/hero.php' );

  if ( ! empty( $hero_template ) ) {
    include $hero_template;
  }

  ?>
  <section class="single__content">
  <?php
  while ( have_posts() ) {
    the_post();
    the_content();
  }

  ?>
  </section>
  <?php

  require locate_template( 'views/parts/google-rich-snippets.php' );
}

get_footer();
