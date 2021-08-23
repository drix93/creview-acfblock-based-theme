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

    <div class="container my-5 py-md-3" id="content" tabindex="-1">

        <div class="row">

            <main class="site-main offset-md-1 col-md-10" id="main">

                <?php if ( have_posts() ) : ?>

                <?php $i = 1; ?>
                <?php /* Start the Loop */ ?>

                <?php while ( have_posts() ) : the_post(); ?>

                <div id="post-<?= esc_attr($id); ?>" class="post-item">
                    <div class="container px-0">

                        <div class="row">

                            <div class="<?= $i % 2 == 0 ? 'order-md-1 ' : '';?>col-md-6 mb-2 mb-md-0">
                                <?= get_the_post_thumbnail(get_the_ID(), 'full'); ?>
                            </div>

                            <div class="col-md-6">
                                <?php the_title('<h3>', '</h3>'); ?>
                                <h6 class="post-date mb-4">
                                    <?= get_the_date(); ?>
                                </h6>
                                <p><?= trim_words(strip_tags(get_the_content()),38); ?></p>
                                <a class="btn btn-primary mt-2" href="<?= esc_url(get_the_permalink()); ?>"
                                    target="_self">Read More</a>
                            </div>

                        </div>

                        <?php $i++; ?>

                    </div>
                </div>

                <?php endwhile; ?>

                <?php else : ?>

                <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                <?php endif; ?>

            </main><!-- #main -->

            <!-- The pagination component -->
            <div class="offset-md-1 col-12 col-md-10 d-flex justify-content-center mt-5">
                <?php understrap_pagination(); ?>
            </div>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>