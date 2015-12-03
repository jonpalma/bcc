<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php woo_title(''); ?></title>
		
		<link rel="shortcut icon" href="<?php bloginfo('template_url')?>/img/icon.ico" type="image/x-icon">
		
		<?php woo_meta(); ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/bootstrap.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/style-bcc.css">
		<?php wp_head();
			  woo_head();
		?>

	</head>

	<body <?php body_class(); ?>>
		<?php woo_top(); ?>

		<div id="wrapper">

			<nav class="navbar navbar-default">
				<div class="navbar-top">
					<div class="container">
						<div class="navbar-header">				
							<a class="navbar-brand smoothScroll" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url')?>/img/index/logo.png" alt="BCC"></a>
							<?php
							if ( class_exists( 'woocommerce' ) ) {
								woocommerce_cart_link();
								echo get_search_form();
							}
							?>
						</div>
					</div>
				</div>
				<div class="navbar-bottom">
					<div>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsible-nav" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div id="collapsible-nav" class="collapse navbar-collapse">							
							<ul id="main-nav" class="nav navbar-nav">
								<!--<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>-->
								<li><a class="border-left menu" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Inicio', 'woothemes' ); ?></a></li>
								<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&include=27,66,69,71,93,30&sort_order=ASC' ); ?>
							</ul><!-- /#nav -->
						</div>
					</div>
				</div>		
			</nav>