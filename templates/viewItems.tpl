{include file="header.tpl"}
<div class="container">
<h2>Lista de Canciones de {$artista->nombre}:</h2>
<a href="artistas">Volver</a>
<ul>  
    {foreach from=$items item=$item }
        <li>{$item->nombre} - {$item->anio} - {$item->genero}</li>
    {/foreach}
</ul> 
</div>
{include file="footer.tpl"}