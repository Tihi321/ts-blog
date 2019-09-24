<?php
/**
 * Grid Article
 *
 * @package TS_Blog\Layout\Listing\Articles
 */

$class_name = 'article-grid';

$image     = apply_filters( 'tsb_get_post_image', 'card' );
$post_date = get_the_date();

?>
<article class="<?php echo esc_attr( "{$class_name}__item" ); ?>">
  <a class="<?php echo esc_attr( "{$class_name}__image" ); ?>" href="<?php the_permalink(); ?>" style="background-image:url(<?php echo esc_url( $image['url'] ); ?>)"></a>
  <header class="<?php echo esc_attr( "{$class_name}__content" ); ?>">
    <div class="<?php echo esc_attr( "{$class_name}__meta" ); ?>">
      <?php
      $grid_categories_template = locate_template( 'src/blocks/layout/category/components/categories/categories.php' );

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
    <h2 class="<?php echo esc_attr( "{$class_name}__heading" ); ?>">
      <a class="<?php echo esc_attr( "{$class_name}__heading-link" ); ?>" href="<?php the_permalink(); ?>">
        <?php esc_html( the_title() ); ?>
      </a>
    </h2>
  </header>
  <?php require locate_template( 'src/blocks/components/google-rich-snippets/google-rich-snippets.php' ); ?>
</article>
