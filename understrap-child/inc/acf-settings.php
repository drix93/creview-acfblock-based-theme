<?php

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'redirect' => true,
    ));
	acf_add_options_page(array(
        'page_title' => 'Copyright Area',
        'parent_slug' => 'theme-options',
        'menu_slug' => 'copyright-options',
        'redirect' => false,
    ));
}