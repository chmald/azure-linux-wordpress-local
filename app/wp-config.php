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

//Using environment variables for DB connection information

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define('DB_NAME', getenv('DATABASE_HOST'));

/** MySQL database username */
define('DB_USER', getenv('DATABASE_USERNAME'));

/** MySQL database password */
define('DB_PASSWORD',getenv('DATABASE_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DATABASE_NAME'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Turn OFF auto updates **/
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/* Security for Wordpress : 
you may wish to disable the plugin or theme editor to prevent overzealous users from being able to edit sensitive files and 
potentially crash the site. Disabling these also provides an additional layer of security if a hacker gains access to a 
well-privileged user account.
Note : If your plugin or theme you use with your app requires editing of the files , comment the line below for 'DISALLOW_FILE_EDIT'
*/
define('DISALLOW_FILE_EDIT', true);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'acPaS;.(+DcR)AM45%{`am|Kt4ZYqk}Y_$(,(xZ%/*5A=za+0+pdfuoYskEFRq31');
define('SECURE_AUTH_KEY',  '$M:uU|YBw-+z{$C~UKez0qw]1|pr.q?$@#Ak|-2G0mLOzM*R[EDSdcG|&0s-6xd&');
define('LOGGED_IN_KEY',    'u>k9E:iskg8/.F7e|i_q+h[]bU/@+I$TP7|?9{2-I^3JuWM{v|jt&Qw#+qM!q88W');
define('NONCE_KEY',        '4)m6c^b+<L]3$myY-pGOU DZ|Ji&Ak%>CFbE%%hv!l4h)!,&OQ}N?sVZI,8s0Z+ ');
define('AUTH_SALT',        '7B-k}s$)0M 9+op0p#+dk7 x lAFhCW}}>@F|-TGo8kxthzeN(Xr~,a,-mHK- D ');
define('SECURE_AUTH_SALT', ',#kR(]6/]C6IW|bM}|aN>-rAXgT=]/Z%T##ki=c|kU5I}):AXs$B?lOj)sG7YlXJ');
define('LOGGED_IN_SALT',   'xr+Ra;:w}}d+([UyXY6CZ(WYie)T@vBx/26DZgv5UIPiyz@kr|o(0i#yK~4l)EG~');
define('NONCE_SALT',       'w+d^MJW+%s[7P:e7DxUb+9,<g`XR;k/W|Xz462d8Nr^QZ6HY`-$YHaxG I}Ln8^^');

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

//Relative URLs for swapping across app service deployment slots 
define('WP_HOME', 'http://'. filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING));
define('WP_SITEURL', 'http://'. filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING));
define('WP_CONTENT_URL', '/wp-content');
define('DOMAIN_CURRENT_SITE', filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING));


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
