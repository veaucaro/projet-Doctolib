<!-- ----- debut ControllerSpecialite -->
<?php
require_once '../model/ModelSpecialite.php';

class ControllerSpecialite {

    // Liste des spécialités
    public static function specialiteReadAll() {
        $results = ModelSpecialite::getAll();
        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewAllSpecialite.php';
        if (DEBUG)
            echo ("ControllerSpecialite : specialiteReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function specialiteReadId() {
        $results = ModelSpecialite::getAllId();

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewId.php';
        require ($vue);
    }

    // Affiche une spécialité grâce à l'id récupéré dans le formulaire ( specialite/viewId.php)
    public static function specialiteRead1() {
        $specialite_id = $_GET['id'];
        $results = ModelSpecialite::get1($specialite_id);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewAllSpecialite.php';
        require ($vue);
    }

    // Affiche un formulaire de création d'une spécialité
    public static function specialiteCreate() {
        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'une spécialité nouvellement créée
 public static function specialiteCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelSpecialite::insert(
      htmlspecialchars($_GET['label']));
  // Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/specialite/viewInserted.php';
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerSpecialite -->


