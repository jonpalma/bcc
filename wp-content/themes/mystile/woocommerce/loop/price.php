<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<p class="productPrice"><?php echo $price_html; ?></p>
	<!--
	<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	 	<?php
	 		if ( ! $product->is_sold_individually() ) {
	 			woocommerce_quantity_input( array(
	 				'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
	 			) );
	 		}
	 	?>

	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

 		<button type="submit" data-toggle="tooltip" data-placement="top" title="<?php echo esc_html( $product->single_add_to_cart_text() ); ?>"><img class="icon" src="<?php bloginfo('template_url')?>/img/index/icons/cart.png" alt="cart"></button>
	 	<!--<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>-->

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<!--</form>-->
<?php endif; ?>
