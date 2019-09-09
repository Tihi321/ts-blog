<?php
/**
 * Grid Article
 *
 * @package TS_Blog\Views\Listing\Articles
 */

$image = [
  'image' => '',
];

$class_name = 'article-grid';

$post_date = get_the_date();
?>
<article class="<?php echo esc_attr( "{$class_name}__item" ); ?>">
  <a class="<?php echo esc_attr( "{$class_name}__image" ); ?>" href="<?php the_permalink(); ?>" style="background-image:url(<?php echo esc_url( $image['image'] ); ?>)"></a>
  <header class="<?php echo esc_attr( "{$class_name}__content" ); ?>">
    <div class="<?php echo esc_attr( "{$class_name}__meta" ); ?>">
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
  <?php require locate_template( 'views/parts/google-rich-snippets.php' ); ?>
</article>
