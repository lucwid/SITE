{if isset($msg_reussi)}
    <div class="alert alert-success"id="notif">{$msg_reussi}</div>
{/if}
{if isset($connectez)}
    <div class="alert alert-success"id="notif">{$connectez}</div>
{/if}
{if isset($deco)}
    <div class="alert alert-success"id="notif">{$deco}</div>
{/if}
{if isset($inscription)}
    <div class="alert alert-success"id="notif">{$inscription}</div>
{/if}
{if isset($err_conn)}
    <div class="alert alert-error"id="notif">{$err_conn}</div>
{/if}
{if isset($search_err)}
    <div class="alert alert-error"id="notif">{$search_err}</div>
{/if}

{foreach from=$data item=value}
    <h1>{$value['titre']}</h1>
    <p> {$value['texte']}</p>
    <img src="img/{$value['id']}.jpg" alt="" width="200px"/>
    <p>{$value['date_fr']}</p>
    <a href="article.php?id={$value['id']}">Modifier</a>
    <br/>
    <a href="article.php?idsuppr={$value['id']}">Supprimer</a>
{/foreach}

<div class="pagination">
    {for $i = 1 to $nbpages}
        <ul> 
            <li><a href="index.php?page={$i}">{$i}</a></li>
        </ul>
    {/for}
</div>

