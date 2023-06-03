<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControllerPatient {

  public static function listePatientsPra() {
      $praticien_id = 50;
      $results = ModelPersonne::getlistePatients($praticien_id);
      
      // Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/patient/viewlistePatientsPra.php';
    if (DEBUG)
      echo ("ControllerPatient : viewRDVprisPatient : vue = $vue");
    require ($vue);
  }
  
  public static function compte(){
      $patient_id = 201;
      $results = ModelPersonne::getCompte($patient_id);
      
      // Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/patient/viewCompte.php';
    if (DEBUG)
      echo ("ControllerPatient : viewCompte : vue = $vue");
    require ($vue);
  }

}
