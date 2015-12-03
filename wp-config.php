<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wp_bcc');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'tL4y|eER)-E`)Z3}mG,tIzpw%q+%SQ,*jJJ97dCbj/91uzd-NR[=#UNfRH@ewiJ+');
define('SECURE_AUTH_KEY', 'RA_D(5_+__<I|oNQ:/{kiNp=9S-&W|cscY0~x)?=#err2|,-8fIenpMwS@tr-#R@');
define('LOGGED_IN_KEY', '.T=9?LU*7w25(3@i+#I|N3UDG`b6K4-JicfE+LD _3<YU+ab$9nig*zr7|e +P-B');
define('NONCE_KEY', 't+I`8{o#LD}FJ|u{4NW!|B~ksA?wU`rt@KK[#.gPsrTt*2`DGZ]5~[sKF3qVUI+;');
define('AUTH_SALT', 'Wz.LA$g#Tp0rZXbi|.J=a!QIJc-Kgk$>v^F^*|rGP+.$&-c 9D}/T4lz.sR?V<Be');
define('SECURE_AUTH_SALT', 'aaJgKPh&2bHwZFw15|>FL{t|6)V(i&EF4u+#F7_V:d)9-1Y=o?c;N$+3B`Kernv3');
define('LOGGED_IN_SALT', 'g0>+_:MJaE1z[/TsQ->9dAOLbWQ1Gb$Gh3-`Xy0+AZtJZd_o`maO5|L$%_)x$L[W');
define('NONCE_SALT', 'r~#0.- 80un5IJ)!8T3w+.Csp^`3Bs1IC7>ufe6>4{grWzvdR~+dN%bxWo{+^ROA');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

