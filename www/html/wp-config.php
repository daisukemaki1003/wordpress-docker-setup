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
define( 'DB_NAME', 'wordpress000db' );

/** Database username */
define( 'DB_USER', 'wordpress000kun' );

/** Database password */
define( 'DB_PASSWORD', 'wkunpass' );

/** Database hostname */
define( 'DB_HOST', 'db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         '63u}E2u]|Qo@x+Gj_~iqkIYSy!.yzfajAWS@-}vy>S^G>_3jawi3ppr|4GIkC`I6' );
define( 'SECURE_AUTH_KEY',  'UCqWu(l_/-Y;CYBam/2fPjD.$f*YJ^G@tBG~@@o#<U,@Cnm$Pyk-x<|v;P!#<TC6' );
define( 'LOGGED_IN_KEY',    'sA4cyk?(TWRfhK?n:z^n4`u{;gH;lYB7m?7`4)(}kn_QL(X_emDzw#Jvq!IjRFW)' );
define( 'NONCE_KEY',        '8(cebC*)YJb}5?(&TBWP`uXzat(X`]Uf?5K2LJ&^fRa]AEu8RZ7~;{Xj,(G&pq+;' );
define( 'AUTH_SALT',        '%Qy9RuJ{(5?`M5=8J1p|6AU`e39AZ^s(l|u5r,P-$&{KGD!WH&Z%XL8%HDNflI!K' );
define( 'SECURE_AUTH_SALT', 'Sd7hch^OzAq+xnNvq#$/x 7F.nOWR@;&acsJ<Wb s-XNaZ,fOX?mTm8@LNYQnr{m' );
define( 'LOGGED_IN_SALT',   'fOG[hwg(lKv|:L<CVAcdRBBw6%B+-xA:oxw;f~vZ.NxKq7[fP=Z,ukMM>j@Q|ZCz' );
define( 'NONCE_SALT',       '~Dpw`]l8A=/ejX)2v_a(MJaT 2T8SdV?.qm`..L;cU{7T`B c/)A,02K]uMY+II9' );

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
