<?php

session_start();
require_once 'config/bdd.inc.php';
include_once 'include/header.inc.php';
$req_comptage = "SELECT COUNT(*) as nbarticle FROM articles WHERE publie = 1";
$requet = mysql_query($req_comptage);
$result = mysql_fetch_array($requet);

$nbarticle = $result['nbarticle'];
$nb_article_page = 2;
$nbpages = ceil($nbarticle / $nb_article_page);
$page = (isset($_GET['page']) ? ($_GET['page'] - 1) * $nb_article_page : 0);

if (isset($_SESSION['msg_reussi'])) {
    $smarty->assign('msg_reussi', $_SESSION['msg_reussi']);
}
if (isset($_SESSION['connectez'])) {
    $smarty->assign('connectez', $_SESSION['connectez']);
}
if (isset($_SESSION['deco'])) {
    $smarty->assign('deco', $_SESSION['deco']);
}
if (isset($_SESSION['inscription'])) {
    $smarty->assign('inscription', $_SESSION['inscription']);
}
if (isset($_SESSION['verif_conn'])) {
    $smarty->assign('verif_conn', $_SESSION['verif_conn']);
}
if (isset($_SESSION['err_conn'])) {
    $smarty->assign('err_conn', $_SESSION['err_conn']);
}
if (isset($_SESSION['search_err'])) {
    $smarty->assign('search_err', $_SESSION['search_err']);
}

if (isset($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
    $requete_recherche = "SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM articles WHERE titre LIKE '%$recherche%' OR texte LIKE '%$recherche%';";
    $request_recherche = mysql_query($requete_recherche);
    if (mysql_num_rows($request_recherche) == 0) {
        $_SESSION['search_err'] = "Aucun n'élément en correspond à votre recherche";
        header("location: index.php");
    } else {
        while ($result_request = mysql_fetch_array($request_recherche)) {
            $data[] = $result_request;
        }
        if ($cookie == 1) {
            $smarty->assign('cookie', $cookie);
        }
        $smarty->assign('data', $data);
        $smarty->assign('nbpages', $nbpages);
        //$smarty->debugging = true;
        $smarty->display('index.tpl');
        unset($_SESSION['msg_reussi']);
        unset($_SESSION['connectez']);
        unset($_SESSION['deco']);
        unset($_SESSION['inscription']);
        unset($_SESSION['verif_conn']);
        unset($_SESSION['err_conn']);
    }
} else {

    $select_all_post = "SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM `articles` WHERE 1 LIMIT $page,$nb_article_page;";
//preparation de la requete de selection
    $request = mysql_query($select_all_post);
//mise en place de l'execution de la requete prete a l'execution
    while ($result_request = mysql_fetch_array($request)) {
        $data[] = $result_request;
    }
    if ($cookie == 1) {
        $smarty->assign('cookie', $cookie);
    }
    $smarty->assign('data', $data);
    $smarty->assign('nbpages', $nbpages);
    //$smarty->debugging = true;
    $smarty->display('index.tpl');
    unset($_SESSION['msg_reussi']);
    unset($_SESSION['connectez']);
    unset($_SESSION['deco']);
    unset($_SESSION['inscription']);
    unset($_SESSION['verif_conn']);
    unset($_SESSION['err_conn']);
    unset($_SESSION['search_err']);
}

include_once 'include/menu.inc.php';
include_once 'include/footer.inc.php';
?>

