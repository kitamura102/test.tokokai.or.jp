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
define( 'DB_NAME', 'v1067_wp_gnoi0' );

/** Database username */
define( 'DB_USER', 'v1067_wp_qlskl' );

/** Database password */
define( 'DB_PASSWORD', 'ssndT5RB$N!6oYK7' );

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
define('AUTH_KEY', 's:dC&+r5;8);yRBw3u4R~2wmQ2+F5QQN[2)24_U;&78@H3EN*D#qM0|+|4**duXA');
define('SECURE_AUTH_KEY', ';j1R(8~:/&ejU68(Nbks&1!F(06491m2@(34%VuoM%B+[!Apde0bc+hH8#fT2z%/');
define('LOGGED_IN_KEY', 'S4520_L-u89959V1tDuT7Ze_Z6FR(Jv9R**h~o:4~k5gXYR3W644+W-H5(64DyiW');
define('NONCE_KEY', '_Xalc]62)0gJ7r7*/Zry@A064WY-PZ_5Q%F3OqN];iMB47Q;m*1&X5t7/Iyr(84)');
define('AUTH_SALT', '86!N_hupX72ES1(uZY0976_zp)+*~Ec%(haZY9VW!842V(;0T4DAJVO2&dCw&:n*');
define('SECURE_AUTH_SALT', 'F%3W595gPi9@%%W_*2|wH((#7%2JD0;A-/5D2p5a;9]b~1+P9)/n~~2hb[IJ%9-#');
define('LOGGED_IN_SALT', 'N5m%(Gi&:9w*)*H)nP+Yi2Z8S8R*O027h&o)8/9*+;0!t_:3];Hnkpni:7692D;n');
define('NONCE_SALT', 'k93;Q6bs840w7nsou_S0q5I%_p7J[i5!R4ZW0y##YLv3R:hoSZ@6O_z03TM6Kp!(');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'PD5dq_';


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
