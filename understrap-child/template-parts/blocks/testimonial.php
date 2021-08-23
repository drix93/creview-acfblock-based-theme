<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
$text = get_field('testimonial') ?: 'Your testimonial here...';
$author = get_field('author') ?: 'Author name';
$role = get_field('role') ?: 'Author role';
$image = get_field('image') ?: 108;
$background_color = get_field('background_color') ?: '#1e73be';
$text_color = get_field('text_color') ?: '#fff';

?>
<div id="<?php echo esc_attr($id); ?>" class="testimonial-block <?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="testimonial-blockquote">
                    <h1 class="testimonial-author"><?php echo $author; ?></h1>
                    <h2 class="testimonial-role"><?php echo $role; ?></h2>
                    <div class="testimonial-text pt-5"><?php echo $text; ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="testimonial-image">
                    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        #<?php echo $id; ?> {
            background: <?php echo $background_color; ?>;
            color: <?php echo $text_color; ?>;
        }
    </style>
</div>