<?php

/**
 * Contact Methods (Icon + Link) Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-method-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-method-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assigning defaults.
$contact_methods = get_field( 'contact_methods' );
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <p>
        
        <?php
        $last_key = end(array_keys($contact_methods));

        foreach ($contact_methods as $key => $method) :
        switch($method['icon']) {
            case 'phone':
            $icon = "<img alt='Phone Icon' src='/wp-content/uploads/2019/05/phone.svg'>";
            break;
            case 'email':
            $icon = "<img alt='Email Icon' src='/wp-content/uploads/2019/05/envelope-open.svg'>";
            break;
            case 'fax':
            $icon = "<img alt='Fax Icon' src='/wp-content/uploads/fax-solid.svg'>";
            break;
            default:
            $icon = "<img alt='Phone Icon' src='/wp-content/uploads/2019/05/phone.svg'>";
            break;
        }
        
        $link_target = $method['link']['target'] ?: '_self';
        ?>
        <?= $icon; ?>
        <a href="<?= esc_url($method['link']['url']); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($method['link']['title'] ?: '1 222 333 4444'); ?></a>
        <?= $key == $last_key ? '' : '<br>'; ?>
        <?php endforeach; ?>
        
    </p>
</div>