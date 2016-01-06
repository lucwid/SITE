<?php

mysql_connect($server = 'localhost', $username = 'root', $password = 'root') or die("impossible de se connecter: " . mysql_error());
mysql_select_db('blog');


//echo $requete_cookie;
$cookie = 0;
if (isset($_COOKIE['sid'])) {
    $cookie_actuel = $_COOKIE['sid'];
    $requete_cookie = " SELECT sid, nom, prenom FROM utilisateurs WHERE sid = '$cookie_actuel';";
    $req_verif = mysql_query($requete_cookie);
    $traitement_cookie = mysql_fetch_array($req_verif);
    $_SESSION['nom_user'] = $traitement_cookie['nom'];
    $_SESSION['prenom_user'] = $traitement_cookie['prenom'];
    if ($traitement_cookie['sid'] == $cookie_actuel) {
        $cookie = 1;
    }
}
/***** SMARTY *****/
require_once 'libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->setTemplateDir('template/');
/********* FIN ******/
?>
