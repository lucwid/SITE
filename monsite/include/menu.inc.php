</div>

<nav class="span4">
    <form action="index.php" method="get" enctype="multipart/form-data" id="recherche" name="recherche">
        <div class="clearfix">
            <label for="recherche">Recherche: </label>
            <div class="input">
                <input type="text" name="recherche" id="recherche" value=""/>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" name="rechercher" value="rechercher" class="btn btn-large btn-primary"/>
        </div>
    </form>
    <h3>Menu</h3>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php if ($cookie == 1) { ?><li><a href="article.php">Rédiger un article</a></li><?php } else { ?><li><a href="form_compte.php">Créer un compte</a></li> <?php } ?>
        <?php if ($cookie == 0) { ?><li><a href="form_connexion.php">Se connecter</a></li> <?php } else { ?><li><a href="deconnexion.php">Se deconnecter</a></li> <?php } ?>
    </ul>
    <?php
    if ($cookie == 1) {
        echo '<h3>' . "Bonjour: " . $_SESSION['prenom_user'] . " " . $_SESSION['nom_user'] . '</h3>';
    } else {
        echo '<h3>' . "Statut: Déconnecté" . '</h3>';
    }
    ?>
</nav>
<div>
