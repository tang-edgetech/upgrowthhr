<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'upgrowthhr' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9C:V>z):#|~eKwYy5D%PU-=enP01P]MSf4SntCq&CCh[r4<m!Zzx4; =NCY8864n' );
define( 'SECURE_AUTH_KEY',  '}WwpX`XL]DCIgD59ts(ZgkFm57H]k }C(FWMkr%#jm{ ?tdq9?*U HjdCX4P@(#2' );
define( 'LOGGED_IN_KEY',    'qZ7BN8f3?#Sy/~YdKs`]1 grI{Fd%~4rM^`jFZAkjG<<9H3?Zc)]Isgn83J,cLZ{' );
define( 'NONCE_KEY',        'Vxu(xN*3Xa1;uO/tMb#[}ufETs&CSR3fkrGOEp,NeI9quH^JjF@$6U?SV^@jFj#U' );
define( 'AUTH_SALT',        'tg>eY`2V-$*lJII( 8(@CBzI],A>T,1`J&IFD^S;,F?e,)DPI[V]/:w^wA-<DNjO' );
define( 'SECURE_AUTH_SALT', 'Cf7/hl[v5;wigf?Q`UP]>(WTtJn)h1GMDtrqNW}_J{grh) e>u6%5+Z9=sB[-Z~d' );
define( 'LOGGED_IN_SALT',   '-+&Ki.fi+kh2i<!~D5RLlsD:xZQ1{FU5/I%$M?iD<ql0htBL&>e9%fHt>8Bd!R^0' );
define( 'NONCE_SALT',       ':$<8{:4QP*}d9/s:yn+#4sr,?o[a0L=GiVffJ6_l6sbzbu*a:6.=j61igo${;-&y' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'ug_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
