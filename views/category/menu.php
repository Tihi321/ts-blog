<?php
/**
 * Category menu links
 *
 * @package TS_Blog\Views\Category
 */

$categories = get_categories();
?>

<div class="category-menu blog-list__container">
  <h3 class="category-menu__title category-menu__title--desktop">
  <?php esc_html_e( 'Categories', 'ts-blog' ); ?>
  </h3>
  <div class="category-menu__items-wrap">
    <div class="category-menu__items js-category-menu">
      <?php
        $blog_page = get_post_type_archive_link( 'post' );
        $active    = ( is_home() ) ? ' active-category' : '';
      ?>
      <a class="category-menu__item<?php echo esc_attr( $active ); ?>" href="<?php echo esc_url( $blog_page ); ?>">
      <?php esc_html_e( 'All', 'ts-blog' ); ?>
      </a>
      <?php
      if ( ! empty( $categories ) ) {
        foreach ( $categories as $item ) {
          if ( $item->term_id === 1 ) {
            continue; // uncategorized category skip.
          }

          $category_item_template = locate_template( 'views/category/parts/item.php' );

          if ( ! empty( $category_item_template ) ) {
            include $category_item_template;
          }
        }
      }
      ?>
    </div>
  </div>
  <div class="search">
  <?php
    $search_template = locate_template( 'views/header/search-form.php' );

  if ( ! empty( $search_template ) ) {
    include $search_template;
  }
  ?>
  </div>
</div>
