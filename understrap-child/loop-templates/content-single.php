<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">

        <div class="header-nav mb-3">
            <div class="container px-0">
                <div class="row align-items-center">
                    <div class="col-lg-10 order-last order-lg-first">
                        <?php the_title( '<h2 class="entry-title">', '</h1>' ); ?>
                    </div>
                    <div class="back-link col-lg text-lg-right d-print-none">
                        <a href="<?= get_the_category()[0]->term_id == 71 ? '/news' : '/articles'; ?>">
                            <i class="fa fa-chevron-left"></i>
                            Previous
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="entry-meta">

            <?= get_the_date(); ?>

        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <?php //echo get_the_post_thumbnail( $post->ID, 'full', array('class' => 'pt-3') ); ?>

    <div class="entry-content pt-5">

        <?php the_content(); ?>

        <?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

    </div><!-- .entry-content -->

</article><!-- #post-## -->