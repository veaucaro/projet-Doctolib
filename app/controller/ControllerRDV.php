<!-- ----- debut ControllerRDV -->
<?php
require_once '../model/ModelRDV.php';

class ControllerRDV {

    public static function dispos() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $praticien_id = $_SESSION['id'];
        $results = ModelRDV::getDisposPra($praticien_id);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewDispos.php';
        if (DEBUG)
            echo ("ControllerRDV : viewDispos : vue = $vue");
        require ($vue);
    }

    public static function RDVprisPatient() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $praticien_id = $_SESSION['id'];
        $results = ModelRDV::getRDVpris($praticien_id);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewRDVprisPatient.php';
        if (DEBUG)
            echo ("ControllerRDV : viewRDVprisPatient : vue = $vue");
        require ($vue);
    }

    public static function mesRDV() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $patient_id = $_SESSION['id'];
        $results = ModelRDV::getmesRDV($patient_id);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewMesRDV.php';
        if (DEBUG)
            echo ("ControllerRDV : viewMesRDV : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un praticien qui existe
    public static function prendreRDV() {
        $results = ModelRDV::getAllNamesPra();

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewPrendreRDV.php';
        require ($vue);
    }

    //garde les informations saisies dans formulaire de la fonction prendreRDV() et propose un autre formulaire avec les disponibilités du praticien sélectionné
    public static function prendreRDV1() {
        $names = $_GET['praticien'];

        $praticien = ModelRDV::getNomPrenom($names);
        $results = ModelRDV::getAllRDVPra($names);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewPrendreRDV2.php';
        require ($vue);
    }

    //analyse des informations données
    public static function prendreRDV2() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $patient_id = $_SESSION['id'];
        $RDV = $_GET['RDV'];
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $RDV = ModelRDV::getRDV2($nom, $prenom, $RDV, $patient_id);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewPrendreRDV3.php';
        require ($vue);
    }

    // Supprimer un RDV (supprimer une disponibilité pour un praticien)
    public static function SupprRDV() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $praticien_id = $_SESSION['id'];
        $results = ModelRDV::getDispos($praticien_id);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewSupprRDV.php';
        if (DEBUG)
            echo ("ControllerRDV : viewSupprRDV : vue = $vue");
        require ($vue);
    }

    // Analyse du formulaire pour supprimer une dispo
    public static function dispoSuppr() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $praticien_id = $_SESSION['id'];
        $dispo = $_GET['dispo'];
        $suppr = ModelRDV::getdispoSuppr($praticien_id, $dispo);

        $results = ModelRDV::getDisposPra($praticien_id);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewDispos.php';
        if (DEBUG)
            echo ("ControllerRDV : viewDispos : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerRDV -->


