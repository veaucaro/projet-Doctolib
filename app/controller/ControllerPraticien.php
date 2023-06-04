<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControllerPraticien {

  // page d'acceuil
  public static function DoctolibAccueil() {
    include 'config.php';
    $vue = $root . '/app/view/viewDoctolibAccueil.php';
    if (DEBUG)
      echo ("ControllerAdministrateur : DoctolibAccueil : vue = $vue");
    require ($vue);
  }


  public static function AjoutDispo() {
// Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/praticien/viewAjoutDispo.php';
    if (DEBUG)
      echo ("ControllerPraticien : praticienAjoutDispo : vue = $vue");
    require ($vue);
  }

  public static function AjoutDispoBase() {
    $rdv_date = $_POST['rdv_date'];
    $rdv_nombre = $_POST['rdv_nombre'];
    $praticien_id = 50;
    $results = ModelPersonne::getAjoutDispoBase($praticien_id, $rdv_date);
  }

}
