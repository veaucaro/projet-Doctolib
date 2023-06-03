<?php

class ControllerConnexion {

  // page d'acceuil
  public static function DoctolibConnexion() {
    include 'config.php';
    $vue = $root . '/app/view/connexion/viewDoctolibConnexion.php';
    if (DEBUG)
      echo ("ControllerConnexion : DoctolibConnexion : vue = $vue");
    require ($vue);
  }

  public function DoctolibConnexionDonnées() {
    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $password = $_POST['password'];

// Stocker la valeur dans la session
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    
    // peut-être que results devrait contenir les données de sessions à afficher dans le menu?
        $results = ModelPersonne::utilisateurExiste($login, $password);

        // Construction chemin de l'arrivée (souvent la vue mais ici, la page d'accueil?)
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        require ($vue);
    
    
    
  }

}

?>
