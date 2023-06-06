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
        $rdv_date = $_GET['rdv_date'];
        $rdv_nombre = $_GET['rdv_nombre'];
          if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
      $praticien_id = $_SESSION['id'];

        $lines = ModelPersonne::getAjoutDispoBase($praticien_id, $rdv_date, $rdv_nombre);

        $results = ModelRDV::getDisposPra($praticien_id);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewDispos.php';
        if (DEBUG)
            echo ("ControllerRDV : viewDispos : vue = $vue");
        require ($vue);
    }

}
