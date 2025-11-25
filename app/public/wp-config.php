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
define( 'AUTH_KEY',          'l@)h5fN31|`cHgb!BA$dBq;4Ofu/:r%nIeFN.<]}D;{`;+<f`A7uhnS-/6VBk1~v' );
define( 'SECURE_AUTH_KEY',   '.H,O%cr*H4Hc)e2/`{=:NaVRvOR|GP|I9W9ZPe3DZf~D*6|.a&d(@HCkR^B1eWxM' );
define( 'LOGGED_IN_KEY',     'bvz?c{&m=o3o|DbPOF;wDKG^}>mi0X|&9jsA7x8v *cJUDe<l^Q=V.ExQ!gm1m6v' );
define( 'NONCE_KEY',         'c?mcpeGmm]+fOEW)y4lXExcKyH6+5Wvg>Hj0q8-Nvx#:`Ddo=4(k/>1BgpJ1in;.' );
define( 'AUTH_SALT',         '];0crWJW%V4*otquAllvu?JDe&&x}fLK_){9p:;H3oYk@q7F ]}:]oE6k-5NQ7B&' );
define( 'SECURE_AUTH_SALT',  '+7=fux89k4<%!K.DJYq}wF1o,X7_u%`IUxA06,2:aH?`a]_3ZT8Su,:rE/Ba2lX*' );
define( 'LOGGED_IN_SALT',    '6xYTPl5q%J*Ig6HrU;>i/B.WcaH&:FPbJ/!Q6$zb_&r~deQb<gcYVgO5>$$F+**(' );
define( 'NONCE_SALT',        'YV;[1Uy~)%}6&^c3`%dItd;U)gF/)EMNtkcdi1R.8b:%iwL-bkc/OTnH{`0ncQD6' );
define( 'WP_CACHE_KEY_SALT', 'V^~)6Z_O3*-J;SGCfN 92|u.KaQ?SMBjm0jYb^=J`:NTeAVvwiI3|Y6N6YjvuqXC' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
