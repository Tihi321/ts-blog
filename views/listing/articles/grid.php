<?php
/**
 * Grid Article
 *
 * @package TS_Blog\Views\Listing\Articles
 */

$image = [
  'image' => '',
];

$post_date = get_the_date();
?>
<article class="article-grid__item">
  <a class="article-grid__image" href="<?php the_permalink(); ?>" style="background-image:url(<?php echo esc_url( $image['image'] ); ?>)"></a>
  <div class="article-grid__content">
    <header>
      <h2 class="article-grid__heading">
        <a class="article-grid__heading-link" href="<?php the_permalink(); ?>">
          <?php esc_html( the_title() ); ?>
        </a>
      </h2>
      <div class="article-grid__meta">
        <span class="article-grid__date">
          <?php
            echo esc_html( $post_date );
          ?>
        </span>
      </div>
    </header>
  </div>
  <?php require locate_template( 'views/parts/google-rich-snippets.php' ); ?>
</article>
