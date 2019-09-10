<?php
/**
 * Category menu links
 *
 * @package TS_Blog\Views\Category
 */

$class_name      = 'category-menu';
$is_active_class = 'is-active';
$categories      = get_categories();

?>

<div class="<?php echo esc_attr( $class_name ); ?>">
  <div class="<?php echo esc_attr( "{$class_name}__items" ); ?>">
    <?php
      $blog_page = get_post_type_archive_link( 'post' );
      $active    = ( is_home() ) ? " {$is_active_class}" : '';
    ?>
    <a class="<?php echo esc_attr( "{$class_name}__item" ); ?><?php echo esc_attr( $active ); ?>" href="<?php echo esc_url( $blog_page ); ?>">
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
  <div class="<?php echo esc_attr( "{$class_name}__search" ); ?>">
  <?php
    $search_template = locate_template( 'views/header/search-form.php' );

  if ( ! empty( $search_template ) ) {
    include $search_template;
  }
  ?>
  </div>
</div>
