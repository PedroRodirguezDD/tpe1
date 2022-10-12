{include file="header.tpl"}

{include file="form_artista.tpl"}

<h2>Lista de artistas:</h2>
<ul>  
    {foreach from=$artistas item=$artista }
        <li>
            {$artista->nombre} - id: {$artista->id} 
            <a href="itemXcategoria/{$artista->id}">Ver canciones</a>
            <a href="deleteArtista/{$artista->id}" type="button" class="btn btn-danger">Eliminar</a>
            <a href="formEditar_artista/{$artista->id}" type="button" class="btn btn-success">Editar</a>
        </li>
    {/foreach}
</ul> 


{include file="footer.tpl"}