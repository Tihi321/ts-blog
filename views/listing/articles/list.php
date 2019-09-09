<?php
/**
 * List Simple Article
 *
 * @package TS_Blog\Views\Listing\Articles
 */

$class_name = 'article-list';

$post_date = get_the_date();

?>
<article class="<?php echo esc_attr( "{$class_name}__item" ); ?>">
  <header class="<?php echo esc_attr( "{$class_name}__header" ); ?>">
    <div class="<?php echo esc_attr( "{$class_name}__meta" ); ?>">
      <span class="<?php echo esc_attr( "{$class_name}__date" ); ?>">
        <?php
          echo esc_html( $post_date );
        ?>
      </span>
    </div>
    <h2 cclass="<?php echo esc_attr( "{$class_name}__heading" ); ?>">
      <a class="<?php echo esc_attr( "{$class_name}__heading-link" ); ?>" href="<?php the_permalink(); ?>">
      <?php esc_html( the_title() ); ?>
      </a>
    </h2>
  </header>
  <div class="<?php echo esc_attr( "{$class_name}__excerpt" ); ?>">
    <?php the_excerpt(); ?>
  </div>
  <?php require locate_template( 'views/parts/google-rich-snippets.php' ); ?>
</article>
