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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'exBV334)D169t[r&ewEgE UG^a5l_#6nX|5}g/^K_AFy:l=ta&x?w64f$a^Cq`z5' );
define( 'SECURE_AUTH_KEY',  '*XQ0`I*z7tbojU)R]ZlAIK{wf>69hL?7K~xz)FwK8vd(V6X`%(aZ0uF2 9Afy&?Z' );
define( 'LOGGED_IN_KEY',    '.V3wR?b?#}~:W!a2*7?K8</JG;O(RPBnWmPN4FD}F&3;IC;>zNR8,f6Z#i/_<dz9' );
define( 'NONCE_KEY',        '$E&L^J_8iB=E0z7b~KBX:adi pX7~p]2CgNMf2wL@)CNI)=2dZrUz=_6mhK^W~.6' );
define( 'AUTH_SALT',        '|&$hlJd}|/Cyq]4y>t3ef{[@HHvnbbbwcELRhM~R8MKJ_a qk,mw]2]>)/V&[MkM' );
define( 'SECURE_AUTH_SALT', 'N1sf!T?kt`b,(BHd|qBr9J-#sn<EOZ@r.,T=8Ab64n]8s2>~@PvK@fGAwdDl%mPo' );
define( 'LOGGED_IN_SALT',   '{0sM_gZnNOe#KZS>~Xq3po}2+f04I[NJb=X!|b&rK};XR!]wXXL!gHp%{D@N!s7&' );
define( 'NONCE_SALT',       'Z {LJ|Y.Zc[5Q7wGpPYD.0opem`_29(tig|,BW$$;}icM9aup&yHeAJ$1g(},VM5' );

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
