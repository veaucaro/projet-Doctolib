<!-- ----- debut ControllerRDV -->
<?php
require_once '../model/ModelRDV.php';

class ControllerRDV {
  public static function dispos(){
      $praticien_id = 50;
      $results = ModelRDV::getDisposPra($praticien_id);
      
      // Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/praticien/viewDispos.php';
    if (DEBUG)
      echo ("ControllerRDV : viewDispos : vue = $vue");
    require ($vue);
      
  }
    
}
?>
<!-- ----- fin ControllerRDV -->


