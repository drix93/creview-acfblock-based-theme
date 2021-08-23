<?php

/**
 * Logo Columns Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'logo-columns-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'logo-columns-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$logoColumns = get_field( 'logo_columns' );
$makeNarrow = get_field( 'make_narrow' );
$logoSize = get_field( 'logo_size' );
$alignVertical = get_field( 'align_vertically' );

if(count($logoColumns) == 1) $classes = 'offset-md-4 col-md-4 mb-4 mb-md-0';
if(count($logoColumns) == 2) $classes = 'col-sm-6 mb-4 mb-sm-0';
if(count($logoColumns) == 3) $classes = 'col-sm-6 col-md-4 mb-4 mb-md-0';
if(count($logoColumns) == 4) $classes = 'col-sm-6 col-md-3 mb-4 mb-md-0';
if(count($logoColumns) == 5) $classes = 'col-sm-6 col-md-4 col-lg mb-4 mb-md-0';
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> logo-<?= $logoSize ?: 'default'; ?><?= $alignVertical ? ' align-vertical' : ''; ?>">
    <div class="container">
        <div class="row">
            <div class="<?= $makeNarrow ? 'offset-md-2 col-md-8' : 'offset-md-1 col-md-10'; ?>">
                <div class="container text-center px-0">
                    <div class="row">

                        <?php foreach($logoColumns as $key => $logoSet) : ?>

                        <div class="<?= $classes; ?>">
                            <?php if($logoSet['link_image']) : ?>
                            <a class="stretched-link" title="<?= get_imgAlt($logoSet['image'] ?: 3732); ?>" href="<?= $logoSet['link']['url'] ?: '#'; ?>" target="<?= $logoSet['link']['target'] ?: ''; ?>">
                                <?php endif; ?>
                                <?= wp_get_attachment_image($logoSet['image'] ?: 3732,'full', null, array('class' => ($logoSet['content'] || $logoSet['title'] ? 'mb-2 ': '').'logo-img'.($alignVertical && !$logoSize ? ' w-auto': '')));?>
                                <?php if($logoSet['link_image']) : ?>
                            </a>
                            <?php endif; ?>
                            <?= $logoSet['title'] ? '<h3>'.$logoSet['title'].'</h3>' : '';?>
                            <?= $logoSet['content'] ?: '';?>
                        </div>

                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($logoSize == 'cheight') : ?>
<style type="text/css">
#<?= $id;?>.logo-cheight .logo-img {
    height: <?= get_field('cus_height'); ?>px;
}
</style>
<?php endif; ?>