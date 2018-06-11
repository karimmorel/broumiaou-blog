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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/Applications/MAMP/htdocs/blog/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'PEPITO@0711!gg');

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
define('AUTH_KEY',         'A7[ZLCgRp:!FAj`vS)%a6BaAuOs9Adn.836a+4:vFC76rt.cg[Cx&m}XO$D2uP?.');
define('SECURE_AUTH_KEY',  'fC!RJ-m|LKt%;(i<,OmB8$E+N/T==J0$anmC@i%H}r?-lM{P+p^2 tr=?,K1@Enl');
define('LOGGED_IN_KEY',    'o8g|C&<%p}%%kzje+uii_:9 2g=Q?$fu(8ARYyPMSbxE(Eg|h&Uls)A,pnStc#,0');
define('NONCE_KEY',        '9$gynM!z_,~QB/g|~5SJghehe:WL0Tz.[ MN7x{6lfV@?G^Slw9U|!(TsQbX/Lft');
define('AUTH_SALT',        'R$MY%(VM S%5]ryZHEP{(Q|*$N3rF2^BV;}n`VQK6gyt+]nt]h6le{}9y^4t$N*@');
define('SECURE_AUTH_SALT', 'q%LDCnXOH<eaU*kuzUet?fsP<RU%Iweg$9TZ[mkH7HrZtOmh*B)5Z#._<w^9<I+b');
define('LOGGED_IN_SALT',   'tBZqrGbRL~mue;7p%W*:1f6H!p/$Vy2Cx!ST (d=}{!Q}, ;i$jP]G!F_3&+>Id7');
define('NONCE_SALT',       '3k6S)O$qFUA(S&6JARu0bjYuVku-rbV,v2Hnf j|@(z]{{+O3BKu%KiO~-_^|0OK');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'blog_';

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
