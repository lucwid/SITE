<?php

require_once 'config/bdd.inc.php';
//connexion a la base
include_once 'include/header.inc.php';
session_start();

if ($cookie == 0) {
    $_SESSION['err_conn'] = "Veuillez vous connecter pour rédiger un article";
    header("location: index.php");
} else {
    if (isset($_POST['envoyer']) == "update" && "inserer") {
        if (($_POST['envoyer']) == "inserer") {
            $titre = addcslashes($_POST['titre'], "'%_");
            $texte = addcslashes($_POST['texte'], "'%_");
            $publie = (!empty($_POST['publie']) ? $_POST['publie'] : 0);
            $date = date("Y-m-d");
            //recuperation des donnees avec traitement pour les caracteres speciaux

            $req_insertion = "INSERT INTO articles (titre, texte, date, publie) VALUES ('$titre', '$texte', '$date', $publie )";
            //requete d'insertion

            $erreur_image = $_FILES['image']['error'];
            //recuperation du parametre erreur de l'image posté

            if ($erreur_image != 0) {
                echo "Erreur pendant le chargement de votre image veuillez recomencer..";
                //test du traitement de l'image

                $_SESSION['msg_error'] = "Une erreur est survenue lors du chargements de votre image";
                header("location: article.php");
            } else {
                mysql_query($req_insertion);
                $id_article = mysql_insert_id();
                move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id_article.jpg");
                //execution de la requete d'insertion et traitement de l'image
                $_SESSION['msg_reussi'] = "Votre article a été correctement publié";
                header("location: index.php");
            }
        } else {
            $titre = addcslashes($_POST['titre'], "'%_");
            $texte = addcslashes($_POST['texte'], "'%_");
            $publie = (!empty($_POST['publie']) ? $_POST['publie'] : 0);
            $date = date("Y-m-d");
            $id_article = $_GET['id'];
            $req_update = " UPDATE  articles SET titre = '$titre', texte = '$texte', publie = '$publie' WHERE id = '$id_article';";
            mysql_query($req_update);
            header("location: index.php");
        }
    } else {
        /* ----------------- HTML ------------------ */
        ?>

        <?php

        if (isset($_GET['idsuppr'])) {
            $id_suppr = $_GET['idsuppr'];
            $req_suppression = "DELETE FROM articles WHERE id = $id_suppr;";
            $suppression = mysql_query($req_suppression);
            header("location: index.php");
        }
        if (isset($_GET['id'])) {
            $id_update = $_GET['id'];
            $req_modif = "SELECT id,titre,texte,publie FROM articles WHERE id = '$id_update';";
            $result_modif = mysql_query($req_modif);
            $tab_modif = mysql_fetch_array($result_modif);
            $img = '<img src="img/' . $id_update . '.jpg" alt="" width="200px"/>';
            $bouton = "update";
            $id_get = "?id=" . $id_update;
        } else {
            $tab_modif = array('id' => '', 'titre' => '', 'texte' => '', 'publie' => '');
            $bouton = "inserer";
            $img = "";
            $id_get = "";
        }
        if (isset($_SESSION['msg_error'])) {
            $smarty->assign('msg_error', $_SESSION['msg_error']);
        }
        $smarty->assign('id_get', $id_get);
        $smarty->assign('titre', $tab_modif['titre']);
        $smarty->assign('texte', $tab_modif['texte']);
        $smarty->assign('publie', $tab_modif['publie']);
        $smarty->assign('img', $img);
        $smarty->assign('bouton', $bouton);
        //** un-comment the following line to show the debug console
       // $smarty->debugging = true;
        $smarty->display('article.tpl');
        unset($_SESSION['msg_error']);


        include_once 'include/menu.inc.php';
        include_once 'include/footer.inc.php';
    }
}
?>   

