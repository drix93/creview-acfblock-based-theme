<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php if ( is_active_sidebar( 'copyright' ) ) : ?>

<!-- ******************* The Footer Full-width Widget Area ******************* -->

<div class="wrapper" id="wrapper-copyright">

    <div class="<?php echo esc_attr( $container ); ?>" id="copyright-content" tabindex="-1">

        <div class="row">

            <div class="col">
                <?php dynamic_sidebar( 'copyright' ); ?>
            </div>

        </div>

    </div>

</div><!-- #wrapper-copyright -->

<?php endif; ?>