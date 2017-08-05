<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'testsite');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'IJ9-,LLdrol:A;J1Zz[{KZI28*tp/D6*&/6]z0G3~ToaggUm9naRQBx<%S^dk3$2');
define('SECURE_AUTH_KEY',  ',]9RK*|s/>*Aif6?%R8:eX6JT$T=zbO%E2O8?gg.u>IEtg&^E4e8mXOftT{IeQ i');
define('LOGGED_IN_KEY',    'J(pDmdfp qV%9`b;XLwGU*Of t/?%BG|zvE|ukT=gP=h_R].D8A?5dG9ry!1W|E)');
define('NONCE_KEY',        ' uL{3ScP,=9U^+SSY@QP%!A>*yY6r-|<0YZ)*xkka~e*5SXGw.{ukFja?rQZ.q/a');
define('AUTH_SALT',        'C&tPR/K&m^oE!Od^q?* Dr.PB|B8*HQnd5EKjwL|(ZGO)i?+?GKasAhvgdM$-w+a');
define('SECURE_AUTH_SALT', 'J2Hgt>b*j@ie.HMZ$*dL>YEq_#JOI%Bc]133Q(c~2?-,d2xk+sq6AqtPtPpq-mam');
define('LOGGED_IN_SALT',   '|{ytOzH0M mu=oLwS!_a()Tz`]`)K/gc.9CryhY;c.YFg$aloW]bAYn @JERGLj ');
define('NONCE_SALT',       '%f!~IEOu(#5=_=Y5OCfFsGz2C^mM(vVJZ0eCkPE&aUbejI(XHMl0+PM4H4?E/xmv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
