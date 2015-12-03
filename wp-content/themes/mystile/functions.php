<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'zdmv5lp26tfbp7jcwiw51ix9sj389e712' );

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
	'includes/theme-options.php', 			// Options panel settings and custom settings
	'includes/theme-functions.php', 		// Custom theme functions
	'includes/theme-actions.php', 			// Theme actions & user defined hooks
	'includes/theme-comments.php', 			// Custom comments/pingback loop
	'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
	'includes/sidebar-init.php',    		// Initialize widgetized areas  /* DEACTIVATED SIDEBAR */
	'includes/theme-widgets.php',			// Theme widgets
	'includes/theme-install.php',			// Theme installation
	'includes/theme-woocommerce.php',		// WooCommerce options
	'includes/theme-plugin-integrations.php'	// Plugin integrations
);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );
foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/
add_image_size( 'featuredImageCropped', 220, 400, true );
//$GLOBALS['route'] = bloginfo('template_url');
/*
function new_excerpt_more( $more ) {
	return ' 
	<div class="divider front-page-hide">
		<div class="col-sm-2 col-xs-3 icons no-padding">
			<a class="hidden" href=""><img src="'.$GLOBALS['route'].'/img/noticias/icons/pint.png" alt="pinterest"></a>
			<a class="middle-margin hidden" href=""><img src="img/noticias/icons/twitter.png" alt="twitter"></a>
			<a class="hidden" href=""><img src="img/noticias/icons/facebook.png" alt="facebook"></a>
		</div>
		<div class="col-sm-1 hidden-xs line"><hr></div>
		<div class="col-sm-7 col-xs-7 line"><hr></div>
		<div class="col-sm-1 col-xs-2 no-padding leer"><a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Leer', 'your-text-domain' ) . '</a></div>
		<div class="col-sm-1 hidden-xs line"><hr></div>
	</div>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );*/

/* DESHABILITAR COMENTARIOS DE PRODUCTOS */
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
	unset($tabs['reviews']);
	return $tabs;
}




/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>
