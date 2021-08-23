<?php

/**
 * Icons - 6 Column Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'icons-six-col-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'icons-six-col-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
$bg_txt = get_field( 'bg_text' );
$bg_img = get_field( 'bg_img' );
?>

<div id="<?= esc_attr($id); ?>"
    class="<?= esc_attr($className); ?> pb-4<?= $bg_img ? ' has-bg' : ''; ?><?= $bg_txt ? ' has-bg-text' : ''; ?>"
    <?= $bg_img ? ' style="background-image: url('.$bg_img.');"' : ''; ?>>
    <?php if($bg_txt) : ?>
    <div class="container">
        <div class="row">
            <div class="col pt-4 mt-2">
                <div class="bg-text d-print-none"><?= $bg_txt; ?></div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="container px-md-5 pb-3">
        <div class="row">

            <?php $iconLink = []; ?>

            <div class="col-12 text-center icons d-flex align-items-center justify-content-between">
                <?php for($a = 1; $a <= 6; $a++) : ?>
                <?php $iconLink[$a-1] = get_field( 'icon_link_'.$a ); ?>

                <div class="item mb-lg-0 text-center">
                    <?= $iconLink[$a-1] ? '<a href="'.$iconLink[$a-1]['url'].'" target="'.$iconLink[$a-1]['target'].'">' : ''; ?>
                    <?= wp_get_attachment_image(get_field('icon_'.$a) ?: 454, 'full', false, array('class' => 'mb-3')); ?>
                    <h4><?= get_field('icon_title_'.$a); ?></h4>
                    <?= $iconLink[$a-1] ? '</a>' : ''; ?>
                </div>

                <?php endfor; ?>
            </div>

        </div>
    </div>
</div>