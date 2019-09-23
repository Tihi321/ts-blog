<?php
/**
 * List Simple Article
 *
 * @package TS_Blog\Layout\Listing\Articles
 */

$class_name = 'article-list';

$post_date = get_the_date();
$excerpt   = apply_filters( 'tsb_get_excerpt', 250 );

?>
<article class="<?php echo esc_attr( "{$class_name}__item" ); ?>">
  <header class="<?php echo esc_attr( "{$class_name}__header" ); ?>">
    <h2 class="<?php echo esc_attr( "{$class_name}__heading" ); ?>">
      <a class="<?php echo esc_attr( "{$class_name}__heading-link" ); ?>" href="<?php the_permalink(); ?>">
      <?php esc_html( the_title() ); ?>
      </a>
    </h2>
    <div class="<?php echo esc_attr( "{$class_name}__meta" ); ?>">
      <?php
      $grid_categories_template = locate_template( 'src/blocks/layout/category/parts/categories.php' );

      if ( ! empty( $grid_categories_template ) ) {
        include $grid_categories_template;
      }
      ?>
      <span class="<?php echo esc_attr( "{$class_name}__date" ); ?>">
        <?php
          echo esc_html( $post_date );
        ?>
      </span>
    </div>
  </header>
  <div class="<?php echo esc_attr( "{$class_name}__excerpt" ); ?>">
    <?php echo esc_html( $excerpt ); ?>
  </div>
  <?php require locate_template( 'src/blocks/components/google-rich-snippets/google-rich-snippets.php' ); ?>
</article>
