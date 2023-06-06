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
        $login = $_GET['login'];
        $password = $_GET['password'];

        // peut-être que results devrait contenir les données de sessions à afficher dans le menu?
        $results = ModelPersonne::utilisateurExiste($login, $password);
        
        if ($results == "Identifiants invalides") {
            // Construction chemin de l'arrivée
            include 'config.php';
            $vue = $root . '/app/view/connexion/viewEchec.php';
            require ($vue);
        } else {
            // Construction chemin de l'arrivée
            include 'config.php';
            $vue = $root . '/app/view/viewDoctolibAccueil.php';
            require ($vue);
        }
    }

    public static function DoctolibInscription() {
        $results = ModelSpecialite::getSpe();

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewInscription.php';
        if (DEBUG)
            echo ("ControllerConnexion : viewInscription : vue = $vue");
        require ($vue);
    }

    public static function InscriptionRead() {
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $adresse = $_GET['adresse'];
        $login = $_GET['login'];
        $password = $_GET['password'];
        $statut = $_GET['statut'];
        $spe = $_GET['spe'];

        $results = ModelPersonne::getInscription($nom, $prenom, $adresse, $login, $password, $statut, $spe);
        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG)
            echo ("ControllerConnexion : viewInscription : vue = $vue");
        require ($vue);
    }
    
    public static function deconnexion(){
        $results = ModelPersonne::deconnect();
        
        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG)
            echo ("ControllerConnexion :  : vue = $vue");
        require ($vue);
    }
    

}

?>
