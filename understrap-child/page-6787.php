<?php
// This is the template for the Site Map
get_header();
?>

<div class="sitemap container">
    <ul class="pages card-columns px-0">
        <?php
            //http://codex.wordpress.org/Function_Reference/wp_list_pages
            wp_list_pages('title_li=');
        ?>
    </ul>
</div>

<?php get_footer(); ?>