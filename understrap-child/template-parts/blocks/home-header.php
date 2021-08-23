<?php

/**
 * Home Header Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'home-header-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home-header-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
$heading = get_field( 'heading' ) ?: 'Sample,<br>Heading,<br>Here.';
$bg_img = get_field( 'bg_img' ) ?: '/wp-content/uploads/samplebg.jpg';

for($a = 0; $a < 4; $a++) :
    $cta_img[$a] = get_field( 'bg_'.$a )?: '/wp-content/uploads/samplebg.jpg';
    $cta_link[$a] = get_field( 'link_'.$a )['url'] ?: '#';
    $cta_title[$a] = get_field( 'link_'.$a )['title'] ?: 'CTA Title';
    $cta_target[$a] = get_field( 'link_'.$a )['target'] ?: '_self';
endfor;

?>

<div id="<?= esc_attr($id); ?>" class="home-header d-print-none">
    <div class="<?= esc_attr($className); ?> d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-6 col-lg-5 py-5">
                    <h1 class="mb-0"><?= $heading; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container ctas">
        <div class="row">
            <?php for($b = 0; $b < 4; $b++) : ?>
            <div class="cta-block col-sm-6 col-lg-3 mb-3 mb-lg-0">
                <div class="col d-flex align-items-end pb-2">
                    <hr>
                    <a class="stretched-link" href="<?= esc_url($cta_link[$b]); ?>"
                        target="<?= esc_attr($cta_target[$b]); ?>"><?= esc_html($cta_title[$b]); ?></a>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<style type="text/css">
.home-header-block {
    background-image: url(<?= $bg_img;?>);
}

<?php for($c=0; $c < 4; $c++) : ?>
.ctas .cta-block:nth-child(<?=$c + 1;?>) div {
    background: -moz-linear-gradient(top, rgba(51, 51, 51, 0) 20%, rgba(51, 51, 51, .90) 80%), url(<?= $cta_img[$c];?>);
    background: -webkit-linear-gradient(top, rgba(51, 51, 51, 0) 20%, rgba(51, 51, 51, .90) 80%), url(<?= $cta_img[$c];?>);
    background: linear-gradient(to bottom, rgba(51, 51, 51, 0) 20%, rgba(51, 51, 51, .90) 80%), url(<?= $cta_img[$c];?>);
}

<?php endfor;

?>
</style>