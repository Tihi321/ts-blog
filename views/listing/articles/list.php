<?php
/**
 * List Simple Article
 *
 * @package TS_Blog\Views\Listing\Articles
 */

$class_name = 'article-list';

$post_date = get_the_date();

$excerpt = apply_filters( 'tsb_get_excerpt', 250 );

?>
<article class="<?php echo esc_attr( "{$class_name}__item" ); ?>">
  <header class="<?php echo esc_attr( "{$class_name}__header" ); ?>">
    <h2 cclass="<?php echo esc_attr( "{$class_name}__heading" ); ?>">
      <a class="<?php echo esc_attr( "{$class_name}__heading-link" ); ?>" href="<?php the_permalink(); ?>">
      <?php esc_html( the_title() ); ?>
      </a>
    </h2>
    <div class="<?php echo esc_attr( "{$class_name}__meta" ); ?>">
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
  <?php require locate_template( 'views/parts/google-rich-snippets.php' ); ?>
</article>
