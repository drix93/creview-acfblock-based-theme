<?php

/**
 * Intro-Header Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'intro-header-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'intro-header-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
$heading = get_field( 'heading' ) ?: 'Heading';
$body = get_field( 'body' ) ?: 'Cras id tellus viverra, consequat elit sit amet, pulvinar lorem vel semper.';
$bg_img = get_field( 'bg_img' ) ?: '/wp-content/uploads/samplebg.jpg';
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container py-5">
        <div class="row py-3">
            <div class="col-sm-7 col-md-6 col-lg-5 pr-xl-5">
                <h1 class="mb-3"><?= $heading; ?></h1>
                <p>
                    <?= $body; ?>
                </p>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
.intro-header-block {
    background: -moz-linear-gradient(left, rgb(237, 237, 237) 30%, rgba(255, 255, 255, 0) 100%), url(<?= $bg_img;?>);
    background: -webkit-linear-gradient(left, rgb(237, 237, 237) 30%, rgba(255, 255, 255, 0) 100%), url(<?= $bg_img;?>);
    background: linear-gradient(to right, rgb(237, 237, 237) 30%, rgba(255, 255, 255, 0) 100%), url(<?= $bg_img;?>);
}

@media (max-width: 575px) {

    .intro-header-block {
        background: linear-gradient(rgba(237, 237, 237, <?= $bgOpacity = .95; ?>), rgba(237, 237, 237, <?= $bgOpacity; ?>)), url(<?= $bg_img;?>);
    }
}
</style>