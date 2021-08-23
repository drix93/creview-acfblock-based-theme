<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div class="wrapper" id="single-wrapper">

    <div class="container" id="content" tabindex="-1">

        <div class="row">

            <main class="site-main offset-md-1 col-md-10 my-5 py-md-3" id="main">

                <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'loop-templates/content', 'single' ); ?>

                <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer(); ?>