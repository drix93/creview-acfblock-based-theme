<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper" id="search-wrapper">

    <div class="container my-5 py-md-3" id="content" tabindex="-1">

        <div class="row">

            <main class="site-main offset-md-1 col-md-10" id="main">

                <?php if ( have_posts() ) : ?>

                <header class="page-header mb-3 bg-transparent">

                    <h1 class="page-title mt-2">
                        <?php
								printf(
									/* translators: %s: query term */
									esc_html__( 'Search Results for: %s', 'understrap' ),
									'<span>' . get_search_query() . '</span>'
								);
								?>
                    </h1>
                    <?= get_search_form(); ?>

                </header><!-- .page-header -->

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                <?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'search' );
						?>

                <?php endwhile; ?>

                <?php else : ?>

                <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                <?php endif; ?>

            </main><!-- #main -->

            <!-- The pagination component -->
            <div class="offset-md-1 col-md-10">
                <?php understrap_pagination(); ?>
            </div>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #search-wrapper -->

<?php get_footer(); ?>