<?php
/**
 * List of single post categories
 *
 * @package TS_Blog\Layout\Hero\Parts
 */

$categories_class_name = 'category-menu-single';

?>

<div class="<?php echo esc_attr( $categories_class_name ); ?>">
<?php
$hero_categories_template = locate_template( 'src/blocks/layout/category/parts/categories.php' );

if ( ! empty( $hero_categories_template ) ) {
  include $hero_categories_template;
}
?>
</div>
