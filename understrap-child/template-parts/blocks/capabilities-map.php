<?php

/**
 * Capabilities Map Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'capabilities-map-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'capabilities-map-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$mapItems = get_field( 'map_list' );
$last_key = end(array_keys($mapItems));
$numItems = count($mapItems);

$className .= ' ' . ($numItems % 3 == 0 ? 'three' : ($numItems % 3 == 2 ? 'two' : 'one'));
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">

            <?php foreach($mapItems as $key => $mapItem): ?>
            <?php
                $trueVal = $key + 1;
                $itemClass = '';
                if ($numItems <= 3 || $numItems % 3 == 0) {
                    $itemClass = $key == $last_key ? ' last-1' : ($key == ($last_key - 1) ? ' last-2' : ($key == ($last_key - 2) ? ' last-3' : ''));
                } elseif ($trueVal % 3 == 1 && ($key == ($last_key - 1))) {
                    $itemClass = ' last-2';
                } elseif ($trueVal % 3 == 2 && ($key == $last_key)) {
                    $itemClass = ' last-1';
                } elseif ($trueVal % 3 == 1 && ($key == $last_key)) {
                    $itemClass = ' last-1';
                }
                
                if ($trueVal % 3 == 2) {
                    $itemClass .= ' middle';
                }
            ?>
            <div
                <?= $mapItem['anchor'] ? 'id="'.$mapItem['anchor'].'" ' : ""; ?>class="cap-item col-md-6 col-lg-4<?= $itemClass; ?>">
                <div class="lead-content">
                    <h3 class="mb-3"><?= $mapItem['title']; ?></h3>
                    <p><?= trim_char($mapItem['body'], 0, 200, '...'); ?></p>
                    <div class="gradient"></div>
                </div>

                <div class="container item-content shadow-lg py-5">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <h3 class="title mb-4"><span><?= $mapItem['title']; ?></span></h3>
                            <?= $mapItem['body']; ?>
                            <?php
                            if($mapItem['link']) :
                                echo '<a class="btn btn-third blue mt-4" href="'.($mapItem['link']['url'] ?: '#').'" target="'.($mapItem['link']['target'] ?: '').'">'.($mapItem['link']['title'] ?: 'Learn More').'</a>';
                            endif;
                            ?>
                        </div>
                        <?php if($mapItem['image']) : ?>
                        <div class="col-md-5 pt-3 pt-md-0">
                            <?= wp_get_attachment_image($mapItem['image'], 'full'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>