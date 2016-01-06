
{if isset($msg_error)}
    <div class="alert alert-error"id="notif"> {$msg_error} </div>
{/if}

<form action="article.php{$id_get}" method="post" enctype="multipart/form-data" id="form_article" name="form_article">
    <div class="clearfix">
        <label for="titre">Titre: </label>
        <div class="input">
            <input type="text" name="titre" id="titre" value="{$titre}"/>
        </div> 
    </div>
    <div class="clearfix">
        <label for="texte">Texte: </label>
        <div class="textarea">
            <textarea name="texte" id="texte">{$texte}</textarea>
        </div>
    </div>
    <div class="clearfix">
        <label for="image">Image: </label>
         {$img}
        <div class="input">
            <input type="file" name="image" id="image"/>
        </div>
    </div>
    <br/>
    <div class="clearfix">
        <label for="publie">Publie: </label>
        <div class="input">
            <input type="checkbox" name="publie" id="publie" value="1"/>
        </div>
    </div>
    <br/>
    <div class="form-actions">
        <input type="submit" name="envoyer" value="{$bouton}" class="btn btn-large btn-primary"/>
    </div>
</form> 