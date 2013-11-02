<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cfinew');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '_$)Xw}60P>Uw|<pXn`Pie7^e<1(P>m:}}L)1:[94WROYm2GXdDvdXEq;49ERT`d ');
define('SECURE_AUTH_KEY',  'oR$.+5({[]Rl26^B-$Cnkpa*u}QG=OL`[)&=k+]U~sMuF<dER04L/a~I@v:m`Son');
define('LOGGED_IN_KEY',    ',.dAke?_m@Gdr^i2hhK3`157|J5+F)Y8Jsdo=:ke_QD2u|fT[<EyS`8IpXrJ0j0J');
define('NONCE_KEY',        'ukRUx3wQyY`8BFC~0AC@QFWw37(UW*~x#G.Q`K3H&jy}BpqLJj%sj.z|`??H[,Tz');
define('AUTH_SALT',        'p_@MVwlk}&~q~n ZN0H~>EC`J4YxDQ8!4|]Q6G#r?W:lz`B1pcVE,/kwqw_>x#n)');
define('SECURE_AUTH_SALT', '#``hs>yJS<_nf7&:w0)XXsI/iv0_xZJm6sI8zyQ5U}@5(M2bKOD[k*F{ECqREB.O');
define('LOGGED_IN_SALT',   'LJfmOa]CdPR8gm<(c$TZxpq-#jhD^:opZO/v ?r5vNkijYA3Ki=&O@L!jTzU2ByG');
define('NONCE_SALT',       'ay:iZBIhS,^bd~e*->b`(kDjp?QGUD>?IF_+9m!a[EX%4~`dq|!o06r:sOP+3?E;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'c4i_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
