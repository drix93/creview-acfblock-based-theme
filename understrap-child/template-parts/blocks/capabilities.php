<?php

/**
 * Capabilities Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'capabilities-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'capabilities-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container px-0">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <div class="container">
                    <div class="row">

                        <?php
                        $box = [];
                        $odd_box = get_field( 'odd_box' );
                        $odd_bg = get_field( 'odd_bg' );
                        for($i = 0; $i < 7; $i++):
                            // Load values and assigning defaults.
                            $box[$i] = get_field( 'box_'.($i+1) );
                        ?>
                        <div class="cap-item col-12 col-sm-6 col-lg-4 mb-4">
                            <div class="wrap d-flex justify-content-center align-items-center text-center">
                                <a class="stretched-link" href="<?= $box[$i]['link']['url']; ?>"
                                    target="<?= $box[$i]['link']['target']; ?>">
                                    <div class="box">
                                        <?= wp_get_attachment_image($box[$i]['icon'], 'full'); ?>
                                        <h3 class="mt-2"><?= $box[$i]['title']; ?></h3>
                                        <span class="btn btn-third"><?= $box[$i]['link']['title']; ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endfor;?>

                        <div class="cap-item col-12 col-sm-6 col-lg-8 mb-4">
                            <div class="wrap" style="background-image: url(<?= $odd_bg ; ?> )">
                                <div class="overlay h-100 d-flex justify-content-center align-items-center text-center p-3 p-sm-1 p-md-3">
                                    <div class="box">
                                        <h3><?= $odd_box; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>