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

        <!-- Attention, il faudra ici afficher praticien/patient/administrateur en fonction du statut de l'utilisateur connecté ;
        par facilité pour l'instant, j'ajoute juste les différentes catégories à la navbar -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrateur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=specialiteReadAll">Liste des spécialités</a></li>
            <li><a class="dropdown-item" href="router.php?action=specialiteReadId">Sélection d'une spécialité par son id</a></li>
            <li><a class="dropdown-item" href="router.php?action=specialiteCreate">Insertion d'une nouvelle spécialité</a></li>
            <li> <hr> </li>
            <li><a class="dropdown-item" href="router.php?action=ListePraticiensSpe">Liste des praticiens avec leur spécialité</a></li> 
            <li><a class="dropdown-item" href="router.php?action=administrateurReadNombrePraticient">Nombre de praticiens par patient</a></li>
            <li> <hr> </li>
            <li><a class="dropdown-item" href="router.php?action=infos">Infos</a></li> 


          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Praticien</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=???">Liste de mes disponibilités</a></li>
            <li><a class="dropdown-item" href="router.php?action=???">Ajout de nouvelles disponibilités</a></li>
            <li> <hr> </li>
            <li><a class="dropdown-item" href="router.php?action=???">Liste des rendez-vous avec le nom des patients</a></li> 
            <li><a class="dropdown-item" href="router.php?action=???">Liste de mes patients (sans doublon)</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Patient</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=???">Mon Compte</a></li>
            <li><a class="dropdown-item" href="router.php?action=???">Liste de mes rendez-vous</a></li>
            <li><a class="dropdown-item" href="router.php?action=???">Prendre RDV avec un praticien</a></li> 
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=???">???</a></li>
            <li><a class="dropdown-item" href="router.php?action=???">???</a></li>

          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=DoctolibConnexion">Login</a></li>
            <li><a class="dropdown-item" href="router.php?action=???">S'inscrire</a></li>
            <li><a class="dropdown-item" href="router.php?action=???">Déconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentDoctolibMenu -->
