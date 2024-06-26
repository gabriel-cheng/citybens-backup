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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'igmage30_wp414' );

/** Database username */
define( 'DB_USER', 'igmage30_wp414' );

/** Database password */
define( 'DB_PASSWORD', 'Yp8B]!S4F6' );

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
define( 'AUTH_KEY',         'fioxtwicbtttmhom4tp4ol2jbt0iujiv71vmcvqq20eabev6jgulvaw9ffmkk82b' );
define( 'SECURE_AUTH_KEY',  'q1whuzmbq29d3861zx10wuosqz7pieizqol40o4nedh5osuppbjbpqkemh3auvvh' );
define( 'LOGGED_IN_KEY',    'tn05g43sfueh2zmv4etfpgxvbabhd6hdbnhr3ydtbijo2uhnmlk7bhyx1qypu7ko' );
define( 'NONCE_KEY',        'rjpffax8yalequicghtoejuv6qfknzj90kqxcdzytwvpyd9jpympl8bthtrvyk8c' );
define( 'AUTH_SALT',        'p3uvnfskwdpztxn30tqjdjnemuwbjqpibmvtokw7eczbgekw64hmctyfmmacp3jd' );
define( 'SECURE_AUTH_SALT', 'a3ovk79ttcbtptzgrku21djqz2z88etrdmv5xcogr5ioicmqsgoryhrgtjebatgy' );
define( 'LOGGED_IN_SALT',   '0sskvgjcowct0slmdb9ruqhmtftv6jpdxqqqeeabxedfbck1ht5i1cafmlqeut4j' );
define( 'NONCE_SALT',       'm5zxwy292aoyy1xtwbe3aagavzvbmcuqzyzps9pjycrpelkpreddo47plqs8azhi' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpko_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
