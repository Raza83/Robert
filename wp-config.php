<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mic' );

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
define( 'AUTH_KEY',         'x`?rkVN>&;1a0DEG}-ceW&{+))`FcE03(o<EZEz8)RxQx+Z!iCtc&c8-rEb]=zqJ' );
define( 'SECURE_AUTH_KEY',  ')_G>;a2.<aC.b1C^=}rfJj|t/K|D6?t6}Fo>vLCf3d<x:|?gN[`L6~qj[NBlVWdJ' );
define( 'LOGGED_IN_KEY',    'EyC5+ gp&}0|qK=08y(N5o){2e66.b_rlUBOSV_ ohG+>-9x: xK&S/8VvB:AQSH' );
define( 'NONCE_KEY',        'MPY{a$NfT)`5^DTfdICR,7[o>m<Z~HtgZ](M[%(AJ/NX*tI0<8+AO&Kn0$N6^Bg}' );
define( 'AUTH_SALT',        'eS|rB5DuEFpS*o:c]AZQbfkjCG5.Eczg:d5*YxxX{LQ}%VxC1U-hmBFC0ZS-J:pm' );
define( 'SECURE_AUTH_SALT', 'nKATN+Dg^FU=(Q%@(/gmz@oc%9XXx[ hL8?I#]rk4*54>I2nbM9vF{+$8Qs$K~B%' );
define( 'LOGGED_IN_SALT',   'G|k,se-(5|kN(C0h{Vzh2&Wqa#/m8 UKlWzuk>?Rs$|]dQOV~gJ7/li*@@w-JKJ*' );
define( 'NONCE_SALT',       's{*n+V#isIeQV|T0Cx+:e[@|s1^rZgQ;F/UQ1!|L(_2rkaSG7W7*Pl/shZo#H=O5' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
