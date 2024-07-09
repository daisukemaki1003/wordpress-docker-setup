<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define('DB_NAME', 'telepathy_spicemart');

/** Database username */
define('DB_USER', 'telepathy_spicemart');

/** Database password */
define('DB_PASSWORD', 'zDXrpgcpHLaneGRX6Tgg');

/** Database hostname */
define('DB_HOST', 'db');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '^!Q~L`fqmM4E&c<Z>r,B[|I&75>G6;9jmF{XVybdih?/<K;P?/,tJOolXN&h6TLG');
define('SECURE_AUTH_KEY',  'jhQ*dZ_3pP6Q:2xv%bjnwX@T%I`aD-wv$nbE}=l:}H!V>Gg,`2AM_<b@zK1-a<Dv');
define('LOGGED_IN_KEY',    'Z&x)Iar`]kPeJ)v6%nJBby/EX:tNT[iY^Q2RzFi0NEV9z99Dz<MK|N7*&MB~J,Jd');
define('NONCE_KEY',        '3#Bnd>r#S.^dN_$-cy{N4jBeFjdG~t%fEy,:G9y*#3OQ-(k<SfPLXumZm3Aq&`NJ');
define('AUTH_SALT',        'GXjR >X51-P4LP$7e!y&TbCzpt(9?[[<7FfGE3-I~z<096]6Cj}vj?(4@c&oJ7oo');
define('SECURE_AUTH_SALT', 'LL*``(@gHPgsFP)WT{-su-mcSMXZ1s7% QfU<26}_0%,./K6{<AzV~LU<tWcMjT4');
define('LOGGED_IN_SALT',   'Nh$%w%YC?gqG=t4t>K.jd>29PhgjC}SK(#%5Z3yg$9AcTydd?oDGPV02[Qka`L1j');
define('NONCE_SALT',       '_RB&0(tS.=tS%3m_k7N/_=x-gPc>YBbQx5TcHSSFf[K$y9HS<rbD)]hnBjH@eF9+');

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
