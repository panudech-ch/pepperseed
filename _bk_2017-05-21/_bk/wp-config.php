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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/pepperse/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'pepperse_wordpress');
define('WP_MEMORY_LIMIT', '32M');

/** MySQL database username */
define('DB_USER', 'pepperse_peppers');

/** MySQL database password */
define('DB_PASSWORD', '8MgwWC5cmrAG');

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
define('AUTH_KEY',         '{+M[x]xLR@@*pe.5hr|R;Sg;^=|DROm}$Ul|Gp,9+0_&+8v[43l01)}rs6+^/_N<');
define('SECURE_AUTH_KEY',  '89dC|C(FY<5@^P.6!jHiKC(9BYQt%b3]RR?+ n?<w}Z~+IimYJRq/R&`p4O=KvWj');
define('LOGGED_IN_KEY',    'D=I-d|3bdrUSjt,SbtoW(@6Eti}i-Q%4]0xJ6(|<jN&J%ZJCikx--U)TVlewI0p+');
define('NONCE_KEY',        '2|q#B.EyPM,]-b%r5F]1{PaX4#Dc>RZ_-ymn&TFwmcu*a{v5M2MqLS(bqOT{2pP~');
define('AUTH_SALT',        '`Cky5}k{j]Lp:/FMR9)Er%Ss#r5`Xb3Z7aPD?]rP[%`%^|$`kg#!=W--s3{z,b#h');
define('SECURE_AUTH_SALT', '`YvOHY{QmKTvSMo{p)Ox7vetXAOn}|Kz50VSCr[>.w=;tZv_0D0!|;iF`/i-f-AC');
define('LOGGED_IN_SALT',   '$#mm7n.2![I:AB+[h!TX_mX`Ij=csz-wXC!h-07IFv.x^{ug>dJI4eL@wmlq})Cl');
define('NONCE_SALT',       '1GqhynQ$!mw[-R#$euptE}95dF%>Iznen9SS9=|vm|/]<dj,Iwuy GQ>oq{>@JZE');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
