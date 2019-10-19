<?php
/**
 * View for hero component
 *
 * @package TS_Blog\Layout\Hero
 *
 * @since 1.0.0
 */

 $class_name = 'hero';

?>
<header class="<?php echo esc_attr( "{$class_name}__outer" ); ?>">
  <button class="<?php echo esc_attr( "{$class_name}__hide-btn js-{$class_name}-hide-btn" ); ?>">
    <span class="<?php echo esc_attr( "{$class_name}__hide-text" ); ?>"><?php esc_html_e( 'Backdrop', 'ts-blog' ); ?></span>
    <svg class="<?php echo esc_attr( "{$class_name}__hide-icon js-{$class_name}-hide-icon" ); ?>" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50" /></svg>
  </button>
  <?php
  if ( is_single() || is_page() ) {
    ?>
    <div class="<?php echo esc_attr( "{$class_name}__inner" ); ?>">
    <?php
    $hero_single_template = locate_template( 'src/blocks/layout/hero/components/single/single.php' );

    if ( ! empty( $hero_single_template ) ) {
      include $hero_single_template;
    }
    ?>
    </div>
    <div class="<?php echo esc_attr( "{$class_name}__title-bar" ); ?>">
      <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?> <?php echo esc_attr( "{$class_name}__title-bar-inner" ); ?>">
        <div class="<?php echo esc_attr( "{$class_name}__title-outer" ); ?>">
          <h1 class="<?php echo esc_attr( "{$class_name}__title" ); ?>"><?php the_title(); ?></h1>
          <div class="<?php echo esc_attr( "{$class_name}__meta" ); ?>">
          <?php
          if ( is_single() ) {
            $post_categories = locate_template( 'src/blocks/layout/hero/components/post-categories/post-categories.php' );

            if ( ! empty( $post_categories ) ) {
              include $post_categories;
            }
          }
          ?>
          </div>
        </div>
        <div class="<?php echo esc_attr( "{$class_name}__share" ); ?>">
        <?php
        $share_template = locate_template( 'src/blocks/layout/hero/components/share/share.php' );

        if ( ! empty( $share_template ) ) {
          include $share_template;
        }
        ?>
        </div>
      </div>
    </div>
    <?php
  } else {
    ?>
    <div class="<?php echo esc_attr( "{$class_name}__inner" ); ?>">
    <?php
    $hero_listing_template = locate_template( 'src/blocks/layout/hero/components/listing/listing.php' );

    if ( ! empty( $hero_listing_template ) ) {
      include $hero_listing_template;
    }
    ?>
    </div>
    <div class="<?php echo esc_attr( "{$class_name}__listing-bar" ); ?>">
      <div class="<?php echo esc_attr( apply_filters( 'tsb_get_default_class', 'container' ) ); ?>">
    <?php
    $category_menu_template = locate_template( 'src/blocks/layout/category/menu.php' );

    if ( ! empty( $category_menu_template ) ) {
      include $category_menu_template;
    }
    ?>
      </div>
    </div>
    <?php
  }
  ?>
</header>
