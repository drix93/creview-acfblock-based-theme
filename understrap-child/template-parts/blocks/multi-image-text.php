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
$id = 'multi-image-text-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'multi-image-text-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
$multiGroup = get_field( 'multi_imgtext' );
$last_key = end(array_keys($multiGroup));
$narrow = get_field( 'make_narrow' );
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <?php foreach($multiGroup as $key => $multiItem) : ?>
            <?php $biggerImg = $multiItem['img_size']; ?>
            <div
                class="<?= $narrow && $key % 2 == 0 ? 'offset-md-1 ' : ''; ?><?= $narrow ? 'col-md-5' : 'col-md-6'; ?> px-0<?= $key == $last_key ? '' : ' mb-4 mb-md-3 pb-2'; ?>">
                <div class="container">
                    <div class="row">
                        <div class="image col-md-3 col-xl-2<?= $biggerImg ? ' pr-md-1' : ''; ?>">
                            <?= wp_get_attachment_image(($multiItem['img'] ?: 453), 'full', false, array('class' => 'mb-4 mb-md-0')); ?>
                        </div>
                        <div class="content col-md-9 col-xl-10">
                            <h3 class="mb-1"><?= $multiItem['title']; ?></h3>
                            <?= $multiItem['body']; ?>
                            <?php
                            $button = $multiItem['button'];
                            if( $button ): 
                                $button_target = $button['target'] ?: '_self';
                            ?>
                            <a class="btn btn-third" href="<?= esc_url($button['url']); ?>"
                                target="<?= esc_attr($button_target); ?>"><?= esc_html($button['title']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>