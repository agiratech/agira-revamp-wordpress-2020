<?php

/** Enable W3 Total Cache */
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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/var/www/wordpress/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'wordpress' );
/** MySQL database username */
define( 'DB_USER', 'admin' );
/** MySQL database password */
define( 'DB_PASSWORD', 'admin@123' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         '=f.dbz5Onqy}nt<|M@an8/T!HO9_oci+wj7;~PLcXybDVmc <wP<:$*aJ=5WHf;w');
define('SECURE_AUTH_KEY',  '8*Y8_`0xoNl|_]BQD+(+3WP(s<*&*]sN+rXGC2fLEvIi,O@C~Pfl`B2-r){lG%&G');
define('LOGGED_IN_KEY',    'w5i`&xrx`}^0b6*VkzL[ZkiF;+|ld1$_d)V :;J@kl+d%fW5lTw7Hj[Ak^sU-&8{');
define('NONCE_KEY',        '-5M3IH~C~.)_?S4!?O%-5+n?|JZv?G.0GM-G?$*uN_&<_+Jg%{tkG{~_q<YJ7Zsr');
define('AUTH_SALT',        'Q*VFb~{z-,kJCO0t sRq>47DeBtH&ToakIniCyS}KndQdt&Q!O[B(rf*yxQ+]:T ');
define('SECURE_AUTH_SALT', '&<v-t{F(g-*-~[+,g+ZmBAS.48IxTGc*t/|{9.MKT*8DT<:}r]rW6%&I70Wcc+D-');
define('LOGGED_IN_SALT',   'g?($==wEr=;Jc[RqV8vCD={PPK,dI}72fE~J)t4:S1fF#(1I+u%+NR*y%`en$H#j');
define('NONCE_SALT',       ';9 $7NjcX(gn3msa#.z^+/lM?^[rWM{gZ2vDY[:x+/_go5HauLS5kl##GfX_TR#o');

/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'aws_wav_3';
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
//Disable File Edits
define('DISALLOW_FILE_EDIT', false);
