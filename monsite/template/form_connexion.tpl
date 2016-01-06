{if isset($refusez)}
    <div class="alert alert-error"id="notif"> 
        {$refusez}
    </div>   
{/if}
<h3>Connexion</h3>
<p>Saisissez les identifiants choisis lors de votre inscription</p>
<form action="form_connexion.php" method="post" enctype="multipart/form-data" id="form_connexion" name="form_connexion">
    <div class="clearfix">
        <label for="email">Email </label>
        <div class="input">
            <input type="text" name="email" id="email" value=""/>
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
        <input type="submit" name="seconnecter" value="Se connecter" class="btn btn-large btn-primary"/>
    </div>
</form> 
