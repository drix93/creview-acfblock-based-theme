<?php

/**
 * Recent News + Ad Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'recent-news-ad-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'recent-news-ad-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
$ad_image = get_field( 'ad_image' ) ? wp_get_attachment_image(get_field( 'ad_image' ), 'full'): '<img src="https://via.placeholder.com/300x534/?text=Fall+Back+Ad+Image" alt="Fall Back Ad Image">';

$bgProperties = 'no-repeat center/cover';
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> position-relative">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bg-text d-print-none">NEWS</div>
            </div>
        </div>
        <div class="row">

            <?php $recentNews = wp_get_recent_posts(array('numberposts' => 2,'post_status' => 'publish')); ?>

            <?php 
            foreach($recentNews as $news) :
                
            $news_image = get_the_post_thumbnail($news['ID']) ? get_the_post_thumbnail($news['ID'], 'general', array('class' => '')) : '<img src="/wp-content/uploads/fallback-general-image.jpg" alt="News Sample Image">';
            ?>

            <div
                class="news-item col-12 col-sm-6 col-lg d-sm-flex justify-content-sm-center justify-content-lg-between mb-4 mb-lg-0">
                <div class="wrap mx-auto mx-sm-0">
                    <a href="<?= get_the_permalink($news['ID']); ?>">
                        <?= $news_image; ?>
                    </a>
                    <div class="content px-3 pt-4 pb-5">
                        <a href="<?= get_the_permalink($news['ID']); ?>">
                            <h3 class="pr-5 mb-4"><?= trim_char($news['post_title'], 0, 35, '...'); ?></h3>
                        </a>
                        <p>
                            <?= trim_char($news['post_content'], 0, 220, '...'); ?>
                        </p>
                        <a class="d-block" href="<?= get_the_permalink($news['ID']); ?>">Read More</a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

            <div class="ad pl-lg-0 d-flex justify-content-center">
                <div class="wrap">
                    <a href="<?php the_field('ad_link'); ?>"><?= $ad_image; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>