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
$bg_text = get_field( 'bg_text' );
$bg_img = get_field( 'bg_img' ) ?: '/wp-content/uploads/header-file-working.jpg';
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="header<?= !$bg_text ? ' no-bg-text' : ''; ?>">
        <div class="container py-5">
            <div class="row py-3 my-4">
                <div class="offset-md-1 col-sm-8 col-md-6 col-lg-5 pr-xl-5 my-1">
                    <h1 class="mb-0"><?= $heading; ?></h1>
                </div>
            </div>
        </div>
    </div>

    <?php if($bg_text) : ?>
    <div class="container bg-heading">
        <div class="row">
            <div class="col">
                <div class="bg-text"><?= $bg_text; ?></div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>


<style type="text/css">
.intro-header-block .header {
    background-image: url(<?= $bg_img;?>);
}
</style>