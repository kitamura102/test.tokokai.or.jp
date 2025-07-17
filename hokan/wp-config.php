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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'v1067_wp_7mut3' );

/** Database username */
define( 'DB_USER', 'v1067_wp_ic6hg' );

/** Database password */
define( 'DB_PASSWORD', '@3keobGa45QCkz#n' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define('AUTH_KEY', '5][QmQ#85BHr2s3*s0K43ElE[wUtS(~CbI|a91b+NMee6[7S5X;J~9-+[PxI8C7)');
define('SECURE_AUTH_KEY', '|+e82LjsKH0v#81TXc87N%WB*x8|2*D08F95g@B@H6/G86)]*+o[1q5*n44;1t%@');
define('LOGGED_IN_KEY', '#06|9b4ov1R8jiSlHH:7&I[e5yYh_Vv2Ah1F[]:X+Jx-2NQIq*)1#&M7_G10AVEy');
define('NONCE_KEY', 'H7]Ri2&);6k+5p4YCRgc7]2S50z3Dy_&@!M)9]rM1@-y+8AOL~C|(1/e~TV(90!D');
define('AUTH_SALT', '(05)A5G9pgE8&)69GQ:96f49E9UsMw86y/]P75U)x)p5o_(19|rhv!0-bb*0#M9+');
define('SECURE_AUTH_SALT', '1E6;oq6X&Jv;5zh&~%074mr1jKwv;+x0G&bLDAqLFn&!r~_rq4D8&4T|@8Gr3YL5');
define('LOGGED_IN_SALT', '2161(9[2-AtCq0uhi1--2y&%1DLyt:~E@bC4UCob1j0:_X3Ued_0xC!uCML9wnZt');
define('NONCE_SALT', 'z*hg!4rM457&y@63a5MJ[kiM_vY7[6:oR[/f0lfC2e3_6*3~c17;rkk8NQ3Av7I&');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'vjNzV7Rv_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
