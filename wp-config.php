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
define('DB_NAME', 'wpforbento');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'U|1{t^_]8W*K8VEUQx|q4Fs+A0+~c}w%Po$b*^etRfE&TrO5v2#:lt^U|U?_LQ*+');
define('SECURE_AUTH_KEY',  '?!W^Nkj+r74GZ%~qOys x2dHdK0M3l_hAWAo360=kAAf92f#t{]8pRFIAewS.t4A');
define('LOGGED_IN_KEY',    'sBiRooaaVBg]|!{&owcU dGx_6^Qruwz6IP}Op) V{3VHVWJKS-(%+!2;;xFqXI(');
define('NONCE_KEY',        'J=BPy*F12z_fk<BE@E~9A~i^%CQ<:{!vEH-h90bR+O@@N#!+cjx_pcP/gA$$x^eg');
define('AUTH_SALT',        ')5]m(p3R.w!R`+mHmz}i{8Hyn4*3#+C)i4<K1uc]hW0%s<OLi^MjRrgL>V-sbe{i');
define('SECURE_AUTH_SALT', '4:HoL>8}X!5,|X YVM_sRd&ob1%Ymj:4eC{OP5?X1BpxJSc1mXN3=V[x1]yTo<u!');
define('LOGGED_IN_SALT',   'Ha5M<^|$Z i,(EXMp`GN$q;[]=S9Bq|<|[U#&29G8fs%oNYcPcN;(0fmn=I{I47G');
define('NONCE_SALT',       'Nf1Gtho=WRFtc6=CK}K;GftP}+?M-t;kG3Fl.R>$;&I~`t)b/+o)Dj%R].Trq5Q%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
