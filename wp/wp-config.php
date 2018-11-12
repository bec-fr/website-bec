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
define('DB_NAME', 'becfrance_wp2');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'becfrance_wp2');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'Mt7MtjamYLV7zKfw');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Rer<O5T]Lri3i,|u%J!Wn!DH1%aPo<BUa,kLV&)ZD.(X!P3J:i(j=9>rS2CmL F,');
define('SECURE_AUTH_KEY',  'qA8T?2K*:#T:oL|,%6Ip ]*^X7_{d6aZPk`T[4YX02p#Qx*m_MU?(>n(yP;y-x5.');
define('LOGGED_IN_KEY',    'w@MlNBQntUN~-*/FPa,[Drac_=I7xzLYb=0^nyEs6}^5#+uprbA+ho;/$4w2h}7;');
define('NONCE_KEY',        '%#PU3qp1(D!A6WqH]|B:-^ 1o{KvjOLpc~5Jzs?W_GWA?/{>O8H$n>vK|n.2jmm0');
define('AUTH_SALT',        'G]]Q!38u]U%@1,x0NIVD4b.RFpN=WSO~De9^*}#^X,d#FTq#NF]mD!aXXM@jAPDf');
define('SECURE_AUTH_SALT', 'zz?3IyBwyP4vd|(-HZ&+ucj@;RHh)`hlwrxq;B4!%~2wcUj+t[0x[l8X&[5$it0h');
define('LOGGED_IN_SALT',   'o9Bv|;vEQ,&rxmVct[xpB^8.i`[G$o,PZ[@S@8%#EOl/<Q{#FtW,qO4HZY|t#5|5');
define('NONCE_SALT',       'Pq@K%BV}G9tM.h.U[Qf#:DGAo;{iT^o+d$u=8%x<YSv5rT/pXKO(E?WP^?gQeSRJ');
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

/*
    Desactivation des mises a jour automatiques
*/
define( 'WP_AUTO_UPDATE_CORE', false );
define( 'AUTOMATIC_UPDATER_DISABLED', true );

define( 'WP_MEMORY_LIMIT', '128M' );
ini_set('max_execution_time', 180);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');