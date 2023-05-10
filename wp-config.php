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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'new_site' );

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
define( 'AUTH_KEY',         'GCZN$0N>R$Q27/KvCE$F|yWas<3Dsps({Gm77yV7q#93+ xbEuc]zS VFdM>7F5Q' );
define( 'SECURE_AUTH_KEY',  ']8zEmK$R<dtP%:G%()b}f9Qo@cvP>>8LPX.FY 2mlu@C_W)V}&2K:5?&>S<y&*Ii' );
define( 'LOGGED_IN_KEY',    '+0z[d`j<Va]U|lcc7aq|J[^m~RadCPk-UC}$AS{Z%B0oP%8v^W+s:P*2vHc4uDo]' );
define( 'NONCE_KEY',        '#a`]cOXAn6_6!OgG+r=ry8IyeMWeXr3U7/ [WpftF[?)I~o6PuiOb`5[AvoL2,w?' );
define( 'AUTH_SALT',        'Hwxn#@YErE^>(gh#D6v Hw=BP=Hm-#vszp<r~5jnJOyJu)u.&fa cqW>3=R!/_Q1' );
define( 'SECURE_AUTH_SALT', '}M|P+LgBvqTscH-)2 }Y1iP,V#FF!ri~_x[KH@fmV?T4<._]*x^Zt*qpOUnj<o(e' );
define( 'LOGGED_IN_SALT',   '~&u*OO+ys-=oyd}fl>B`sMKQT59_.g_Q7RwI#,: L}IeIR@;76AF ~4ELYjQN]4>' );
define( 'NONCE_SALT',       'h&VX*DqbqT_#0yDVt3U9uSC7[%S[EjbCr(rTb6:9rjR6#b18G UDZb!Mb(VB(`C-' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
