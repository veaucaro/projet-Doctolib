<?php

class ControllerConnexion {

  // page d'acceuil
  public static function DoctolibConnexion() {
    include 'config.php';
    $vue = $root . '/app/view/viewDoctolibConnexion.php';
    if (DEBUG)
      echo ("ControllerConnexion : DoctolibConnexion : vue = $vue");
    require ($vue);
  }

  public function DoctolibConnexionDonnées() {
    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $password = $_POST['password'];

    session_start();

// Stocker la valeur dans la session
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
  }

}

?>
