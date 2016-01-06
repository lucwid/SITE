<?php
session_start();
$_SESSION['deco'] = "Vous êtes bien déconnectez ! ";
setcookie('sid', NULL, -1);
$cookie = 0;
unset($_SESSION['nom_user']);
unset($_SESSION['prenom_user']);
header("location: index.php");

?>
