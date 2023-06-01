
<!-- ----- debut config -->
<?php
// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
if (!defined('DEBUG')) {
  define('DEBUG', FALSE);

  function visu($param) {
    echo("<pre>");
    print_r($param);
    echo("</pre>");
  }

}

// ===============
// Configuration de la base de données sur dev-isi
$dsn = 'mysql:dbname=veaucaro;host=localhost;charset=utf8';
$username = 'veaucaro';
$password = 'bcVD9zqy';

if (!defined('LOCAL')) {
  define('LOCAL', false);
}

if (LOCAL) {
  // Configuration de la base de données sur localhost
  $dsn = 'mysql:dbname=doctolib_base;host=localhost;charset=utf8';
  $username = 'root';
  $password = '';
}

// chemin absolu vers le répertoire du projet SUR DEV-ISI 
$root = dirname(dirname(__DIR__)) . "/";

if (DEBUG) {
  echo ("<ul>");
  echo (" <li>dsn = $dsn</li>");
  echo (" <li>username = $username</li>");
  echo (" <li>password = $password</li>");
  echo ("<li>---</li>");
  echo (" <li>root = $root</li>");

  echo ("</ul>");
}
?>

<!-- ----- fin config -->