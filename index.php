<?php

session_start();
$_SESSION['login'] = "vide";
$_SESSION['prenom'] = "vide";
$_SESSION['nom'] = "vide";
$_SESSION['statut'] = "vide";
header('Location: app/router/router.php?action=qqchose');
?>
