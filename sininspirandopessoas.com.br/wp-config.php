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
define( 'DB_NAME', 'igmage30_wp841' );

/** MySQL database username */
define( 'DB_USER', 'igmage30_wp841' );

/** MySQL database password */
define( 'DB_PASSWORD', 'i10l[]p2TS' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         's5mjdgmp0jv0jf3n4umoyr77jcybksbe4fhydhkgjaarhbqdqfi4dsbgvx3wwnwf' );
define( 'SECURE_AUTH_KEY',  'lpaczasnhxn14ifqlg66ntiedt75ebywtilggnd6e2g4y108qvwpwcwcyytzywfy' );
define( 'LOGGED_IN_KEY',    'vpxodqh3hirote1ahokl6jkqyvkprocrq9u73b6dwdlzvko6msahfozvqctonykr' );
define( 'NONCE_KEY',        'tyb5wdifjs1jtsdmxgangnhinxugylui3liyvnpavnfgmzvzczdro2caaaw1wm6w' );
define( 'AUTH_SALT',        'nehbsbnqdbg5t6ypuohsh6qfjhhnh4g6s7qrv7qqn8p9kqzz8exwspvjqqto89bi' );
define( 'SECURE_AUTH_SALT', 'i30kycepongkumg2tlmvzgpageocjnngco2hgks2hlsz13th8hnoxj0obffzp89z' );
define( 'LOGGED_IN_SALT',   's6biwkbnsniujgq9qnvziu10xzmovhp5djlwkkce4ie6c5eizw5tgmrvnoljc0xi' );
define( 'NONCE_SALT',       'cp7r0sda11nlqszmkc88ys14tcxkp7u9htdi7wyosxrpsfz28retsk8xsqenxeq3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpuw_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
