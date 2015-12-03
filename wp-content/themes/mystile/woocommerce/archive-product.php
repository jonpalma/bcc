<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php
/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
//do_action( 'woocommerce_before_main_content' );
?>
<div class="productos spacing overflow full-height">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 v-mid"><hr></div>
			<div class="col-sm-4"><h1 class="section-heading center">Productos</h1></div>
			<div class="col-sm-4 v-mid"><hr></div>
		</div>

		<?php
		$trms = get_the_terms( $post->ID, 'product_cat' );
		/*if($trms !='') {
			foreach ($trms as $term) {
				$product_cat_id = $term->term_id;
				break;
			}
		}
		echo $product_cat_id.'</br>';*/
		/*$des = do_action( 'woocommerce_archive_description' );*/
		add_action( 'woocommerce_after_subcategory_title', 'my_add_cat_description', 12);

		global $post;
		$args = array( 'taxonomy' => 'product_cat',);
		$terms = wp_get_post_terms($post->ID,'product_cat', $args);			
		//echo count($terms);
		$count = count($terms);
		/* TEST
		add_action( 'woocommerce_before_shop_loop', 'add_product_count_view', 10);

		$t = get_terms('product_cat');
		echo count($t);
		foreach( $t as $term ) {
			echo 'Product Category: '
				. $term->name
				. ' - Count: '
				. $term->count;
		}
		if(is_shop()){
			echo '<br>is shop!';
		}*/

		if (get_post_type()=='product' && is_shop()) {
		?>
		<div class="description foot-note">
			<p>
				Ante todo, excelente calidad en productos y en el servicio. En Bridge Chemical Company sabemos qué esperas lo mejor de los materiales que requieres, es por eso que te ofrecemos una gran gama de productos, que sin duda son líderes a nivel mundial por su calidad. 
				<br>
				Te invitamos a darle un vistazo a nuestros catálogos de productos para las diversas aplicaciones en todos los tipos de industrias.
			</p>
		</div>
		<?php
		} else if ($count > 0) {
			foreach ($terms as $term) {
				echo '<div class="foot-note">';
				echo $term->description;
				echo '</div>';
			}
		} else {
			/**
				 * woocommerce_archive_description hook
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
			do_action( 'woocommerce_archive_description' );
		}
		?>

		<?php if ( have_posts() ) : ?>

		<?php
		/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */			
		?>
		<div class="row store">
			<div class="col-sm-3 sidebar">
				<?php get_sidebar('categories'); ?>
			</div>

			<div class="col-sm-9">
				<div class="row" id="col-fix">
					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>
				</div>
				<div class="row center foot-note">
					<p>
						¿No encuentras el producto en nuestra tienda online? Contáctanos y danos la oportunidad de buscarlo por ti.
					</p>
					<p>
						¿Requieres probar los productos antes de adquirirlos o encontrar el producto apropiado? Invítanos a realizar pruebas de aplicación, nosotros te ayudamos.
					</p>
					<a href="?page_id=71">Contáctanos</a>
				</div>
			</div>
		</div>
	</div>
</div>	

<?php
/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
do_action( 'woocommerce_after_shop_loop' );
?>

<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

<div class="row store">
	<div class="col-sm-3 sidebar">
		<?php get_sidebar('categories'); ?>
	</div>

	<div class="col-sm-9">
		<?php wc_get_template( 'loop/no-products-found.php' ); ?>
		<div class="row center foot-note">
			<p>
				¿No encuentras el producto en nuestra tienda online? Contáctanos y danos la oportunidad de buscarlo por ti.
			</p>
			<p>
				¿Requieres probar los productos antes de adquirirlos o encontrar el producto apropiado? Invítanos a realizar pruebas de aplicación, nosotros te ayudamos.
			</p>
			<a href="?page_id=71">Contáctanos</a>
		</div>
	</div>
</div>

<?php endif; ?>

<?php
/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
do_action( 'woocommerce_after_main_content' );
?>

<?php
/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
do_action( 'woocommerce_sidebar' );
?>

<?php get_footer( 'shop' ); ?>
