<?php
/**
 * List of single post categories
 *
 * @package TS_Blog\Views\Hero\Parts
 */

$class_name = 'category-menu-single';
$categories = get_the_category( get_the_ID() );

?>

<div class="<?php echo esc_attr( $class_name ); ?>">
  <div class="<?php echo esc_attr( "{$class_name}__items" ); ?>">
    <?php
    if ( ! empty( $categories ) ) {
      foreach ( $categories as $item ) {
        if ( $item->term_id === 1 ) {
          continue; // uncategorized category skip.
        }

        $category_url = get_category_link( $item->term_id );
        ?>
        
        <a class="<?php echo esc_attr( "{$class_name}__item" ); ?>" href="<?php echo esc_url( $category_url ); ?>">
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
