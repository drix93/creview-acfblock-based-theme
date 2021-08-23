<?php

/**
 * Footer CTA Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'footer-cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'footer-cta-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 

// Load values and assigning defaults.
$heading = get_field( 'heading' ) ?: 'Call To Action';
$body = get_field( 'body' ) ?: '<p>Paragraph text here. Pellentesque sed libero sed odio laoreet finibus. Vestibulum elementum tincidunt tincidunt. Quisque pellentesque augue quis efficitur aliquet. Mauris at massa at massa maximus ullamcorper sed nec ante. Aliquam erat volutpa.</p>';
$bg_img = get_field( 'bg_img' ) ?: '/wp-content/uploads/CTA-3lines-2.jpg';
$button = get_field( 'button' );

$className.= !get_field( 'no_shadow' ) ? ' has-shadow' : '';
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> d-print-none">
    <div class="container">
        <div class="row">

            <div class="col-12 <?= $awards_area ? 'col-md-8 pb-3 pb-md-0' : 'col-md-8'; ?>">
                <h2 class="mb-1 has-span"><span><?= $heading; ?></span></h2>
                <?= make_clickable($body); ?>
                <?php
                if( $button ): 
                $button_target = $button['target'] ?: '_self';
                ?>
                <a class="btn btn-primary mt-4" href="<?= esc_url($button['url']); ?>"
                    target="<?= esc_attr($button_target); ?>"><?= esc_html($button['title']); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.footer-cta-block {
    background-image: url(<?= $bg_img;?>);
}
</style>