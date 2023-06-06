
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['statut'] == "vide") {
    $nom = " ";
    $prenom = " ";
    $statut = " ";
} else {
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    if ($_SESSION['statut'] == 0) {
        $statut = 'Administrateur';
    } else if ($_SESSION['statut'] == 1) {
        $statut = 'Praticien';
    } else if ($_SESSION['statut'] == 2) {
        $statut = 'Patient';
    }
}
?>


<!-- ----- début fragmentDoctolibMenuPraticien -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router.php?action=DoctolibAccueil">GULLOTTA - VEAU</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <a class="navbar-brand" href="router.php?action=DoctolibAccueil"> | <?php echo $statut ?> | <?php echo $prenom ?>  <?php echo $nom ?> | </a>





                        <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        if ($_SESSION['statut'] == 0 && $_SESSION['statut'] != 'vide') {
                            echo ' 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrateur</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="router.php?action=specialiteReadAll">Liste des spécialités</a></li>
                                    <li><a class="dropdown-item" href="router.php?action=specialiteReadId">Sélection d\'une spécialité par son id</a></li>
                                    <li><a class="dropdown-item" href="router.php?action=specialiteCreate">Insertion d\'une nouvelle spécialité</a></li>
                                    <li> <hr> </li>
                                    <li><a class="dropdown-item" href="router.php?action=ListePraticiensSpe">Liste des praticiens avec leur spécialité</a></li> 
                                    <li><a class="dropdown-item" href="router.php?action=administrateurReadNombrePraticient">Nombre de praticiens par patient</a></li>
                                    <li> <hr> </li>
                                    <li><a class="dropdown-item" href="router.php?action=infos">Infos</a></li> 
                                </ul>
                            </li> ';
                        }
                        ?>


                        <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        if ($_SESSION['statut'] == 1) {
                            echo ' 
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Praticien</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="router.php?action=dispos">Liste de mes disponibilités</a></li>
                                <li><a class="dropdown-item" href="router.php?action=AjoutDispo">Ajout de nouvelles disponibilités</a></li>
                                <li> <hr> </li>
                                <li><a class="dropdown-item" href="router.php?action=RDVprisPatient">Liste des rendez-vous avec le nom des patients</a></li> 
                                <li><a class="dropdown-item" href="router.php?action=listePatientsPra">Liste de mes patients (sans doublon)</a></li>
                            </ul>
                        </li>';
                        }
                        ?>

                        <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        if ($_SESSION['statut'] == 2) {
                            echo ' 

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Patient</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="router.php?action=compte">Mon Compte</a></li>
                                <li><a class="dropdown-item" href="router.php?action=mesRDV">Liste de mes rendez-vous</a></li>
                                <li><a class="dropdown-item" href="router.php?action=prendreRDV">Prendre RDV avec un praticien</a></li> 
                            </ul>
                        </li>';
                        }
                        ?>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="router.php?action=SupprRDV">Supprimer une disponibilité</a></li>
                                <li><a class="dropdown-item" href="router.php?action=???">???</a></li>

                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="router.php?action=DoctolibConnexion">Login</a></li>
                                <li><a class="dropdown-item" href="router.php?action=DoctolibInscription">S'inscrire</a></li>
                                <li><a class="dropdown-item" href="router.php?action=deconnexion">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
        </div>
</nav> 

<!-- ----- fin fragmentDoctolibMenu -->
