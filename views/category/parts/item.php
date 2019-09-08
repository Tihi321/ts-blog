<?php
/**
 * Category menu links
 *
 * @package TS_Blog\Views\Category\Parts
 */

$category_url    = get_category_link( $item->term_id );
$active_category = ( isset( $page_category ) && $page_category->term_id === $item->term_id ) ? ' active-category' : '';

?>

<a class="category-menu__item<?php echo esc_attr( $active_category ); ?>" href="<?php echo esc_url( $category_url ); ?>">
  <?php
    echo esc_html( $item->name );
  ?>
</a>
