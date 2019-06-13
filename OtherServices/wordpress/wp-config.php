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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'l9XgP?i3ImONFL~*sCUzO(YrgcrfRBI5c1z5Q$AodEs6_0!)(*P03Dl(~JJGh@oF' );
define( 'SECURE_AUTH_KEY',  '<ZERxk4`l8~%}m;mX5/+yC~o6xA9d$^:I]gIgab8E?WX<i^I|`S@[m=2Xs[V9s~c' );
define( 'LOGGED_IN_KEY',    '~rJD5y]{J#B#Uuu<]ADv/y1Md4rQxmnnGG?M+y0[;:3QsRb)5|hqeGlOOET!xG?9' );
define( 'NONCE_KEY',        'U8FF`wYB8YL4VK[<ujHO!j 9t13E5=4z+?1%1L=!sDC<tz~^)D5(NMu:UJZ8xG(B' );
define( 'AUTH_SALT',        'i$>#BSS$4MCL&=kERxsQc43l_d XZU,dzm87L*CIND%yUUMc3ns@2xK!D[,o[f{|' );
define( 'SECURE_AUTH_SALT', ')Rs>zgTSkQ|&!~xhwaCr&P<F,4X1/b.~4n(x[^t{uClc}8Y`=@=[WQYre<qDS3!N' );
define( 'LOGGED_IN_SALT',   'uKA5WPhy$?ydAk?4|&2;.36@&N?0`SB$Z*eAGp[NA8|^;5Lq6DX6|`0Mx~K=>>gx' );
define( 'NONCE_SALT',       'V]u~q*C8446 GcM%& t&-0-K}T0Jw@iR:xkWnY$XOzo4i]r7IK%MjrzkioQJUGmk' );

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
