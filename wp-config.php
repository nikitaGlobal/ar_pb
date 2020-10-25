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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'newproject' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'u*+N4RDy&nnbi2TDc/Xu9y #:x^m|q1bAoYaHR`1|*km;]#A5JL<kdo*AVUu3dXk' );
define( 'SECURE_AUTH_KEY',  '^T+s&b09K{B|CTDCo*(`@UrH*Qv~>zke,MV_[AKqBIZYLl73z!^7q>3y*UmnXkw@' );
define( 'LOGGED_IN_KEY',    'x s[d1EE`{GDx%; (umdL+A`!K*n(r9USu0Ra<Ac%~yY}Xj<x66%`j[1eT?@{ F~' );
define( 'NONCE_KEY',        '5U<)({b=rk:>hO_YuTHcZ{+zu0{$>G3sn,jmWGtmT5cc$L4v[uk[c=^@RES&9*di' );
define( 'AUTH_SALT',        'DD&6k<+5cs{t; l-HgW-gH*;[ Z|WMX!+pw#ADmhR#<4?B4V]83v+`h!C8ngFQgq' );
define( 'SECURE_AUTH_SALT', 'cJ*D0TcVf2gFmyI`BFY>kM^?n4h!z<1cy@OXGL+;Z<L-|-TurHm`(/-4Go~tYHTE' );
define( 'LOGGED_IN_SALT',   'GfG<)juj9>X$&#JH2~exl$8O7:2!k~;TNu{0VW1eUu)27wym+a!MuG_!@ArZXgWi' );
define( 'NONCE_SALT',       '<x<5,#)VD6[3lCD)R9w*4!K330&(nb{Uy9Es^$c]b};{d{[k7YT]<s.8]w8X^4HN' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
