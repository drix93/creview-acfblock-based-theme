<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div class="wrapper" id="index-wrapper">

    <div id="content" tabindex="-1">

        <?php
		// Get ID for blog/posts page and then get the content for it.
		$defaulContent = get_post(get_option( 'page_for_posts' ));

		// Apply content filter on the content received.
		$defaulContent = apply_filters('the_content', $defaulContent->post_content);
		echo $defaulContent;
		?>

    </div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>