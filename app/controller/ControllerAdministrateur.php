<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControllerAdministrateur {

  // page d'acceuil
  public static function DoctolibAccueil() {
    include 'config.php';
    $vue = $root . '/app/view/viewDoctolibAccueil.php';
    if (DEBUG)
      echo ("ControllerAdministrateur : DoctolibAccueil : vue = $vue");
    require ($vue);
  }

  
  
  
  // PAS UTILISE POUR LE MOMENT
  public static function administrateurInfo($param) {
    $_SESSION['controller'] = "ControllerAdministrateur";

    $resultats_specialite = ModelSpecialite::getAll();
    $resultats_administrateur = ModelPersonne::getAll(ModelPersonne::ADMINISTRATEUR);
    $resultats_praticien = ModelPersonne::getAll(ModelPersonne::PRATICIEN);
    $resultats_patient = ModelPersonne::getAll(ModelPersonne::PATIENT);
    $resultats_RDV = ModelRDV::getAll();

    // contruction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/administrateur/viewInfo.php';
    require ($vue);
  }
  
  
  
  
  

  public static function administrateurReadNombrePraticient() {
    $results = ModelPersonne::getNombrePraticien();
    // Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/administrateur/viewNombrePraticient.php';
    if (DEBUG)
      echo ("ControllerAdministrateur : administrateurReadNombrePraticien : vue = $vue");
    require ($vue);
  }
  
  public static function infos(){
      $results1 = ModelSpecialite::getSpe(); 
      $results2 = ModelPersonne::getPra();
      $results3 = ModelPersonne::getPatients();
      $results4 = ModelPersonne::getAdmin();
      $results5 = ModelRDV::getRDV();
      
      // Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/administrateur/viewInfo.php';
    if (DEBUG)
      echo ("ControllerAdministrateur : viewInfo : vue = $vue");
    require ($vue);
      
  }
  
  public static function ListePraticiensSpe(){
            $results = ModelPersonne::getPraSpe();
      
      // Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/administrateur/viewPraSpe.php';
    if (DEBUG)
      echo ("ControllerAdministrateur : viewPraSpe : vue = $vue");
    require ($vue);
  }


  // --- to be continued
}

?>