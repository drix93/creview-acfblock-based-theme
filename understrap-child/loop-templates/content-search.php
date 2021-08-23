<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class('pb-5 mb-4'); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">

        <?php
		the_title(
			sprintf( '<a class="invert" href="%s" rel="bookmark"><h2 class="entry-title has-span mb-2"><span>', esc_url( get_permalink() ) ),
			'<span></h2></a>'
		);
		?>

        <?php if ( 'post' == get_post_type() ) : ?>

        <div class="entry-meta">
            <?= get_the_date(); ?>
        </div><!-- .entry-meta -->

        <?php endif; ?>

    </header><!-- .entry-header -->

    <?php echo get_the_post_thumbnail( $post->ID, 'general', array('class' => 'mt-2 pb-3') ); ?>

    <div class="entry-content">

        <p><?= trim_words(strip_tags(get_the_content()),38); ?></p>
        
        <a href="<?= get_the_permalink($post->ID); ?>" class="btn btn-primary mt-3">Read More</a>

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