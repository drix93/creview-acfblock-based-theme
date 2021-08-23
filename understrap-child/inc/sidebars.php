<?php

// Custom Sidebars
function new_sidebars()
{
    for ($i = 1; $i < 5; $i++) {
        $description = 'Area/Column ' . $i . ' for Footer (Footer areas shown above Copyright Area)';
        register_sidebar(
            array(
                'name' => __('Footer Area ' . $i, 'understrap-child'),
                'id' => 'footercol' . $i,
                'description' => __($description, 'understrap-child'),
                'before_widget' => '<div class="widget-content">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title">',
                'after_title' => '</h5>',
            )
        );
    }
}

add_action('widgets_init', 'new_sidebars'); 