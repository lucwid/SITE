<?php

require_once 'config/bdd.inc.php';
include_once 'include/header.inc.php';
session_start();

if (isset($_POST['inscription'])) {
    $email = addcslashes($_POST['email'], "'%_");
    $nom = addcslashes($_POST['nom'], "'%_");
    $prenom = addcslashes($_POST['prenom'], "'%_");
    $mdp = addcslashes($_POST['mdp'], "'%_");
    $insert_user = "INSERT INTO utilisateurs (nom, prenom, email, mdp) VALUES ('$nom','$prenom', '$email', '$mdp');";
    mysql_query($insert_user);
    $_SESSION['inscription'] = "Vous êtes bien inscrit vous pouvez désormais vous connecter.";
    header("location: index.php");
}
//$smarty->debugging = true;
$smarty->display('form_compte.tpl');

include_once 'include/menu.inc.php';
include_once 'include/footer.inc.php';
?>   