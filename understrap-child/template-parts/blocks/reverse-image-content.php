<?php

/**
 * Reversible Image Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'rev-image-content-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'rev-image-content-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$revSides = get_field( 'reverse_layout' );
$smallSides = get_field( 'smaller_layout' );
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">

        <?php if ( have_rows('rev_image_content') ) : ?>
        <?php $i = 1; ?>
        <?php while( have_rows('rev_image_content') ) : the_row(); ?>

        <div class="row">
            <?php $switch = $revSides ? $i % 2 != 0 : $i % 2 == 0; ?>

            <div
                class="<?= $switch ? 'order-md-1 ' : 'offset-md-1 ';?>col-md-<?= $smallSides ? '3 col-xl-4 basis-1' : '4'; ?> mb-2 mb-md-0">
                <?php $bg_img = get_sub_field( 'image' ) ?: 6803; ?>
                <?php $bg_img_2 = get_sub_field( 'image_2' ); ?>
                <?php $imglink[0] = get_sub_field( 'imglink_1' ); ?>
                <?php $imglink[1] = get_sub_field( 'imglink_2' ); ?>

                <?php if($imglink[0]['url']) : ?>
                <a href="<?= $imglink[0]['url'] ; ?>" target="<?= $imglink[0]['target'] ; ?>">
                    <?php endif; ?>
                    <?= wp_get_attachment_image($bg_img, 'full'); ?>
                    <?php if($imglink[0]['url']) : ?>
                </a>
                <?php endif; ?>

                <?php if($imglink[1]['url']) : ?>
                <a href="<?= $imglink[1]['url'] ; ?>" target="<?= $imglink[1]['target'] ; ?>">
                    <?php endif; ?>
                    <?= $bg_img_2 ? wp_get_attachment_image($bg_img_2, 'full', null, array('class' => 'mt-2')) : ''; ?>
                    <?php if($imglink[1]['url']) : ?>
                </a>
                <?php endif; ?>
            </div>

            <div class="<?= $switch ? 'offset-md-1 ' : '';?>col-md-<?= $smallSides ? '7 basis-2' : '6'; ?>">
                <?php
                the_sub_field( 'body' );
                $button = get_sub_field( 'button' );
                if( $button ): $button_target = $button['target'] ?: '_self';
                ?>
                <a class="btn btn-primary mt-2" href="<?= esc_url($button['url']); ?>"
                    target="<?= esc_attr($button_target); ?>"><?= esc_html($button['title']); ?></a>
                <?php endif; ?>
            </div>

        </div>

        <?php $i++; ?>
        <?php endwhile; ?>
        <?php endif; ?>

    </div>
</div>