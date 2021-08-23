<?php

/**
 * ENews + Subscribe Form Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'enews-sub-form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'enews-sub-form-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$formHTML = get_field( 'form_html' );

?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div id="sub-form" class="bg-offwhite py-5 d-print-none">
        <div class="container py-3">
            <div class="row align-items-center">
                <div class="col-md-5 mb-3 mb-md-0 pr-md-5">
                    <h2 class="mb-2"><?= get_field( 'form_heading' ); ?></h2>
                    <div class="pr-md-3">
                        <?= get_field( 'body' ); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container px-0">
                        <?= $formHTML; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="enews" class="py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2><?= get_field('enews_heading'); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>