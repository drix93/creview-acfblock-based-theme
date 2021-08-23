<?php

/**
 * News Feed Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'news-feed-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'news-feed-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$feedCategory = get_field( 'feed_category' );

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

query_posts( array(
    'cat' => $feedCategory,
    'paged' => $paged,
) );
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container pb-5">
        <div class="row pb-3">
            <div class="col-12 pt-2" id="main">

                <?php if ( have_posts() ) : ?>

                <?php $i = 1; ?>
                <?php /* Start the Loop */ ?>

                <?php while ( have_posts() ) : the_post(); ?>

                <div id="post-<?= esc_attr(get_the_ID()); ?>" class="post-item">
                    <div class="container px-0">

                        <div class="row">

                            <div class="<?= $i % 2 == 0 ? 'order-md-1 ' : 'offset-md-1 ';?>col-md-4 mb-2 mb-md-0">
                                <?= get_the_post_thumbnail(get_the_ID(), 'general'); ?>
                            </div>

                            <div class="<?= $i % 2 == 0 ? 'offset-md-1 ' : '';?>col-md-6">
                                <?php the_title('<h3>', '</h3>'); ?>
                                <h6 class="post-date mb-4">
                                    <?= get_the_date(); ?>
                                </h6>
                                <p><?= trim_words(strip_tags(get_the_content()),38); ?></p>
                                <a class="btn btn-primary mt-2" href="<?= esc_url(get_the_permalink()); ?>"
                                    target="_self">Read
                                    More</a>
                            </div>

                        </div>

                        <?php $i++; ?>

                    </div>
                </div>

                <?php endwhile; ?>

                <?php else : ?>

                <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                <?php endif; ?>

            </div>

            <!-- The pagination component -->
            <div class="offset-md-1 col-12 col-md-10 d-flex justify-content-center mt-5">
                <?php understrap_pagination(); ?>
                <?php wp_reset_query(); ?>
            </div>


        </div>
    </div>
</div>