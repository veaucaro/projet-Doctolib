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
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];

        $login = $_SESSION['login'];
        $password = $_SESSION['password'];

        // peut-être que results devrait contenir les données de sessions à afficher dans le menu?
        $results = ModelPersonne::utilisateurExiste($login, $password);

        $_SESSION['nom'] = $results['nom'];
        $_SESSION['prenom'] = $results['prenom'];

        // Construction chemin de l'arrivée (souvent la vue mais ici, la page d'accueil?)
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        require ($vue);
    }
    
    public static function DoctolibInscription(){
        $results = ModelSpecialite::getSpe();
        
        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewInscription.php';
        if (DEBUG)
            echo ("ControllerConnexion : viewInscription : vue = $vue");
        require ($vue);
    }

    
    public static function InscriptionRead(){
        
    }
    
}

?>
