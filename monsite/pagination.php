<?php

session_start();
require_once 'config/bdd.inc.php';
include_once 'include/header.inc.php';

$req_comptage = "SELECT COUNT(*) as nbarticle FROM articles WHERE publie = 1";
$requet = mysql_query($req_comptage);
$result = mysql_fetch_array($requet);
$nbarticle = $result['nbarticle'];

$affichage = 0;
$nb_article_page = 2;
$nbpages = $nbarticle /$nb_article_page;

 
if(isset ($_GET['page'])) $affichage = $_GET['page'] -1 *$nb_article_page;

$select_all_post = "SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM articles WHERE publie = 1 LIMIT $affichage,$nb_article_page";
// affiche toute la table article avec condition sur publie == 1

$request = mysql_query($select_all_post);



//avec concaténation
while ($result_request = mysql_fetch_array($request))
{ // Création d'une variable dans laquelle on stock les resultat de la requete


    echo '<img src="img/' . $result_request['id'] . '.jpg" alt="mon image" width="200px"/>';
    echo '<h2>' . $result_request['titre'] . '</h2>';
    echo '<p>' . $result_request['texte'] . '</p>';
    echo '<p>' . $result_request['date_fr'] . '</p>'  ;  
    // on parcours le tableau pour afficher les valeurs de l'article
}

for ($i=1; $i <= $nbpages ; $i++ )
{
    echo "<a href=\"pagination.php?page=$i\">$i   </a>";
}
?>
 