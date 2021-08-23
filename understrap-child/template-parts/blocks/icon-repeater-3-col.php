<?php

/**
 * Icon Repeater - 3 Columns Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'icon-repeater-3-col-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'icon-repeater-3-col-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <div class="container px-0">
                    <div class="row">

                        <?php foreach(get_field( 'icon_repeater_3_col' ) as $key => $iconSet) : ?>

                        <div class="col-sm-6 col-md-4 mb-4 text-center px-lg-4">
                            <div class="wrap px-md-2">
                                <?= wp_get_attachment_image($iconSet['image'] ?: 3732,'full', null, array('class' => 'mb-2'));?>
                                <h3><?= $iconSet['title'] ?: 'Title';?></h3>
                                <?= $iconSet['body'] ?: '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>'; ?>
                            </div>
                        </div>

                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>