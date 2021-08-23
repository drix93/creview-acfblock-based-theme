<?php

/**
 * Contact Form Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-form-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
$bg_img = get_field( 'bg_img' ) ?: '/wp-content/uploads/map-bg.jpg';
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> d-print-none">
    <section id="reach-out" style="background-image: url(<?= $bg_img; ?>);">
        <div class="container py-3">
            <div class="row align-items-center py-5">
                <div class="bg-text mt-5 mt-md-0 d-print-none"><?= get_field( 'bg_txt' ); ?></div>
                <div class="col-sm-12 col-md-5">
                    <h2 class="mb-2"><?= get_field( 'heading' ); ?></h2>
                    <p><?= get_field( 'body' ); ?></p>
                </div>
                <div class="col-sm-12 col-md-6 offset-md-1 contact-form pt-4 pt-md-0 pl-lg-5">
                    <?php echo do_shortcode( get_field( 'form_shortcode' ) ); ?>
                </div>
            </div>
        </div>
    </section>
</div>