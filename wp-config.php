<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'vivien');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',Jn[D gTpCNVnZt Q~0.%cSGR1gD;kpgk2JYp@H$2X8%5,gy3Icnp-M,;nDn2en5');
define('SECURE_AUTH_KEY',  'xMMq{8&@o|6Bh0aj0X^CJ]_2rZu.JIMP_x)N&7nZE)Lsgs+in^rap7TJ=us^{{Im');
define('LOGGED_IN_KEY',    'Y$+iWuO|x2oXpxT8Cc|XP>ORi).g8S9<hrJsZ7Xwui&D}v4AsHaQtNc03+WU-nK|');
define('NONCE_KEY',        '_v!~1uUIB1H-3X32 BTVRwUibn/1-C:>H~bpgp@mY&M6gjD2mo4BI!=_%A$;>!/N');
define('AUTH_SALT',        '&[N?VDT-i$ `U$l7;.@6LFDhk@`$;-$OU9%hbRFaF8KdSG}d1Z3<RSOwYbyLSI`J');
define('SECURE_AUTH_SALT', 'DCT>a=Qzqu3i.Ydv0z+-)`R[qeadw>BJxRVE0*AC%wNJ<do]$j8Lr`A/N]=F]u5Q');
define('LOGGED_IN_SALT',   'aVi{wse&Y(TJz+ETgNJW5/qMhc![@=|%*w]mZxy`aPy{7>E[fzMyRM2hq}S//5r=');
define('NONCE_SALT',       'E_c{;httL;aD{@j-2<g+J&x.ieT.U!Y0_l?iM>#/FK`c^Xpxj_x(ZR(H=ObY61_j');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');