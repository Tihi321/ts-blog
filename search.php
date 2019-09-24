<?php
/**
 * Display search page
 *
 * @package TS_Blog
 *
 * @since 1.0.0
 */

get_header();

if ( have_posts() ) {
    $hero_template = locate_template( 'src/blocks/layout/hero/hero.php' );

  if ( ! empty( $hero_template ) ) {
    include $hero_template;
  }

  ?>
  <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <section class="article-list">
  <?php

  while ( have_posts() ) {
    the_post();
    get_template_part( 'src/blocks/layout/listing/components/list/list.php' );
  }
  ?>
  </section>
  <?php
    the_posts_pagination(
      array(
        'screen_reader_text' => esc_html__( 'Pagination', 'ts-blog' ),
      )
    );
  ?>
</div>
  <?php
} else {

  $hero_template = locate_template( 'src/blocks/layout/hero/hero.php' );

  if ( ! empty( $hero_template ) ) {
    include $hero_template;
  }

  get_template_part( 'src/blocks/layout/listing/components/empty/empty' );

};

get_footer();


