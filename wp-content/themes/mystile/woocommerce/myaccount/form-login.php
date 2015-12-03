<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="cuenta">
	<div class="container">
		<div class="row productos title-margin">
			<div class="col-sm-4 v-mid"><hr></div>
			<div class="col-sm-4"><h1 class="section-heading center">Mi Cuenta</h1></div>
			<div class="col-sm-4 v-mid"><hr></div>
		</div>

		<div class="row spacing">
			<div class="cuenta-container">

				<?php endif; ?>

				<h3 class="center">Ingresar</h3>

				<form method="post" class="login" autocomplete="off">

					<?php do_action( 'woocommerce_login_form_start' ); ?>

					<div>
						<input type="text" class="data" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" placeholder="Usuario o correo electrónico" autocomplete="off"/>
					</div>

					<div>
						<input class="data" type="password" name="password" id="password" placeholder="Contraseña" autocomplete="off"/>
					</div>				

					<?php do_action( 'woocommerce_login_form' ); ?>


					<?php wp_nonce_field( 'woocommerce-login' ); ?>

					<div class="row">
						<div class="col-sm-6 remember">							
							<input name="rememberme" type="checkbox" id="rememberme" value="forever" /><p>Recordarme</p><br>
							<label for="rememberme"></label>
							<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
						</div>

						<div class="col-sm-6 register-link">
							<button type="submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>">Ingresar</button><br>
							<a data-toggle="modal" href="#register-modal" data-target="#register-modal">Registrarse</a>
						</div>
					</div>

					<?php do_action( 'woocommerce_login_form_end' ); ?>

				</form>

				<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

			</div>

		</div>

		<div class="modal fade" id="register-modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">			
					<div class="cuenta-container">

						<h3 class="center">Registrarse</h3>

						<form method="post" class="register" autocomplete="false">

							<?php do_action( 'woocommerce_register_form_start' ); ?>

							<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>


							<div>
								<input class="data" type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" placeholder="Usuario" autocomplete="off"/>
							</div>

							<?php endif; ?>

							<div>
								<input class="data" type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" placeholder="Correo electrónico" autocomplete="off"/>
							</div>

							<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

							<div>
								<input class="data" type="password" class="input-text" name="password" id="reg_password" placeholder="Contraseña" autocomplete="off"/>
							</div>

							<?php endif; ?>

							<!-- Spam Trap -->
							<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

							<?php do_action( 'woocommerce_register_form' ); ?>
							<?php do_action( 'register_form' ); ?>


							<?php wp_nonce_field( 'woocommerce-register' ); ?>
							<div class="row">
								<div class="col-sm-6"></div>
								<div class="div col-sm-6">
									<button type="submit" class="pull-right" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">Registrarse</button>
								</div>
							</div>


							<?php do_action( 'woocommerce_register_form_end' ); ?>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
