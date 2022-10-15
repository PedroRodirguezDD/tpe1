{include file="header.tpl"}

{include file="form_artista.tpl"}

<h2>Lista de artistas:</h2>
<ul>  
    {foreach from=$artistas item=$artista }
        <li>
            {$artista->nombre} - id: {$artista->id} 
            <a href="itemXcategoria/{$artista->id}">Ver canciones</a>
            {if isset($smarty.session.user)}
                <a href="deleteArtista/{$artista->id}" type="button" class="btn btn-danger">Eliminar</a>
                <a href="formEditar_artista/{$artista->id}" type="button" class="btn btn-success">Editar</a>
            {/if}    
        </li>
    {/foreach}
</ul> 


{include file="footer.tpl"}