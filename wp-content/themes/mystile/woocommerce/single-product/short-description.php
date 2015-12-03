<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

if ( ! $post->post_content ) {
	return;
}

?>
<?php 
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
		
	<?php foreach ( $tabs as $key => $tab ) : ?>
		<div class="tab-des" id="tab-<?php echo esc_attr( $key ); ?>">
			<p>Descripción:</p>
			<?php call_user_func( $tab['callback'], $key, $tab ); ?>
			<?php echo CFS()->get('pdf'); ?>
		</div>
	<?php endforeach; ?>

<?php endif; ?>

<!-- SHORT DESCRIPTION
<div itemprop="description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_content ) ?>
</div> -->

