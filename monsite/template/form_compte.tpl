
<h3>Création de compte</h3>
<p>Saisissez vos informations personnelles</p>
<form action="form_compte.php" method="post" enctype="multipart/form-data" id="form_compte" name="form_compte">
    <div class="clearfix">
        <label for="email">Email </label>
        <div class="input">
            <input type="text" name="email" id="email" value=""/>
        </div>
    </div>
    <div class="clearfix">
        <label for="nom">Nom: </label>
        <div class="input">
            <input type="text" name="nom" id="nom"/>
        </div>
    </div>
    <div class="clearfix">
        <label for="prenom">Prénom: </label>
        <div class="input">
            <input type="text" name="prenom" id="prenom"/>
        </div>
    </div>
    <div class="clearfix">
        <label for="mdp">Mot de passe: </label>
        <div class="input">
            <input type="password" name="mdp" id="mdp"/>
        </div>
    </div>
    <br/>
    <br/>
    <div class="form-actions">
        <input type="submit" name="inscription" value="S'inscrire" class="btn btn-large btn-primary"/>
    </div>
</form> 