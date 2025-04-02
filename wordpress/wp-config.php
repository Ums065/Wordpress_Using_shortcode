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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'positivus' );

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
define( 'AUTH_KEY',         ',VCe3>.36*R9+Q>.NJRV||7q~sN6^^@u@wB?C`)1svH~[d.|AvD&P+wQe~S`L<H}' );
define( 'SECURE_AUTH_KEY',  'Mfak<3i{=NV?63<8uGo!3:o{a$PZFrdk sq<w{!QD:_ypFex+.@S7+#3-MLPCG#6' );
define( 'LOGGED_IN_KEY',    'S*}}=qb~T]iU%pH`H|u/K:>BrBck%:LR%6c+^F`I^I3 )z9b@DlY6){]D&H1=5X+' );
define( 'NONCE_KEY',        '&_l+z6iHZSoG;k3 DwFnqZK:;]3yrn07qvC,i@:D>g=>rRn}`?Q]ua>s22^> a1k' );
define( 'AUTH_SALT',        'Xh_BIk;Qdj}<Hs7;F$!OhW%v34kq-MgZfj`O<&}Ug=MPs[Gc43J2{of5%fGNT}=:' );
define( 'SECURE_AUTH_SALT', '9Bv,~N2eWJT,WY<$K!(HDk|k,vm]P%#76k2htm!rqh(=RgQF+ 1| qundf64VU`p' );
define( 'LOGGED_IN_SALT',   'LhH{sKS4B-; ,n^*)}sp?T/-C(=r};/oWsY$#oph*ua*O8hG+Q^`Xv>_RCG2Od,u' );
define( 'NONCE_SALT',       'ng*wI7015Cg-IvgPND@1(ipPBrSCz+D?RJg2Q)>#`5Zsnfn98cHZKnlbw(z*>d!1' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
