<?php

require_once 'config/bdd.inc.php';
include_once 'include/header.inc.php';
session_start();

if ($cookie == 1) {
    $_SESSION['verif_conn'] = "Vous êtes déjà connecté une nouvelle connexion est inutile";
    header("location : index.php");
} else {
    if (isset($_POST['seconnecter'])) {
        $email = addcslashes($_POST['email'], "'%_");
        $mdp = addcslashes($_POST['mdp'], "'%_");
        $identification = "SELECT  id,email,mdp FROM utilisateurs WHERE email = '$email' AND mdp = '$mdp';";
        $request_con = mysql_query($identification);
        $resultat = mysql_fetch_array($request_con);
        $id_user = $resultat['id'];
        if ($resultat) {
            $_SESSION['connectez'] = "vous êtes connectez";
            $sid = md5($email . time());
            $requete_update = "UPDATE utilisateurs SET sid = '$sid' WHERE id ='$id_user';";
            mysql_query($requete_update);
            setcookie('sid', $sid, time() + (30 * 60));
            header("location: index.php");
        } else {
            $_SESSION['refusez'] = "Vous avez une erreur de mot de passe ou dans votre email"; 
            header("location: form_connexion.php");
        }
    } else {
        if (isset($_SESSION['refusez'])){
        $smarty->assign('refusez', $_SESSION['refusez']);
        }
        //** un-comment the following line to show the debug console
        //$smarty->debugging = true;
        $smarty->display('form_connexion.tpl');
        unset($_SESSION['refusez']);
    }
}
include_once 'include/menu.inc.php';
include_once 'include/footer.inc.php';
?>   


