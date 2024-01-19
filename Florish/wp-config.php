<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings
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
define( 'DB_NAME', "florishstaging" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         '=FQe2RTzNVnmkXk~IDb!36]Xq^)CjUN^Qu9!6^K!#mz+?p%|-~2)GgAm2Pwt:zv0' );
define( 'SECURE_AUTH_KEY',  'RJ{%)(p#jL8} kvCtLTWe)3rcKx|Qu4O, HfU=+87bsaAlO#U.Na86:x7Pd|!~og' );
define( 'LOGGED_IN_KEY',    'Km[6Jd56WJ!}V-e(BCP.Bpp3)z/_RT2,!z}l5!43hOQh&n+<itt=P^K*g1M/2gfT' );
define( 'NONCE_KEY',        '_d1r2TV9fgwJ ,ecy1%v{tLK?8Zqy|}{M %13Bz]=Z|FJKJBw3YCDH$^a3$~X)S7' );
define( 'AUTH_SALT',        'X<)nOz3bG~~X`ZcM;ZYZgTU>Tu_!oGO(NqWFtO^]Tb73$r[;&!w=:bK-bOX27 1n' );
define( 'SECURE_AUTH_SALT', '.vU@p(V_X{nsYD7>rjoyMPFx&^p+c:@2J/K|Ns8|I,LYK|pysWuE#G(WpuLFoc)7' );
define( 'LOGGED_IN_SALT',   '*Mq.XLR3(?!T1UW9>wnVg7N5f5mIwR|=2Lg3L0h:-WG`WD}~c9kL2pX*($61|XPY' );
define( 'NONCE_SALT',       'B2[gULt#Q0E5Hs4k3=g^jO$^l0ds})_r*~u$Y+^+.HHcFb&x*qqRH%]3b):hvvJz' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpflris_';

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



define( 'DUPLICATOR_AUTH_KEY', '9oKV8/+Q4 e9<#QE|CyK,H~1/VeF=Kd~0{Z!2t@KT{:~EhFxq10.ddRyrwPX@(EZ' );
define( 'WP_SITEURL', 'http://localhost/florishstaging/' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
