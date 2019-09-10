<?php
/**
 * List of single post categories
 *
 * @package TS_Blog\Views\Hero\Parts
 */

$categories_class_name = 'category-menu-single';

?>

<div class="<?php echo esc_attr( $categories_class_name ); ?>">
<?php
$hero_categories_template = locate_template( 'views/category/parts/categories.php' );

if ( ! empty( $hero_categories_template ) ) {
  include $hero_categories_template;
}
?>
</div>
