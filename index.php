<?php
/**
 * Display regular index/home page
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
  <section class="article-grid">
  <?php

  while ( have_posts() ) {
    the_post();
    get_template_part( 'views/listing/articles/grid' );
  }

  the_posts_pagination(
    array(
      'screen_reader_text' => esc_html__( 'Pagination', 'ts-blog' ),
    )
  );

  ?>
</section>
  <?php
} else {

  get_template_part( 'views/listing/articles/empty' );

};

get_footer();


