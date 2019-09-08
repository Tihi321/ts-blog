<?php
/**
 * List of post categories
 *
 * @package TS_Blog\Views\Hero\Parts
 */

$categories = get_the_category( get_the_ID() );
?>

<div class="category-menu blog-list__container">
  <h3 class="category-menu__title category-menu__title--desktop">
  <?php esc_html_e( 'Categories', 'ts-blog' ); ?>
  </h3>
  <div class="category-menu__items-wrap">
    <div class="category-menu__items js-category-menu">
      <?php
        $blog_page = get_post_type_archive_link( 'post' );
      ?>
      <a class="category-menu__item" href="<?php echo esc_url( $blog_page ); ?>">
      <?php esc_html_e( 'All', 'ts-blog' ); ?>
      </a>
      <?php
      if ( ! empty( $categories ) ) {
        foreach ( $categories as $item ) {
          if ( $item->term_id === 1 ) {
            continue; // uncategorized category skip.
          }

          $category_url = get_category_link( $item->term_id );
          ?>
          
          <a class="category-menu__item" href="<?php echo esc_url( $category_url ); ?>">
            <?php
              echo esc_html( $item->name );
            ?>
          </a>
          <?php
        }
      }
      ?>
    </div>
  </div>
</div>
