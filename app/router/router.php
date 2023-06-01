
<!-- ----- debut router -->
<?php
require ('../controller/ControllerAdministrateur.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerPraticien.php');
require ('../controller/ControllerSpecialite.php');
require ('../controller/ControllerRDV.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
 case "administrateurReadNombrePraticient":
 case "infos" : 
 case "ListePraticiensSpe" :
  ControllerAdministrateur::$action();
  break;

 case "??" :
  ControllerPatient::$action();
  break;

 case "??" :
  ControllerPraticien::$action();
  break;

 case "specialiteReadAll" :
 case "specialiteReadId" :
 case "specialiteRead1" :
 case "specialiteCreate" :
 case "specialiteCreated" :
  ControllerSpecialite::$action();
  break;

 case "??":
     ControllerRDV::$action();
     break;

 // Tache par défaut
 default:
  $action = "DoctolibAccueil";
  ControllerAdministrateur::$action();
}
?>
<!-- ----- Fin router -->