<?php

session_start();
$_SESSION['login'] = "vide";
header('Location: app/router/router.php?action=qqchose');

echo("bonjour");

?>
