<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footercols' ); ?>

<div class="wrapper py-3 d-print-none" id="wrapper-copyright">

    <div class="<?php echo esc_attr( $container ); ?>" id="copyright-content" tabindex="-1">

        <div class="row px-lg-0">

            <div class="col">
                <?php $copyright = get_field( 'copyright', 'option' ); ?>
                <?= date('Y') ; ?> <?= $copyright['company_name']; ?><span class="divider">|</span><a href="<?= $copyright['privacy_link']['url'] ?: '#'; ?>" target="<?= $copyright['privacy_link']['target'] ?: '_self'; ?>"><?= $copyright['privacy_link']['title'] ?: 'Privacy Policy'; ?></a><span class="divider">|</span><a href="<?= $copyright['sitemap_link']['url'] ?: '#'; ?>" target="<?= $copyright['sitemap_link']['target'] ?: '_self'; ?>"><?= $copyright['sitemap_link']['title'] ?: 'Site Map'; ?></a>
            </div>

        </div>

    </div>

</div><!-- #wrapper-copyright -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

