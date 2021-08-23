<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="page-wrapper">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
        <link href="https://fonts.googleapis.com/css?family=Barlow:400,500,600,700|Roboto&display=swap" rel="stylesheet">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#fac226">
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="msapplication-TileImage" content="/mstile-144x144.png">
        <meta name="theme-color" content="#000000">
    </head>

    <body <?php body_class(); ?>>
        <?php do_action( 'wp_body_open' ); ?>
        <div class="site" id="page">

            <!-- ******************* The Navbar Area ******************* -->
            <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

                <a class="skip-link sr-only sr-only-focusable" ontent"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

                <div class="top-bar bg-black py-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between justify-content-lg-end flex-wrap">
                                <div class="social-part d-flex justify-content-lg-end order-2">
                                    <!-- The Social Menu goes here -->
                                    <?php wp_nav_menu(
											array(
                                                'theme_location'  => 'social-menu',
												'menu_class'      => 'navbar-nav ml-auto flex-row mr-lg-5',
												'menu_id'         => 'social-menu',
												'depth'           => 1,
												'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
												)
                                            ); ?>
                                    <!-- The Language Menu goes here -->
                                    <?php wp_nav_menu(
											array(
												'theme_location'  => 'language-menu',
                                                'container_class' => 'ml-2 d-none align-items-center',
												'menu_class'      => 'navbar-nav ml-auto flex-row mr-lg-4',
												'menu_id'         => 'language-menu',
												'depth'           => 1,
												'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
												)
                                            ); ?>
                                    <div class="search-part d-none d-lg-flex align-items-center">
                                        <?= get_search_form(); ?>
                                        <div class="search-trigger"></div>
                                    </div>
                                    <div class="search-part d-inline-flex d-lg-none align-items-center ml-3">
                                        <a href="/?s" class="btn btn-search">Search</a>
                                    </div>
                                </div>
                                <div class="middle-part d-lg-flex justify-content-lg-end mr-lg-5">
                                    <!-- The Middle Menu goes here -->
                                    <?php wp_nav_menu(
											array(
												'theme_location'  => 'middle-menu',
												'container_class'  => 'd-flex align-items-center h-100',
												'menu_class'      => 'navbar-nav ml-auto flex-row',
												'menu_id'         => 'middle-menu',
												'depth'           => 1,
												'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
												)
											); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (is_page(7967) ): ?>
                
                    <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container">

                        <div class="row navs w-100 mx-auto">
                            <div
                                class="middle-bar col-12 col-lg-2 d-flex justify-content-between align-items-center px-0 px-sm-3 px-lg-0">
                                <div class="logo">
                                    <!-- Your site title as branding in the menu -->
                                    <?php if ( ! has_custom_logo() ) { ?>

                                    <?php if ( is_front_page() && is_home() ) : ?>

                                    <h1 class="navbar-brand mb-0"><a rel="home"
                                            href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                            title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
                                            itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

                                    <?php else : ?>

                                    <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                        title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
                                        itemprop="url"><?php bloginfo( 'name' ); ?></a>

                                    <?php endif; ?>


                                    <?php } else {
										the_custom_logo();
									} ?>
                                </div>
                                <div class="nav-toggler">
                                    <!-- end custom logo -->
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                        aria-expanded="false"
                                        aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="menu-bar col-lg-9 pl-lg-0 pt-2 px-0 px-sm-3 px-lg-0 mb-lg-2 d-flex align-items-end">

                                <!-- The WordPress Menu goes here -->
                                <?php wp_nav_menu(
										array(
										'theme_location'  => 'primary',
										'container_class' => 'collapse navbar-collapse',
										'container_id'    => 'navbarNavDropdown',
										'menu_class'      => 'navbar-nav ml-auto',
										'fallback_cb'     => '',
										'menu_id'         => 'main-menu',
										'depth'           => 2,
										'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
										)
										); ?>
                            </div>
                        </div>
                    </div><!-- .container -->

                </nav><!-- .site-navigation -->
                
                <?php else : ?>
                   
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container">

                        <div class="row navs w-100 mx-auto">
                            <div
                                class="middle-bar col-12 col-lg-3 d-flex justify-content-between align-items-center px-0 px-sm-3 px-lg-0">
                                <div class="logo">
                                    <!-- Your site title as branding in the menu -->
                                    <?php if ( ! has_custom_logo() ) { ?>

                                    <?php if ( is_front_page() && is_home() ) : ?>

                                    <h1 class="navbar-brand mb-0"><a rel="home"
                                            href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                            title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
                                            itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

                                    <?php else : ?>

                                    <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                        title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
                                        itemprop="url"><?php bloginfo( 'name' ); ?></a>

                                    <?php endif; ?>


                                    <?php } else {
										the_custom_logo();
									} ?>
                                </div>
                                <div class="nav-toggler">
                                    <!-- end custom logo -->
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                        aria-expanded="false"
                                        aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="menu-bar col-lg-9 pl-lg-0 pt-2 px-0 px-sm-3 px-lg-0 mb-lg-2 d-flex align-items-end">

                                <!-- The WordPress Menu goes here -->
                                <?php wp_nav_menu(
										array(
										'theme_location'  => 'primary',
										'container_class' => 'collapse navbar-collapse',
										'container_id'    => 'navbarNavDropdown',
										'menu_class'      => 'navbar-nav ml-auto',
										'fallback_cb'     => '',
										'menu_id'         => 'main-menu',
										'depth'           => 2,
										'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
										)
										); ?>
                            </div>
                        </div>
                    </div><!-- .container -->

                </nav><!-- .site-navigation -->
                <?php endif; ?>

            </div><!-- #wrapper-navbar end -->