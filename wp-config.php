<?php

/**
 * Allow WordPress to open site from every URL 
 * 
 */
define('WP_HOME', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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

define('AUTH_KEY',         'x1Ji#<ANi/`Aa|KXZ,w=WBQnA:CFgT<7mt A<3hvk7^3Eiu}HlO! l6R[PZr%?F1');
define('SECURE_AUTH_KEY',  '`cj+<Sc`|0PClylCd`w!T||p[($uZY=hq%+~.+5`j+&,Iq,my{HU{3nf#qjn-:g3');
define('LOGGED_IN_KEY',    'PR5:lV(eJ7+1<N)L_-Tdw$R+vB=damu3&_/v-(Dqm4P-E2=r;ia7lU;C%v9e+vwV');
define('NONCE_KEY',        'HGF)DVuX+Rt>~T<dLvpT$yJ.Y[TbycViM!e}0[s8H}0,Rl89*pW]+YiG;b4yZ*J(');
define('AUTH_SALT',        'uFCl`rXa %C.yP~)Q<bg]+I)jJv{mP*S16YAYT0$7|S}`O-m&gK;Ey53v|BFP&:y');
define('SECURE_AUTH_SALT', '#l(7l#@f]xYRd[#jEf5-/Nb$m$D-Zsc|&R44eP,iIQ1-x-#(ZSi+H0.8b;q@.Tbz');
define('LOGGED_IN_SALT',   '$;rCA9C]-a(gzS|gtU{@E5S-|)K40--XF1f+/!CUM+tB<RL/-`1cT^#-cg$$1gf<');
define('NONCE_SALT',       ':kC!HC:T-|U3,,nUQAQUD>V7vC#-rC-MgmLB$P`Bil-ND~wPMx(l~Kak|dS-1DK@');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */

define('CORE_UPGRADE_SKIP_NEW_BUNDLED', true); 		// Disallow downloading core themes each year
define('WP_POST_REVISIONS', false); 				// Disallow post revisions in database


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
	error_reporting(0);
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
