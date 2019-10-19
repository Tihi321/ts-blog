<?php
/**
 * Share tamplate for hero
 *
 * @package TS_Blog\Layout\Hero\Parts
 */

$share_class_name = 'share';

$title     = get_the_title();
$permalink = get_the_permalink();
?>

<div class="<?php echo esc_attr( $share_class_name ); ?>">
  <h3 class="<?php echo esc_attr( "{$share_class_name}__title" ); ?>"><?php echo esc_html__( 'Share', 'ts-blog' ); ?></h3>
  <div class="<?php echo esc_attr( "{$share_class_name}__icons" ); ?>">
    <a class="<?php echo esc_attr( "icon--facebook {$share_class_name}__icon" ); ?>" url="<?php echo esc_url( "https://www.facebook.com/sharer/sharer.php?u={$permalink}" ); ?>">
    </a>
    <a class="<?php echo esc_attr( "icon--twitter {$share_class_name}__icon" ); ?>" url="<?php echo esc_url( "https://twitter.com/intent/tweet?original_referer={$permalink}&amp;text={$title}%20-%20" ); ?>">
    </a>
    <a class="<?php echo esc_attr( "icon--linkedin {$share_class_name}__icon" ); ?>" url="<?php echo esc_url( "https://www.linkedin.com/shareArticle?mini=true&url={$permalink}&title={$title}&amp;url={$permalink}" ); ?>">
    </a>
    <button class="<?php echo esc_attr( "icon--link {$share_class_name}__icon {$share_class_name}__url js-{$share_class_name}-url" ); ?>">
    </button>
  </div>
</div>
