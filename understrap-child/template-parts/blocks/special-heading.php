<?php

/**
 * Special Heading Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'special-heading-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'special-heading-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
$heading = get_field( 'heading' ) ?: 'Heading';
$bg_txt = get_field( 'bg_txt' );
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <h2>
        <span><?= $heading; ?></span>
        <?php if($bg_txt) : ?>
        <div class="bg-text d-print-none"><?= $bg_txt; ?></div>
        <?php endif; ?>
    </h2>
</div>