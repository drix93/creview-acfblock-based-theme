<?php

/**
 * Gallery Modal Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'gallery-modal-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gallery-modal-slider-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
if (get_field( 'use_news' )) {
    $latest_posts = get_posts(array('numberposts' => 10));
    foreach($latest_posts as $postKey => $post_item) {
        $slides[$postKey]['image'] = get_post_thumbnail_id($post_item->ID);
        $slides[$postKey]['slide_type'] = 'img';
        $slides[$postKey]['title'] = get_the_title($slides[$postKey]['image']);
    }
} else {
    $slides = get_field( 'slides' );
}
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 slider-header mb-4 pb-2">
                <h2 class="mb-3 mb-sm-0"><?= get_field( 'heading' ); ?></h2>
                <div class="slider-nav">
                    <div class="pagination"></div>
                </div>
            </div>

            <div class="col-12 gallery-modal-slider">

                <?php foreach($slides as $slideKey => $slide) : ?>

                <?php $imgSRC = wp_get_attachment_image_src($slide['slide_type'] == 'img' ? $slide['image'] : $slide['vid_thumb'], 'video-thumb'); ?>
                <?php $slideModal[$slideKey] = $slide; ?>
                <?php $slideTarget[$slideKey] = esc_attr($block['id']) . '-slide-' . $slideKey; ?>

                <div class="slide" data-toggle="modal" data-target="#<?= $slideTarget[$slideKey]; ?>">
                    <div class="thumb <?= $slide['slide_type'];?> mb-3" style="background-image: url(<?= $imgSRC[0]; ?>)">
                        <?= $slide['slide_type'] == 'vid' ? '<div class="overlay"></div>' : ''; ?>
                        <?= wp_get_attachment_image($slide['slide_type'] == 'img' ? $slide['image'] : $slide['vid_thumb'], 'video-thumb', "", array('class'=>'d-none d-sm-block')); ?>
                    </div>
                    <h3 class="title"><?= $slide['title']; ?></h3>
                </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>

<?php foreach($slideModal as $modalKey => $modal) : ?>
<!-- Modal #<?= $slideTarget[$modalKey]; ?> -->
<div class="modal fade <?= $modal['slide_type']; ?> gallery-modal-slider-block-modal"
    id="<?= $slideTarget[$modalKey]; ?>" tabindex="-1" role="dialog"
    aria-labelledby="<?= $slideTarget[$modalKey]; ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="<?= $slideTarget[$modalKey]; ?>Label"><?= $modal['title']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if($modal['slide_type'] == 'img')
                    echo wp_get_attachment_image($modal['image'], 'full', null, array('class' => 'w-100 h-100'));
                    else {
                        echo '<div class="embed-responsive embed-responsive-16by9">';
                        echo $modal['video_link'];
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>