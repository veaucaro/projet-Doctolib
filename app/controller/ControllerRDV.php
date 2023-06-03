<!-- ----- debut ControllerRDV -->
<?php
require_once '../model/ModelRDV.php';

class ControllerRDV {
  public static function dispos(){
      $praticien_id = 50;
      $results = ModelRDV::getDisposPra($praticien_id);
      
      // Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/RDV/viewDispos.php';
    if (DEBUG)
      echo ("ControllerRDV : viewDispos : vue = $vue");
    require ($vue);
      
  }
  
   public static function RDVprisPatient(){
      $praticien_id = 50;
      $results = ModelRDV::getRDVpris($praticien_id);
      
      // Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/RDV/viewRDVprisPatient.php';
    if (DEBUG)
      echo ("ControllerRDV : viewRDVprisPatient : vue = $vue");
    require ($vue);
      
  }
    
}
?>
<!-- ----- fin ControllerRDV -->


