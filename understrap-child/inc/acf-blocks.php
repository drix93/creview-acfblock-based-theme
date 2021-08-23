<?php
// Register all ACF Blocks here

function register_acf_block_types() {
	// Register Blocks
	
	// Home Header block
	acf_register_block_type(array(
		'name'              => 'home_header',
		'title'             => __('Home Header'),
		'description'       => __('Header block for the homepage'),
		'render_template'   => 'template-parts/blocks/home-header.php',
		'category'          => 'layout',
		'icon'              => 'align-center',
		'mode'              => 'preview',
		'keywords'          => array( 'home', 'header' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'multiple'	=> false,
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
		)
	));
	
	// Footer CTA block
	acf_register_block_type(array(
		'name'              => 'footer_cta',
		'title'             => __('Footer CTA'),
		'description'       => __('CTA Section to be placed above footer.'),
		'render_template'   => 'template-parts/blocks/footer-cta.php',
		'category'          => 'layout',
		'icon'              => 'align-center',
		'mode'              => 'preview',
		'keywords'          => array( 'footer', 'cta', 'call-to-action' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
		)
	));
	
	// Intro Header block
	acf_register_block_type(array(
		'name'              => 'intro_header',
		'title'             => __('Intro Header'),
		'description'       => __('An Introductory Header block.'),
		'render_template'   => 'template-parts/blocks/intro-header.php',
		'category'          => 'layout',
		'icon'              => 'align-center',
		'mode'              => 'preview',
		'keywords'          => array( 'intro', 'header' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'multiple'	=> false,
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
		)
	));
	
	// Reversible Image Content block
	acf_register_block_type(array(
		'name'              => 'rev_image_content',
		'title'             => __('Reversible Image Content'),
		'description'       => __('Block that switches the content and image side per iteration.'),
		'render_template'   => 'template-parts/blocks/reverse-image-content.php',
		'category'          => 'layout',
		'icon'              => 'align-left',
		'mode'              => 'preview',
		'keywords'          => array( 'content', 'repeat' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// Icons - 6 Column block
	acf_register_block_type(array(
		'name'              => 'icons_six_col',
		'title'             => __('Icons - 6 Column'),
		'description'       => __('Six column with Icons'),
		'render_template'   => 'template-parts/blocks/icons-six-col.php',
		'category'          => 'layout',
		'icon'              => 'grid-view',
		'mode'              => 'preview',
		'keywords'          => array( 'content', 'icon' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// Recent News + Ad block
	acf_register_block_type(array(
		'name'              => 'recent_news_ad',
		'title'             => __('Recent News + Ad'),
		'description'       => __('Block with 2 most recent news and an ad area'),
		'render_template'   => 'template-parts/blocks/recent-news-ad.php',
		'category'          => 'layout',
		'icon'              => 'grid-view',
		'mode'              => 'preview',
		'keywords'          => array( 'ad', 'news', 'posts' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'multiple'	=> false,
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// Special Heading block
	acf_register_block_type(array(
		'name'              => 'special_heading',
		'title'             => __('Special Heading'),
		'description'       => __('A stylized heading'),
		'render_template'   => 'template-parts/blocks/special-heading.php',
		'category'          => 'layout',
		'icon'              => 'editor-italic',
		'mode'              => 'preview',
		'keywords'          => array( 'heading', 'style' ),
		'supports'			=> array(
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// Contact Methods (Icon + Link) block
	acf_register_block_type(array(
		'name'              => 'contact_method',
		'title'             => __('Contact Methods (Icon + Link)'),
		'description'       => __('A contact block which can add multiple emails/telephone/fax.'),
		'render_template'   => 'template-parts/blocks/contact-methods.php',
		'category'          => 'layout',
		'icon'              => 'id',
		'mode'              => 'preview',
		'keywords'          => array( 'contact', 'email', 'fax', 'telephone' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// Contact Form block
	acf_register_block_type(array(
		'name'              => 'contact_form',
		'title'             => __('Contact Form'),
		'render_template'   => 'template-parts/blocks/contact-form.php',
		'category'          => 'layout',
		'icon'              => 'phone',
		'mode'              => 'preview',
		'keywords'          => array( 'contact', 'email', 'question', 'telephone', 'call' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'multiple'	=> false,
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// Multi Image & Text block
	acf_register_block_type(array(
		'name'              => 'multi_image_text',
		'title'             => __('Multi Image & Text'),
		'render_template'   => 'template-parts/blocks/multi-image-text.php',
		'category'          => 'layout',
		'icon'              => 'align-left',
		'mode'              => 'preview',
		'keywords'          => array( 'media', 'image', 'text', 'multi' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// Icon Repeater - 3 Columns
	acf_register_block_type(array(
		'name'              => 'icon-repeater-3-col',
		'title'             => __('Icon Repeater - 3 Columns'),
		'description'       => __('Repeater that goes up to a maximum of 3 columns'),
		'render_template'   => 'template-parts/blocks/icon-repeater-3-col.php',
		'category'          => 'layout',
		'icon'              => 'grid-view',
		'mode'              => 'preview',
		'keywords'          => array( 'content', 'repeater', 'icon' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// Logo Columns
	acf_register_block_type(array(
		'name'              => 'logo-columns',
		'title'             => __('Logo Columns'),
		'description'       => __('Columns with a Logo and other text content.'),
		'render_template'   => 'template-parts/blocks/logo-columns.php',
		'category'          => 'layout',
		'icon'              => 'grid-view',
		'mode'              => 'preview',
		'keywords'          => array( 'content', 'logo', 'icon' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// Gallery Modal Slider
	acf_register_block_type(array(
		'name'              => 'gallery-modal-slider',
		'title'             => __('Gallery Modal Slider'),
		'description'       => __('A gallery slider with video/image popups.'),
		'render_template'   => 'template-parts/blocks/gallery-modal-slider.php',
		'category'          => 'layout',
		'icon'              => 'images-alt',
		'mode'              => 'edit',
		'keywords'          => array( 'gallery', 'popup', 'modal', 'video', 'image', 'photo' ),
		'post_types'		=> array('page'),
		'enqueue_assets'	=> function(){
			wp_enqueue_style( 'slick-slider-styles', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), false );
			wp_enqueue_script( 'slick-slider-scripts', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '', true );
			wp_enqueue_script( 'gallery-modal-slider-scripts', get_stylesheet_directory_uri() . '/template-parts/blocks/gallery-modal-slider.js', array('jquery'), false, true );
		  },
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
		)
	));
	
	// News Feed
	acf_register_block_type(array(
		'name'              => 'news-feed',
		'title'             => __('News Feed'),
		'description'       => __('Shows the selected news feed.'),
		'render_template'   => 'template-parts/blocks/news-feed.php',
		'category'          => 'widgets',
		'icon'              => 'editor-table',
		'mode'              => 'preview',
		'keywords'          => array( 'feed' , 'news', 'posts', 'articles' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
			'multiple'	=> false,
		)
	));
	
	// Capabilities
	acf_register_block_type(array(
		'name'              => 'capabilities',
		'title'             => __('Capabilities'),
		'description'       => __('Shows the different capabilities.'),
		'render_template'   => 'template-parts/blocks/capabilities.php',
		'category'          => 'widgets',
		'icon'              => 'screenoptions',
		'mode'              => 'preview',
		'keywords'          => array( 'capabilities' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
			'multiple'	=> false,
		)
	));
	
	// Capabilities Map
	acf_register_block_type(array(
		'name'              => 'capabilities-map',
		'title'             => __('Capabilities Map'),
		'description'       => __('Shows the capabilities map.'),
		'render_template'   => 'template-parts/blocks/capabilities-map.php',
		'category'          => 'widgets',
		'icon'              => 'screenoptions',
		'mode'              => 'preview',
		'keywords'          => array( 'capabilities', 'map' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
			'multiple'	=> false,
		)
	));
	
	// Enews + Subscribe Form Block
	acf_register_block_type(array(
		'name'              => 'enews-sub-form-block',
		'title'             => __('Enews + Subscribe Form'),
		'description'       => __('Shows the Enews Form Block'),
		'render_template'   => 'template-parts/blocks/enews-sub-form-block.php',
		'category'          => 'common',
		'icon'              => 'email-alt2',
		'mode'              => 'preview',
		'keywords'          => array( 'enews', 'subscribe', 'form' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
			'multiple'	=> false,
		)
	));
	
	// Background Text Block
	acf_register_block_type(array(
		'name'              => 'background-text-block',
		'title'             => __('Background Text'),
		'description'       => __('Shows a centered typed text that blends behind elements.'),
		'render_template'   => 'template-parts/blocks/background-text.php',
		'category'          => 'common',
		'icon'              => 'editor-textcolor',
		'mode'              => 'preview',
		'keywords'          => array( 'background', 'text' ),
		'post_types'		=> array('page'),
		'supports'			=> array(
			'align'		=> false,
			'anchor'	=> true,
			'html'		=> true,
			'mode'		=> false,
			'multiple'	=> false,
		)
	));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

// Enqueue child theme styles to backend post.php (Page* Edit Screen)
function block_enqueues() {
	$the_theme = wp_get_theme();
	wp_enqueue_style( 'bootstrap-4-3-1-styles', get_stylesheet_directory_uri() . '/css/block-editor.css', array(), $the_theme->get( 'Version' ) );
}
add_action( 'enqueue_block_editor_assets', 'block_enqueues' );